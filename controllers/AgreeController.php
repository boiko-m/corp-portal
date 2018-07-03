<?php

namespace app\controllers;



class AgreeController extends \yii\web\Controller
{
    public function actionIndex($json = null)
    {
        return $this->renderPartial('index');
    }




}
