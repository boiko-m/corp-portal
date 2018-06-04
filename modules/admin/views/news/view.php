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
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'date:ntext',
            'title:ntext',
            'content:ntext',
            'type',
            'img_icon:ntext',
            'id_user',
            'status',
            'like_active',
        ],
    ]) ?>

</div>
