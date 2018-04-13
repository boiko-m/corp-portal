<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = "Профиль: " . $model->first_name . " " . $model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
	<div class="col-xs-12 col-md-4">
        <div class="card m-b-30" style="padding: 20px;">
            <img class="card-img-top img-fluid" src="http://portal.lbr.ru/img/user/thumbnail_<?=$model->img?>" alt="Card image cap" style = "border-radius: 5px">
            <div class="card-body" style="padding: 10px 0px">
                <h5 class="card-title" style="font-weight: bold;color: black"><?=$model->first_name?> <?=$model->last_name?></h5>
                <p class="card-text">
                    <?=$model->department?> <br>
                    <?=$model->position?> <br>
                </p>
                <p class="card-text">
                    <small class="text-muted">Был в сети 3 минуты назад</small>
                </p>
            </div>
        </div>
    </div>
</div>