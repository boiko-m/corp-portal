<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список новостей';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .title-list-news {
        text-align: center;
    }
</style>

<div class="news-index">

    <h1 class="title-list-news"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить новость', ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute' => 'date',
                'format' => ['date', 'dd.MM.yyyy h:i:a'],
                'headerOptions' => ['style' => 'width:18%'],
            ],
            'title:ntext',
            // 'content:ntext',
            'status',
            //'img_icon:ntext',
            //'id_user',
            //'status',
            //'like_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
