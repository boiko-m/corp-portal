<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;

    $this->title = 'Опросы';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="questionnaire-index">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Создать опрос', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:7%'],
            ],
            'name',
            'description:ntext',
            [
                'attribute' => 'type',
                'format' => 'boolean',
                'headerOptions' => ['style' => 'width:15%']
            ],
            [
                'attribute' => 'create_at',
                'format' => ['date', 'php:d.m.Y'],
                'headerOptions' => ['style' => 'width:8%'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'template' => '
                    {view}
                    {update}
                    {delete}
                    {charts}
                ',
                'buttons' => [
                    'charts' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-line-chart" aria-hidden="true"></i>', ['/admin/questionnaire/charts/', 'id' => $model->id], [
                            'title' => 'Статистика',
                        ]);
                    },
                ]
            ],
        ],
        'pager' => [
            'options'=>['class' => 'pagination float-right'],
            'linkOptions' => ['class' => 'page-link'],
            'hideOnSinglePage' => true,
            'disabledPageCssClass' => 'page-link'
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
