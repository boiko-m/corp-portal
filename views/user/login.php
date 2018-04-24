<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация пользователя';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?php if ($_GET['password_reset']): ?>
    На вашу почту <?=$_GET['password_reset']?> отправлено письмо с дальнейшими действиями. 
<?php exit;endif ?>


<section style="background: #f1f1f1!important">
    <div class="container" >
        <div class="row" st>
            <div class="col-sm-12">

                <div class="wrapper-page">
                 
                    <div class="account-pages">


                        <div class="account-box" >
                            <div class="alert alert-danger   show" role="alert" style="margin: 0px;text-align: center;">
                                        
                                        <small>Портал переведен на новую версию! <br>
                                        Если у вас возникли проблемы со входом смените ваш пароль.</small>
                                    </div>

                            <div class="account-logo-box">
                                <h2 class="text-uppercase text-center">
                                    <a href="/" class="text-success">
                                        <span><img src="/images/logo_dark.png" alt="" height="32"></span>
                                    </a>
                                </h2>
                            </div>
                            
                            <div class="account-content" id = "account-content">
                                <?php if ($_GET['password_save']): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 0px;margin-bottom: 20px;">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        Пароль успешно изменен!
                                    </div>
                                <?php endif ?>

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
                                            
                                            <?= $form->field($model, 'password')->passwordInput(['placeholder' => "Введите ваш пароль"])->label("Пароль") ?>

                                        </div>
                                    </div>
                                   
                                    <div class="form-group row m-b-0" style="margin:0px -10px">
                                        <div class="col-12">

                                            <div class="checkbox checkbox-success">
                                                <?= $form->field($model, 'rememberMe')->checkbox([
                                                    'template' => "{input} {label}\n<div>{error}</div>",
                                                ])->label("Запомнить") ?>
                                            </div>

                                        </div>
                                    </div>
                                     <div class="col-12 m-b-300">
                                            <a href = "#reset" onclick = "ajax('/user/login','reset=true','account-content')" class=" text-center" style="color: black!important;text-align: center;"><small>Я новый пользователь. Я забыл свой пароль. Что делать? <br> <br></small></a>
                                        </div>
                                    
                                    <div class="form-group row text-center m-t-10">
                                        <div class="col-12">
                                            <?= Html::submitButton(
                                                'Войти',
                                                ['style' => 'background:#495a6f!important','class' => 'btn btn-block btn-gradient waves-effect waves-light', 'name' => 'login-button']
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

