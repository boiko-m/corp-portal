<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация пользователя';
//$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row m-b-30">
    <div class="col text-center">
        Для восстановления/создания пароля получите подтверждение о смене/установке нового пароля.
    </div>
</div>

<div class="row">
    <div class="col text-left">
        
            <div class="form-group row">
                <label for="inputEmail3" class="col-12 col-form-label">Электронная почта<span class="text-danger">*</span></label>
                <div class="col-12">
                    <input name = "password_reset" type="email" required="true" parsley-type="email" class="form-control " placeholder="lbr@lbr.ru" id = "password_reset">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <a onclick = "" type="submit" class="btn btn-gradient waves-effect waves-light" style="background:#495a6f!important" id = "reset_email">
                        Восстановить/Создать пароль
                    </a>
                    <a href = "/" type="reset" class="btn btn-light waves-effect">
                        Отмена
                    </a>
                </div>
            </div>
       
    </div>
</div>
<script>
    var a = $('#password_reset').val();
    $('#password_reset').on('change', function() {
        var a = $(this).val();
    });

    $("#reset_email").click(function() {
        ajax('/user/login', 'reset_email=' + $('#password_reset').val(), 'account-content', 'Ожидайте, идет отправка письма!')
    });
</script>