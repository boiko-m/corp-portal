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
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать опрос', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
                'headerOptions' => ['style' => 'width:13%']
            ],
            [
                'attribute' => 'create_at',
                'value' => function($model) {
                    return date('d.m.Y', $model->create_at);
                },
                'headerOptions' => ['style' => 'width:8%'],
            ],
            //'create_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
