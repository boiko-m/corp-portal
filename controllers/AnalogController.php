<?php

namespace app\controllers;



class AnalogController extends \yii\web\Controller
{
    public function actionIndex($json = null)
    {
    	  $this->layout = false;
        return $this->renderPartial('index');
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = ($action->id !== "index");
        return parent::beforeAction($action);
    }



}
