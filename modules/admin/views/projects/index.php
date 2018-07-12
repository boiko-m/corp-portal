<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;

    $this->title = 'Проекты';
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="projects-index">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>
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

            'id',
            'name:ntext',
            // 'description:ntext',
            'goal:ntext',
            // 'create_at',
            // 'close_at',
            [
                'attribute' => 'archive',
                'value' => function($model) {
                    $model->archive ? $ret = 'Да' : $ret = 'Нет';
                    return $ret;
                },
                'headerOptions' => ['style' => 'width:12%'],
            ],
            [
                'attribute' => 'visible',
                'value' => function($model) {
                    $model->visible ? $ret = 'Да' : $ret = 'Нет';
                    return $ret;
                },
                'headerOptions' => ['style' => 'width:12%'],
            ],
            [
                'attribute' => 'active',
                'value' => function($model) {
                    $model->active ? $ret = 'Да' : $ret = 'Нет';
                    return $ret;
                },
                'headerOptions' => ['style' => 'width:12%'],
            ],
            //'create_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
