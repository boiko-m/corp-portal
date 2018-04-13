<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>


<div class="row">
    <div class="col-sm-6 offset-3">
        <div class="text-center mt-5">
            <h1 class="text-error">404</h1>
            <h4 class="text-uppercase text-danger mt-3"><?= nl2br(Html::encode($message)) ?></h4>
            <p class="text-muted mt-3">
                Извините! Страница, которую Вы ищете, не может быть найдена...
            </p>
            <a class="btn btn-md btn-gradient waves-effect waves-light mt-3" href="/">На главную</a>
        </div>
    </div>
</div>
