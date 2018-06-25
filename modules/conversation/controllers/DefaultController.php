<?php

namespace app\modules\conversation\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;

/**
 * Default controller for the `im` module
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
}
