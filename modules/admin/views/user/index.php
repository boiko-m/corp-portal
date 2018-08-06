<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Пользователи';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать данные авторизации', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            //'email:email',
            //'status',
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '
                    {view}
                    {update}
                    {delete}
                    {auth}
                ',
                'buttons' => [
                    'auth' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-user"></span>', $url, [
                            'title' => 'Авторизироваться',
                            'data-confirm' => "Вы уверены, что хотите авторизироваться под этим пользователем?"
                        ]);
                    },
                ]

            ],
        ],
    ]); ?>
</div>
