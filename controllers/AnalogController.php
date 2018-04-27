<?php

namespace app\controllers;



class AnalogController extends \yii\web\Controller
{
    public function actionIndex($json = null)
    {
    	$this->layout = false;
    	$this->enableCsrfValidation = false;
    	
        return $this->renderPartial('index');
    }
    

}
