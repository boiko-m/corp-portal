<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
//echo "<pre>".print_r($exception, true)."</pre>";
?>


<div class="row">
    <div class="col-sm-6 offset-3">
        <div class="text-center mt-5">
            <h1 class="text-error"><?=$exception->statusCode?></h1>
            <h4 class="text-uppercase text-danger mt-3">Упс! Что-то пошло не так...</h4>
            <p class="text-muted mt-3">
                <?= nl2br(Html::encode($message)) ?>
            </p>
            <a class="btn btn-md btn-warning waves-effect waves-light mt-3" href="/">На главную</a>
        </div>
    </div>
</div>
