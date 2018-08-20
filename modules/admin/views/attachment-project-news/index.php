<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;

    $this->title = 'Подшитые файлы';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="attachment-project-news-index">

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:4%'],
            ],
            'name',
            [
                'attribute' => 'type',
                'value' => function($model) {
                    $type = $model->type == 0 ? 'Ссылка' : null;
                    $type = $model->type == 1 ? 'Видео' : null;
                    $type = $model->type == 2 ? 'Файл' : null;
                    return $type;
                },
                'headerOptions' => ['style' => 'width:8%'],
            ],
            [
                'attribute' => 'create_at',
                'format' => ['date', 'php:d.m.Y'],
                'headerOptions' => ['style' => 'width:13%'],
            ],
            [
                'attribute' => 'create_user',
                'value' => 'createProfile.name',
            ],
            [
                'attribute' => 'id_project_news',
                'value' => 'projectNews.title',
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Действия',
                'headerOptions' => ['style' => 'width: 10%'],
                'template' => '
                    {view}
                    {update}
                    {delete}
                    {go_ever}
                    {attachments}
                ',
                'buttons' => [
                    'go_ever' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-tv"></i>', 'http://portal.lbr.ru/view-attachment/view/' . $model->id, [
                            'title' => 'Перейти к просмотру',
                            'target' => '_blank',
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
