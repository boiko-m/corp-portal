<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;

    $this->title = 'Проекты';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="projects-index">

    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Создать проект', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:3%'],
            ],
            'name:ntext',
            // [
            //     'attribute' => 'archive',
            //     'format' => 'boolean',
            //     'headerOptions' => ['style' => 'width:9%'],
            // ],
            [
                'attribute' => 'visible',
                'format' => 'boolean',
                'headerOptions' => ['style' => 'width:9%'],
            ],
            [
                'attribute' => 'description_visible',
                'format' => 'boolean',
                'headerOptions' => ['style' => 'width:17%'],
            ],
            [
                'attribute' => 'active',
                'format' => 'boolean',
                'headerOptions' => ['style' => 'width:10%'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['style' => 'width: auto'],
                'template' => '
                    {view}
                    {update}
                    {delete}
                    {appointments}
                ',
                'buttons' => [
                    'appointments' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-user-plus"></i>', ['/admin/project-user/create/', 'id' => $model->id], [
                            'title' => 'Создать назначение',
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
