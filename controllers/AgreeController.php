<?php

namespace app\controllers;



class AgreeController extends \yii\web\Controller
{
    /**
     * @var integer
     */
    private $id;
    private $name;
    private $content;
    private $date;

    public function actionIndex($json = null)
    {
        return $this->renderPartial('index');
    }





}
