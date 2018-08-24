<?php

namespace app\modules\calltouch\controllers;

use yii\web\Controller;

/**
 * Default controller for the `calltouch` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = ($action->id !== "index");
        return parent::beforeAction($action);
    }
    
}
