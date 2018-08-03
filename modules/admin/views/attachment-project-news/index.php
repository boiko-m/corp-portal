<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;

    $this->title = 'Вложения новостей';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="attachment-project-news-index">

    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Создать вложение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:4%'],
            ],
            'link',
            [
                'attribute' => 'type',
                'value' => function($model) {
                    $model->type == 0 ? $type = 'Ссылка' : null;
                    $model->type == 1 ? $type = 'Видео' : null;
                    $model->type == 2 ? $type = 'Файл' : null;
                    return $type;
                },
                'headerOptions' => ['style' => 'width:8%'],
            ],
            [
                'attribute' => 'create_at',
                'value' => function($model) {
                    return date('d.m.Y', $model->create_at);
                },
                'headerOptions' => ['style' => 'width:8%'],
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
