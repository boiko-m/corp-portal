<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;

    $this->title = 'Вложения новостей';
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
            [
                'attribute' => 'link',
                'label' => 'Название',
                'value' => function($model) {
                    return end(explode('/', $model->link));
                }
            ],
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
