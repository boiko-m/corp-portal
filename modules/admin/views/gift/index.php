<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GiftSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gifts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gift-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gift', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
            'img:ntext',
            'id_user',
            'date:ntext',
            //'sum_coin',
            //'id_gift_type',
            //'visible',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
