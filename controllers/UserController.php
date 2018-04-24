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


class UserController extends Controller
{
    public $layout = 'form';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            /*'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin($reset=null,$reset_email=null, $email=null)
    {
        if ($email) {
            
            $user = User::find()->where(["password_reset_token" => $email])->one();
            if ($user) {
                $true_password = "Вы успешно сгенерировали пароль. Мы васлали вам его на почту.";

                $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
                $max=10;
                $size=StrLen($chars)-1; 
                while($max--) $password.=$chars[rand(0,$size)]; 

                $user->password_hash = md5($password);
                $user->password_reset_token = Yii::$app->security->generateRandomString();
                $user->save();

                Yii::$app->mailer->compose()
                 ->setTo($user->email)
                 ->setSubject("Установлен новый пароль.")
                 ->setTextBody("Для доступа на портал используйте следующий пароль: ". $password)
                 ->send();

                $this->redirect("/user/login/?password_save=true");
            } else {
                $true_password = "Ключа не существует.";
            }
        }



        if ($reset_email) {

            $user = User::find()->where(["email" => $reset_email])->one();
            if ($user) {
                if ($user->password_hash) {
                    $subject = "Смена пароля.";
                    $body = "";
                } else {
                    $subject = "Добро пожаловать.";
                }
                $user->password_reset_token = Yii::$app->security->generateRandomString();
                $user->save();

                $body = 'Для создания нового пароля скопируйте и перейдите по ссылке: <a href = "http:/portal.lbr.ru/user/login/?email='.$user->password_reset_token.'"> Ссылка на генерацию нового пароля </a>';

                Yii::$app->mailer->compose()
                 ->setTo($reset_email)
                 ->setSubject($subject)
                 ->setTextBody($body)
                 ->send();

                 echo "<div style = 'text-align:center;'>Посмотрите инструкцию на почте со следующими указаниями. <br> <a href = '/'>На главную</a></div>";
                 exit;

            } else {
                return $this->goHome();
            }
            

            
        }

        if ($reset) {
            return $this->render('reset', [
                'model' => $model,
            ]);
        }

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
            'true_password' => $true_password
        ]);
    }

    public function actionReset() {
        return $this->render('reset', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
