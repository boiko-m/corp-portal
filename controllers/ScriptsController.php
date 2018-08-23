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

use app\models\Scripts;

class ScriptsController extends Controller
{
    /**
     * {@inheritdoc}
     */
     public function behaviors()
     {
         return [
             'access' => [
                 'class' => AccessControl::className(),
                 'rules' => [
                     [
                         'allow' => true,
                     ],
                 ],
             ]
         ];
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

    public function actionIndex()
    {
        $scripts = Scripts::find()->orderBy('id asc')->where(['id_fk_scripts' => null])->all();
        return $this->render('index', compact("scripts"));
    }
    public function actionUpdate($id, $reset = null) {
        if ($reset) {
            $reset=true;
            $scripts = Scripts::find()->orderBy('id asc')->where(['id_fk_scripts' => null])->all();
        } else {
            $data = Scripts::find()->where(['id' => $id])->one();
            $answers = Scripts::find()->orderBy('id desc')->where(['id_fk_scripts' => $id])->all();
            if (!$answers and $data['redir']) {
                $data = Scripts::find()->where(['id' => $data['redir']])->one();
            }
        }


        return $this->renderPartial('view', compact("data", "answers", "reset", "scripts"));
    }


}
