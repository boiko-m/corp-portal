<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\ContactForm;
use app\models\Odata;

class OrdersclientController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($id = null, $type = null)
    {
        $odata = new Odata();
        $start = microtime(true);

        $user_key = "73fa0e86-916d-11da-98f1-505054503030";

        /*$data= $odata->get("Document_ЗаказПокупателя", array(
            "select" => "Контрагент",
            "date" => array("11.03.2018","20.03.2018"),
            "key" => array("УчастникиСделки/Сотрудник_Key" => $user_key),
            "expand" =>"Контрагент"
        ));*/

        $kontragent_key = "5511ca99-5e7a-11d9-977f-505054503030";
        $company_key = "8450e1c2-cffa-46bf-b5d0-3d0b8d00c202";


        $allorders = $odata->get("Document_ЗаказПокупателя", array(
            'top' => 10,
            'key' => array('Контрагент_Key' => $kontragent_key),
            'select' => "Date,Number,Статус,Основная, ДелениеПоТипуТовара",
            'expand' => ""
        ));
        $client = $odata->get("Catalog_Контрагенты", array(
            'top' => 3,
            'select' => "ПолноеНаименование,УНН, Code, ИБ",
            "key" => array("Ref_Key" => $kontragent_key),
            'expand' => ""
        ));

        

        $stop = 'Время получения ответа: ' . round( microtime(true) - $start, 2 ) . ' сек.';

        return $this->render('index', array('odata' => $odata, 'allorders' => $allorders, 'stop' => $stop, 'client' => $client));
    }

    public function actionIt()
    {
        return $this->render('index');
    }


}
