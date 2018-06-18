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
use app\models\News;
use app\models\Videos;
use app\models\User;
use app\models\Session;
use app\models\Profile;
use yii\db\Query;
use yii\helpers\Json;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $birthdays = Profile::find()->where("birthday LIKE '%".date('m-d')."'")->all();
        return $this->render('index', [
            "news" => News::find()->where(['status' => 1])->orderBy('id desc')->limit(5)->all(),
            'video' => Videos::find()->orderBy('id desc')->one(),
            'user_new' => Profile::find()->orderBy('date_job desc')->limit(3)->all(),
            'online' => Session::getOnline(),
            'birthdays' => $birthdays,
        ]);
    }


}
