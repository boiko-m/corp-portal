<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Videos */

$this->title = 'Видео';
$this->params['breadcrumbs'][] = ['label' => 'Список видео', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>

<style>
    .title-view-video {
        text-align: center;
    }
</style>

<div class="videos-view">

    <h1 class="title-view-video"><?= Html::encode($model->name) ?></h1>

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
            'name:ntext',
            'description:ntext',
            'link:ntext',
            'img:ntext',
            'id_category',
            'id_user',
            // 'date:ntext',
            [
                'attribute' => 'date',
                'format' => ['date', 'l jS \of F Y h:i:s A']
            ],
            'comment_accept',
            'youtube_views',
            'right_module',
        ],
    ]) ?>

</div>
