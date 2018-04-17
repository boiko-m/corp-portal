<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_1c',
            'first_name',
            'last_name',
            'middle_name',
            //'birthday',
            //'date_job',
            //'sex',
            //'skype',
            //'phone1',
            //'phone2',
            //'branch',
            //'position',
            //'department',
            //'cabinet',
            //'phone_cabinet',
            //'about:ntext',
            //'category',
            //'service',
            //'sip',
            //'img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
