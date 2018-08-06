<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;

    $this->title = 'Новости проектов';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="project-news-index">

    <!-- <h1 class="crud-title"><?= Html::encode($this->title) ?></h1> -->
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новость проекта', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:3%'],
            ],
            'title',
            [
                'attribute' => 'id_project',
                'value' => 'project.name'
            ],
            [
                'attribute' => 'create_at',
                'value' => function($model) {
                    return date('d.m.Y', $model->create_at);
                },
                'headerOptions' => ['style' => 'width:13%'],
            ],
            [
                'attribute' => 'visible',
                'label' => 'Видимость',
                'format' => 'boolean',
                'headerOptions' => ['style' => 'width:11%'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '
                    {view}
                    {update}
                    {delete}
                    {go_ever}
                    {attachments}
                ',
                'buttons' => [
                    'go_ever' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-tv"></i>', '/project-news/'.$model->id, [
                            'title' => 'Перейти к просмотру',
                        ]);
                    },
                    'attachments' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-paperclip"></i>', ['/admin/attachment-project-news/create/', 'id' => $model->id], [
                            'title' => 'Добавить вложение',
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
