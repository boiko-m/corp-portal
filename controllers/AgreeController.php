<?php

namespace app\controllers;



class AgreeController extends \yii\web\Controller
{
    /**
     * @var integer
     */
    public $id;
    private $name;
    private $content;
    private $date;

    public function actionIndex($json = null)
    {
        return $this->renderPartial('index');
    }





}
