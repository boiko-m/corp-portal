<?php

namespace app\components;

use Yii;


class HttpService  extends \yii\base\Component
{
    public $curl;
    public $url;
    public $login;
    public $password;
    public $doc; // документ
    public $link;
    public $params;
    public $error = false; // отображение ошибок

    function __construct($params = null) {

        if ($params) {
            foreach ($params as $key => $value) {
                $this->$key = (property_exists($this, $this->$key)) ?: $value;
            }
        }

        if (!$this->url) {
            $this->url = Yii::$app->params['httpServiceC'];
        }
        
        if (Yii::$app->user->identity->password_external) {
            $this->password = Yii::$app->user->identity->password_external;
            $this->login = Yii::$app->user->identity->username;
        } else {
            $this->login = Yii::$app->params['odataLogin'];
            $this->password = Yii::$app->params['odataPassword'];
        } // заход каждого пользователя за себя

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

    public function get($doc) {
        $this->doc = $doc;

        return $this;
    }

    public function params($array = null) {
         if ($array) {
            foreach ($array as $key => $value) {
                $params[$key] = $value;
            }
        }
        $this->params = http_build_query($params, null ,"&" , PHP_QUERY_RFC3986);
        return $this;
    }


    public function one() {
        $link = $this->generatelink();
        $result = $this->result();

        return $result['data'][0];
    }

    public function all() {
        $link = $this->generatelink();
        $result = $this->result();

        return $result['data'];
    }

    public function generatelink() {
        $link = $this->url . $this->doc . "?" . $this->params;
        return $link;
    }

    public function error() {

    }

    public function result() {
        $curl = $this->curl;

        curl_setopt($curl, CURLOPT_URL, $this->generatelink());

        $exec = curl_exec($curl);

        if ($exec) {
            $result = json_decode(preg_replace("/\xEF\xBB\xBF/", "", $exec),true);
        } else {
            $result['error'] = "Нет подключения к серверу базы данных";
        }

        if ($result['status'] == 'error') {
            $result['error'] = $result['data'];
            if (!$this->error) {
                $result['data'] = false;
            }
        }

        if ($this->error) {
            if (isset($result['error'])) {
                echo "Ошибка. ". $result['error'];
                die();
            }
        }

        $this->params = false;
        $this->doc = false;
        return $result;
    }




}
