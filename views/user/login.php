<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация пользователя';
//$this->params['breadcrumbs'][] = $this->title;
?>

<section style="background: #f1f1f1!important">
    <div class="container" >
        <div class="row" st>
            <div class="col-sm-12">

                <div class="wrapper-page">

                    <div class="account-pages">
                        <div class="account-box">
                            <div class="account-logo-box">
                                <h2 class="text-uppercase text-center" style="background: #3c86d8; border-radius: 5px; padding: 5px;">
                                    <a href="/" class="text-success">
                                        <span><img src="/images/logo.png" alt="" height="32"></span>
                                    </a>
                                </h2>
                                <h6 class="text-uppercase text-center font-bold mt-4">Авторизация пользователя</h6>
                            </div>
                            <div class="account-content">
                                <?php $form = ActiveForm::begin([
                                    'id' => 'login-form',
                                    'layout' => 'horizontal',
                                    'fieldConfig' => [
                                        'template' => "{label}\n{input}\n<div class=\"login-form-error\">{error}</div>",
                                        'labelOptions' => ['class' => 'form-horizontal'],
                                    ],
                                ]); ?>

                                    <div class="form-group m-b-20 row">
                                        <div class="col-12">
                                            <?/*<label for="emailaddress">Email address</label>
                                            <input class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email">*/?>

                                            <?= $form->field($model, 'username')->textInput(['placeholder' => "Введите ваш логин в 1C"])->label("Логин") ?>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-20">
                                        <div class="col-12">
                                            <?/*<label for="password">Password</label>
                                            <input class="form-control" type="password" required="" id="password" placeholder="Enter your password">*/?>
                                            <a href="javascript:void(0);" class="text-muted pull-right"><small>Забыли пароль?</small></a>
                                            <?= $form->field($model, 'password')->passwordInput(['placeholder' => "Введите ваш пароль"])->label("Пароль") ?>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-20">
                                        <div class="col-12">

                                            <div class="checkbox checkbox-success">
                                                <?= $form->field($model, 'rememberMe')->checkbox([
                                                    'template' => "{input} {label}\n<div>{error}</div>",
                                                ])->label("Запомнить") ?>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group row text-center m-t-10">
                                        <div class="col-12">
                                            <?= Html::submitButton(
                                                'Войти',
                                                ['class' => 'btn btn-block btn-gradient waves-effect waves-light', 'name' => 'login-button']
                                            ) ?>
                                        </div>
                                    </div>

                                <?php ActiveForm::end(); ?>

                            </div>
                        </div>
                    </div>
                    <!-- end card-box-->
                </div>
                <!-- end wrapper -->

            </div>
        </div>
    </div>
</section>
