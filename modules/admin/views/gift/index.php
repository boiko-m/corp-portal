<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Подарки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gift-index">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать подарок', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:5%'],
            ],
            [
                'attribute' => 'name',
                'headerOptions' => ['style' => 'width:20%'],
            ],
            [
                'attribute' => 'img',
                'format' => ['image', ['width' => '30', 'height' => '30']],
                'headerOptions' => ['style' => 'width:5%'],
            ],
            [
                'attribute' => 'id_user',
                'value' => 'profile.name',
                'headerOptions' => ['style' => 'width:23%'],
            ],
            [
                'attribute' => 'date',
                'format' => ['date', 'php:d.m.Y'],
                'headerOptions' => ['style' => 'width:15%'],
            ],
            [
                'attribute' => 'sum_coin',
                'headerOptions' => ['style' => 'width:17%'],
            ],
            //'id_gift_type',
            [
                'attribute' => 'visible',
                'format' => 'boolean',
                'headerOptions' => ['style' => 'width:11%'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'pager' => [
            'options'=>['class' => 'pagination float-right'],
            'linkOptions' => ['class' => 'page-link'],
            'hideOnSinglePage' => true,
            'disabledPageCssClass' => 'page-link'
        ],
    ]); ?>
</div>
