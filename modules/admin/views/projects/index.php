<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;

    $this->title = 'Проекты';
    $this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .title-projects {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="projects-index">

    <h1 class="title-projects"><?= Html::encode($this->title) ?></h1>
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
            'create_at',
            'close_at',
            //'archive',
            //'create_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
