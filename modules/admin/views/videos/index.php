<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VideosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список видео';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .title-list-video {
        text-align: center;
    }
</style>

<div class="videos-index">

    <h1 class="title-list-video"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить видео', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:7%'],
            ],
            'name:ntext',
            'description:ntext',
            'link:ntext',
            'img:ntext',
            //'id_category',
            //'id_user',
            //'date:ntext',
            //'comment_accept',
            //'youtube_views',
            //'right_module',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
