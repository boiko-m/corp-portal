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

        
        $a = $data->doc("Document_ЗаказПокупателя")->top(3)->all();

        return var_dump($a);
    }

}
