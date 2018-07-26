<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;

    $this->title = 'Трансляции';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="broadcast-index">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Создать трансляцию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name:ntext',
            // 'description:ntext',
            [
                'attribute' => 'create_at',
                'value' => function($model) {
                    return date('d.m.Y', $model->create_at);
                },
                'headerOptions' => ['style' => 'width:13%'],
            ],
            [
                'attribute' => 'close_at',
                'value' => function($model) {
                    return $model->close_at == null ? 'Трансляция не завершена' : date('d.m.Y', $model->close_at);
                },
                'headerOptions' => ['style' => 'width:13%'],
            ],
            [
                'attribute' => 'complete',
                'format' => 'boolean',
            ],
            //'create_user',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '
                    {view}
                    {update}
                    {delete}
                    {go_ever}
                ',
                'buttons' => [
                    'go_ever' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-tv"></i>', '/broadcast/'.$model->id, [
                            'title' => 'Перейти к просмотру',
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
