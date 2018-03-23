<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\ContactForm;

class DocumentsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect(['documents/it']);
    }

    /**
     * Displays Presentations
     *
     * @return string
     */
    public function actionIt()
    {
        return $this->render('it');
    }

    public function actionCatalog()
    {
        return $this->render('catalog');
    }


}
