<?php
namespace app\models;


class Odata // библеотека для работы с odata by Андрей Гавриленко 2018
{
    public $url = 'http://172.16.112.2/Base/odata/standard.odata/';
    public $curl;
    public $params;
    public $login = "gavrilenko";
    public $password = "3gxrYcR8orK";
    public $doc;
    public $link;
    public $format = "json";

    function __construct()
    {
        $this->curl = curl_init();
        $this->params(array('format'=> $this->format));

    }

    public function params($params) {

        $mas = array("dateto", "datefrom", "key", "date", "where", "eq", "ne");
        foreach ($params as $name_params => $param) {
            if (!in_array($name_params, $mas)) {
                $this->params['$'.$name_params] = $param;
            } else {
                $this->$name_params($param);
            }
        }
    }

    public function link() {
        echo '<a target = "blank" href ="' . urldecode($this->link) . '">' . urldecode($this->link) . '</a>';
        return true;
    }

    public function generateParams() {
        return "?".http_build_query($this->params, null ,"&" , PHP_QUERY_RFC3986);
    }

    public function document($doc) {
        $this->doc = $doc;
    }

    public function eq($paramsAll) {
        if (isset($paramsAll[1])) {
            foreach ($paramsAll as $params) {
                foreach ($params as $param => $value) {
                    $this->filter($param . " eq '" . $value . "'");
                }
            }
        } else {
            foreach ($paramsAll as $param => $value) {
                $this->filter($param . " eq '" . $value . "'");
            }
        }
    }

    public function ne($paramsAll) {
        if (isset($paramsAll[1])) {
            foreach ($paramsAll as $params) {
                foreach ($params as $param => $value) {
                    $this->filter($param . " ne '" . $value . "'");
                }
            }
        } else {
            foreach ($paramsAll as $param => $value) {
                $this->filter($param . " ne '" . $value . "'");
            }
        }
    }

    public function getParams() {
        return $this->params;
    }

    public function connect() {
        $url = $this->url . urlencode($this->doc) . $this->generateParams();
        $this->link = $url;
         // $option['CURLOPT_URL'] = $url; - идея для правлиьности
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_USERPWD, $this->login . ":" . $this->password);
        curl_setopt($this->curl, CURLOPT_HEADER, false);
        curl_setopt($this->curl, CURLOPT_COOKIE, $cookie);
        curl_setopt($this->curl, CURLOPT_COOKIESESSION, true);
        curl_setopt($this->curl, CURLOPT_VERBOSE, true);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_ENCODING, "");
    }

    public function getErrors($return) {
        $return = json_decode($return, true);
        if ($return['odata.error']) {
            echo "Обнаружена ошибка. Код ошибки: <b>" .$return['odata.error']['code']. "</b>. Текст ошибки: <b>". $return['odata.error']['message']['value'] . "</b> <br>" ;
            echo "<br> " . $this->link;
            exit;
        }
    }

    public function getReturn() {

        $this->connect();


        $return = curl_exec($this->curl); // выполнение curl и выдача результата

        if ($return) {
            $this->getErrors($return);
            $return_array = json_decode($return, true);
            return $return_array["value"];
        }
        return false;
    }
    public function getReturnOne() {
        $this->connect();
         $return = curl_exec($this->curl); // выполнение curl и выдача результата

        if ($return) {
            $this->getErrors($return);
            $return_array = json_decode($return, true);
            return $return_array;
        }
        return false;
    }

    public function where($params) {
        if (isset($params[2])) {
            $this->filter($params[0] . " eq cast(guid'" . $params[1] . "', '" . $params[2] . "')");
        } else {
            $this->filter($params[0] . " eq '" . $params[1] . "'");
        }
        
    }

    public function get($doc, $params = null) {
        $this->params = null;

        $this->params(array('format'=> $this->format));

        $this->document($doc);
        if ($params) {
            $this->params($params);
        }
        return $this->getReturn();

    }
    public function one ($doc, $key, $params = null) {
        $this->params = null;

        $this->params(array('format'=> $this->format));

        $this->doc = $doc . "(guid'" . $key . "')";

        if ($params) {
            $this->params($params);
        }


        return $this->getReturnOne();
    }

    public function filter($filter_attr, $prefix = " and ") {
        if ($this->params['$filter']) {
            $this->params['$filter'] .= $prefix . $filter_attr;
        } else {
            $this->params['$filter'] = $filter_attr;
        }
    }

    public function key ($keys) {
        $query = null;
        foreach ($keys as $name_key => $key) {
            $query = $name_key . " eq guid'" . $key . "'";
            $this->filter($query, " and ");
        }
    }

    public function dateto($date) { // le =<
        $query = "Date le datetime'".self::convertDate($date)."'";
        $this->filter($query);
    }

    public function datefrom($date) { // ge =>
        $query = "Date ge datetime'".self::convertDate($date)."'";
        $this->filter($query);
    }

    public function date($date) { // ge =>
        if (is_array($date)) {
            $this->dateto($date[1]);
            $this->datefrom($date[0]);
        } else {
            $this->datefrom($date);
        }
    }

    public static function convertDate($date) { // 18.12.2018 - normal date,  2018-03-18T00:00:00 - not normal date
        $dat = new \DateTime($date);
        if (strpos($date, ".")) {
            $cur_date = $dat->format("Y-m-d".'\T'."H:i:s");
        } else {
            $cur_date = $dat->format("d-m-Y");
        }
        return $cur_date;
    }

    public function getOne($catalog, $key) {
        $data = $this->get($catalog, array(
            'top' => 1,
            'key' => array('Ref_Key' => $key),
            'select' => "",
            'expand' => ""
        ));
        return $data[0];
    }

}