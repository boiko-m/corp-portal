<?php

namespace app\controllers;

use app\models\Tdata;



class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$data = new Tdata([
    		'format' => 'json'
    	]);

    	/*$users = $data->doc("Document_ЗаказПокупателя")->select()->page(3)->orderby('Date desc')->one();
    	echo var_dump($users);*/
 
    	//$a = $data->doc("Document_ЗаказПокупателя")->select()->top(3)->date(null, '04-02-2018')->orderby('Date desc')->one();
    	
    	return $this->render('index', array(
    		'data' => $a,
    		'odata' => $data
    	));
    }

    public function actionInfo()
    {
        $data = new Tdata();
        
        $contragent_key = "b3ba5d20-6535-11de-8007-00187177ff31";
        //$a = $data->doc("InformationRegister_ПаркТехникиКонтрагента")->key('Контрагент_Key', $contragent_key)->expand("МодельныйРяд")/*->top(3)*/->all();
        //$a = $data->doc("InformationRegister_ЗапчастиКТоварам")->expand('Запчасть')->last();

         //Catalog_ПериодическиеРеквизитыСправочников группы


         $a = $data->doc("InformationRegister_ПериодическиеРеквизитыСправочников")->cast(["Объект", "4ae6ef01-8a12-11e2-8044-005056c00008", "Catalog_Товары"])->key('Реквизит_Key', 'acf2d5f7-eb8e-4e2a-a4fd-c5739cac81fc')->condition()->last();

        return var_dump($a);
    }

}
