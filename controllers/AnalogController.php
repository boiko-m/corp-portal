<?php

namespace app\controllers;



class AnalogController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$this->layout = false;
        return $this->renderPartial('index');
    }
    

}
