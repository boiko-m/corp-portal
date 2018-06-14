<?php
namespace app\models;

use Yii;



class Tdata
{
    public $url;
    public $curl;
    public $login;
    public $password;
    public $doc;
    public $link;
    public $format = "json";
    public $query;
    public $defaultTop = 10; // по умолчанию 10 записей
    public $condition;
    public $doc_func;


    function __construct($params = null)
    {
        if ($params) {
            foreach ($params as $key => $value) {
                $this->$key = (property_exists($this, $this->$key)) ?: $value;
            }
        }
        
        $this->query['$format'] = $this->format;
        if (!$params['url']) {
            $this->url = Yii::$app->params['odataUrl'];
        }
        if (Yii::$app->user->identity->password_external) {
            $this->password = Yii::$app->user->identity->password_external;
            $this->login = Yii::$app->user->identity->username;
        } else {
            $this->login = Yii::$app->params['odataLogin'];
            $this->password = Yii::$app->params['odataPassword'];
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_USERPWD, $this->login . ":" . $this->password);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_COOKIE, $cookie);
        curl_setopt($curl, CURLOPT_COOKIESESSION, true);
        curl_setopt($curl, CURLOPT_VERBOSE, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_ENCODING, "");

        $this->curl = $curl;

    }
    
    public function where($data = null) {
        if ($data) {
            if (!is_array($data)) { // ->where("Статус eq 'ВРаботе' and ДелениеПоТипуТовара eq 'ДляЗапчастей'")
                $this->filter($data); 
            } else { // если все массивы ->where(["Статус" => 'ВРаботе', "ДелениеПоТипуТовара" => 'ДляЗапчастей'])
                foreach ($data as $key => $value) {
                    if ($key) {
                        $this->filter($key . " eq '" . $value ."'");    
                    } else { // если совмещенные режим ->where(["Статус" => 'ВРаботе', "ДелениеПоТипуТовара ne 'ДляЗапчастей'"])
                        $this->filter($value);
                    }
                }
            }
        }
        return $this;
    }

    public function filter ($data) { // для упорядочивания фильтров

        if ($this->query['$filter']) {
           $this->query['$filter'] .= " and " . $data;
        } else {
           $this->query['$filter'] .= $data;
        }
    }

    public function doc($data) {
        $this->query['$skip'] = $this->query['$filter'] = $this->query['$orderby'] = $this->query['$expand'] = $this->query['$select'] = null; // новый запрос
        
        $this->doc = $data;
        return $this;
    }

    public function date( $data1=null, $data2=null, $data = "Date") {
        if ($data1 or $data2) {

            if ($data1) {
                $date = new \DateTime($data1);
                $this->filter($data . " ge datetime'".$date->format("Y-m-d".'\T'."H:i:s") . "'");
                echo var_dump($date->format("Y-m-d".'\T'."H:i:s"));
                exit;
            } 

            if ($data2) {
                $date2 = new \DateTime($data2);
                $this->filter($data . " le datetime'".$date2->format("Y-m-d".'\T'."H:i:s") . "'");
            }
        }
        return $this;
    }

    public function findKey($doc, $key) {
        $this->doc = $doc . "(guid'" .$key. "')";
        return $this->one();
    }

    public function key($key_name, $key) {
        $this->filter($key_name . " eq guid'" . $key . "'");
        return $this;
    }

    public function select($data = null) {
        if ($data) {
            $this->query['$select'] = $data;
        }
        return $this;
    }

    public function cast($params) {
        $this->filter($params[0] . " eq cast(guid'" . $params[1] . "', '" . $params[2] . "')"); // состовной тип
        return $this;
    }
    
    public function debug () {
        return "<pre> " . var_dump($this->getError()) ."</pre>";
    }

    public function expand($data) {
        $this->query['$expand'] = $data;
        return $this;
    }

    public function top($data = null) {
        if ($data) {
            $this->query['$top'] = $data;
        }
        return $this;
    }

    public function skip($data = null) {
        if ($data) {
            $this->query['$skip'] = $data;
        }
        return $this;
    }

    public function page($page, $top=null) {
        $top = $top ? $top : $this->defaultTop;

        $this->skip(($page*$top)-$top);
        $this->top($top);
        return $this;
    }

    public function orderby($data) {
        $this->query['$orderby'] = $data;
        return $this;
    }

    public function generateLink() {
        $query = (!$this->query) ?: "?" . http_build_query($this->query, null ,"&" , PHP_QUERY_RFC3986);

        return $this->url . urlencode($this->doc) . $this->doc_func . $query;
    }

    public function condition() {
        if ($this->query['$filter']) {
            $this->condition = $this->query['$filter'];
            unset($this->query['$filter']);
        }
        return $this;
    }

    public function last() {
        if ($this->condition) {
            $condition = "Condition='" . rawurlencode($this->condition) . "'";
        }
        $this->doc_func = "/SliceLast(" . $condition . ")";

         
        $result = $this->getError();

        return $result[0];
       
    }

    public function one($data = null) {
        $this->query['$top'] = 1;
        $result = $this->getError();
        
        return $result[0];
    }

    public function all() {
        return $this->getError();
    }

    public function getError() {
        $result = $this->result();
        if ($result['odata.error']) {
            if ($result['odata.error']['code']) {
                $code = "Ошибка. #" . $result['odata.error']['code']. ". ";
            }
            $result = "<br><b style ='color:red'>" . $code . $result['odata.error']['message']['value']. " !</b> <br>
                <a href ='" . $this->generateLink() . "' target = '_blank'>" . $this->generateLink() . "</a>
            ";
            echo $result;
            exit;
        }

        return $result['value'];
    }

    public function result() {
        $curl = $this->curl;

        curl_setopt($curl, CURLOPT_URL, $this->generateLink());

        $exec = curl_exec($curl);
        if ($exec) {
            $result = json_decode($exec, true);
        } else {
            $result['odata.error']['message']['value'] =" Нет подключения к серверу базы данных";
        }

        return $result;
    }
    

}