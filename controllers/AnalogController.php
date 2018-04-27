<?php

namespace app\controllers;



class AnalogController extends \yii\web\Controller
{
    public function actionIndex()
    {

        return $this->renderPartial('index');
    }
    

}
