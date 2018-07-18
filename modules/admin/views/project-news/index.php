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

            'id',
            'title',
            [
                'attribute' => 'id_project',
                'value' => function($model) {
                    $project = app\models\Projects::findOne($model->id_project);
                    return $project->name;
                },
            ],
            [
                'attribute' => 'create_at',
                'value' => function($model) {
                    return date('d.m.Y', $model->create_at);
                },
            ],
            [
                'attribute' => 'visible',
                'value' => function($model) {
                    $model->visible ? $ret = 'Да' : $ret = 'Нет';
                    return $ret;
                },
            ],
            // 'short_description',
            // 'content:ntext',
            // 'avatar',
            //'create_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
