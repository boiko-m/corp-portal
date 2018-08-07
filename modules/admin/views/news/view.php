<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = 'Новость';
$this->params['breadcrumbs'][] = ['label' => 'Список новостей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
?>

<style>
  .title-view {
    text-align: center;
  }
</style>

<div class="news-view">

    <h1 class="title-view"><?= Html::encode($model->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'date',
                'format' => ['date', 'php:d.m.Y'],
            ],
            'title:ntext',
            'content:html',
            'type:boolean',
            [
                'attribute' => 'img_icon',
                'format' => ['image', ['width' => '150', 'height' => '100']],
            ],
            [
                'attribute' => 'profile.name',
                'label' => 'Создатель',
            ],
            'status:boolean',
            'like_active:boolean',
            [
                'attribute' => 'newsCategory.name',
                'label' => 'Категория',
            ]
        ],
    ]) ?>

</div>
