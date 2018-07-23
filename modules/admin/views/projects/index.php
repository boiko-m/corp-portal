<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;

    $this->title = 'Проекты';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="projects-index">

    <!-- <h1 class="crud-title"><?= Html::encode($this->title) ?></h1> -->
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать проект', ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute' => 'archive',
                'format' => 'boolean',
                'headerOptions' => ['style' => 'width:9%'],
            ],
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
                'template' => '
                    {view}
                    {update}
                    {delete}
                    {appointments}
                ',
                'buttons' => [
                    'appointments' => function () {
                        return Html::a('<i class="fa fa-user-plus"></i>', '/admin/project-user/create', [
                            'title' => 'Создать назначение',
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
