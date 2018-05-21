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
    public $messages_old;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['Manager'],
                    ],
                ],
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionSpecifications ($ref) {
        $odata = new Odata();
        $order = $odata->get("Document_ЗаказПокупателя", array(
            'key' => array("Ref_Key" => $ref),
            'top' => 1,
            'select' => 'Основная'
        ));
        return $this->renderPartial("tabs/specifications", array("order" => $order[0], "odata" => $odata));
    }


    public function actionMessages ($ref, $skip = 0) {
        $count_messages = 7;
        $odata = new Odata();

        if (!$this->messages_old) {
            $messages = $odata->get("Catalog_Сообщения", array(
                'top' => $count_messages,
                'skip' => $skip,
                'where' => array("СвязанныйОбъект", $ref, "Document_ЗаказПокупателя"),
                'select' => "Текст,ДатаОтправления,ПолучателиТекст,Отправитель/ФИО",
                'expand' => "Отправитель",
                'orderby' => 'ДатаОтправления desc'
            ));
        }

        if (count($messages) < $count_messages and $this->messages_old == true or count($messages) == 0 ) { // если новых сообщений в течении 3 месяцев нет

            $skip_old = 0;

            $messages = $odata->get("Catalog_СообщенияАрхив", array(
                'top' => $count_messages,
                'skip' => $skip_old,
                'where' => array("СвязанныйОбъект", $ref, "Document_ЗаказПокупателя"),
                'select' => "Текст,ДатаОтправления,ПолучателиТекст,Отправитель/ФИО",
                'expand' => "Отправитель",
                'orderby' => 'ДатаОтправления desc'
            ));
        }

        if (count($messages) < $count_messages) { // запускаем загрузку след пачки старых сообщений со следующего нажатия на кнопку
           $this->messages_old = true;
        }




        return $this->renderPartial("tabs/messages", array("messages" => $messages, "odata" => $odata, 'skip' => $skip+$count_messages, 'ref' => $ref, 'count_messages' => $count_messages));
    }

    public function actionTab($ref) {
        $odata = new Odata();

        $allmessages = count($odata->get("Catalog_Сообщения", array(
            'where' => array("СвязанныйОбъект", $ref, "Document_ЗаказПокупателя"),
            'select' => "Ref_Key",
            'expand' => "Отправитель",
            'orderby' => 'ДатаОтправления desc'
        ))); // количество новых

        $allmessages += count($odata->get("Catalog_СообщенияАрхив", array(
            'where' => array("СвязанныйОбъект", $ref, "Document_ЗаказПокупателя"),
            'select' => "Ref_Key",
            'expand' => "Отправитель",
            'orderby' => 'ДатаОтправления desc'
        ))); // количество старых



        $bussiness = $odata->get("BusinessProcess_ПоручениеЗадание", array(
            'where' => array("ОбъектПоручения", $ref, "Document_ЗаказПокупателя"),
            'expand' => 'Автор',
            'select' => 'ДатаВыполненияПлан,ДатаВыполнения,Описание,Автор/ФИО,Автор/Ref_Key,СтатусВыполнения',
            'orderby' => 'ДатаВыполненияПлан desc'
        ));

       $order = $odata->getOne("Document_ЗаказПокупателя", $ref);

        return $this->renderPartial('tab', array('order' => $order, "odata" => $odata, "allmessages" => $allmessages, "bussiness" => $bussiness));
    }

    public function actionIndex($client = null, $type = null)
    {
        $odata = new Odata();
        $start = microtime(true);

        $user_key = "d1e7037f-3fa3-11d9-8d9d-0050da61c030";

        //$kontragent_key = "5511ca99-5e7a-11d9-977f-505054503030";
        // $company_key = "8450e1c2-cffa-46bf-b5d0-3d0b8d00c202";
        //$kontragent_code = "MOS-000457"; //VOL-003812



        if (!$client) {
            $allorders = $odata->get("Document_ЗаказПокупателя", array(
                //'expand' => "УчастникиСделки.Сотрудник_Key",
                //'eq' => array("УчастникиСделки/Сотрудник_Key" => $user_key)
                'top' =>15,
                //'key' => array("УчастникиСделки/Сотрудник_Key" => $user_key),
                'eq' => array("Статус" => "ВРаботе"),
                'expand' => 'Контрагент',
                'orderby' => 'Date desc',
                'select' => "Date, Контрагент/Description, Контрагент/Ref_Key, Контрагент/Code, Контрагент/ТипКонтрагента"
            ));
            // 1e2a8c87-5e73-11d9-977f-505054503030
            //$odata->link();
            return $this->render('orders', array('odata' => $odata, 'allorders' => $allorders));

        } else {

            $client_code = $odata->get("Catalog_Контрагенты", array(
                'where' => array('Code', $client)
            ));


            $client = $odata->get("Catalog_Контрагенты", array(
                'top' => 1,
                'select' => "Ref_Key,ПолноеНаименование,УНН, Code, ИБ",
                "key" => array("Ref_Key" => $client_code[0]['Ref_Key']),
                'expand' => ""
            ));

            $allorders[0] = $odata->get("Document_ЗаказПокупателя", array(
                'top' => 10,
                'orderby' => "Date desc",
                'key' => array('Контрагент_Key' => $client[0]['Ref_Key']),
                'eq' => array(array("Статус" => "ВРаботе"), array("ДелениеПоТипуТовара" => "ДляТоваров"))
            ));

            $allorders[1] = $debug = $odata->get("Document_ЗаказПокупателя", array(
                'top' => 10,
                'orderby' => "Date desc",
                'key' => array('Контрагент_Key' => $client[0]['Ref_Key']),
                'eq' => array(array("Статус" => "ВРаботе"), array("ДелениеПоТипуТовара" => "ДляЗапчастей"))
            ));



            $stop = 'Время получения ответа: ' . round( microtime(true) - $start, 2 ) . ' сек.';
            
            return $this->render('index', array('odata' => $odata, 'allorders' => $allorders, 'stop' => $stop, 'client' => $client, 'debug' => $debug, "stage" => $stage));
        }

        
    }

    public function actionIt()
    {
        return $this->render('index');
    }





}
