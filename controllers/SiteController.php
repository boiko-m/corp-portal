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
        $time_online = time() - 180;
        $online = Profile::find()->where(['>','last_visit',$time_online])->all();
        $countOnline = count($online);


        $birthdays = Profile::find()->where("birthday LIKE '%".date('m-d')."'")->all();
        return $this->render('index', [
            "news" => News::find()->where(['status' => 1])->orderBy('id desc')->limit(5)->all(),
            'video' => Videos::find()->orderBy('id desc')->one(),
            'user_new' => Profile::find()->orderBy('date_job desc')->limit(3)->all(),
            'online' => Session::getOnline(),
            'birthdays' => $birthdays,
            'online' =>$online,
            'countOnline' =>$countOnline,
        ]);
    }

    public function actionTooltip(){
        $post = Yii::$app->request->post();
        $time_online = time() - 180;
        $profile = Profile::find()->where(['id' => $post['data']])->one();
        if($profile->last_visit > $time_online && $profile->last_visit != null){
            $online = "<span style='color: #008000'>online</span>";
        }
        elseif( $profile->last_visit != null){
            if($profile->sex == 1){
                $online = 'был в сети: '.date('G:i d.m' ,$profile->last_visit);
            }
            if($profile->sex == 2){
                $online = 'была в сети: '.date('G:i d.m' ,$profile->last_visit);
            }
        }
        else{
            if($profile->sex == 1){
                $online = 'не был на портале';
            }
            if($profile->sex == 2){
                $online = 'не была на портале';
            }
        }
        $a = $this->renderAjax('tooltip', compact('profile', 'online'));
        return $a;
    }

    public function actionData(){

        $post = Yii::$app->request->post();
        $time_online = time() - 180;
        $profile = Profile::find()->where(['id' => $post['data']])->one();
        $a = $this->renderAjax('dataajax', compact('profile'));

        return $a;
    }

}
