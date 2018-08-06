<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Профили';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать профиль', ['create'], ['class' => 'btn btn-success']) ?>
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
