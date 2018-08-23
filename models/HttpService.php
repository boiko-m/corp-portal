<?php

namespace app\components;

use Yii;


class HttpService  extends \yii\base\Component
{
    public $curl;
    public $url = "http://172.16.112.2/Base/hs/NegotiationPlan/v1/";

    function __construct() {

        if (!$params['url']) {
            $this->url = Yii::$app->params['odataUrl'];
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

    public function init() {

    }




}
