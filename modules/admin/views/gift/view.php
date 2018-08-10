<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gift */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Подарки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gift-view">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить подарок?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            'img:ntext',
            'profile.name',
            'date:date',
            'sum_coin',
            'giftType.name',
            'visible:boolean',
        ],
    ]) ?>

</div>
