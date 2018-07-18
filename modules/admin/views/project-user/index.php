<?php
    use yii\helpers\Html;
    use yii\grid\GridView;
    use yii\widgets\Pjax;
    use app\models\ProjectUserGroup;
    use app\models\Profile;
    use app\models\Projects;

    $this->title = 'Назначения пользователей';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-user-index">

    <!-- <h1 class="crud-title"><?= Html::encode($this->title) ?></h1> -->
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать назначение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'id_project',
                'value' => function($model) {
                    return (Projects::findOne($model->id_project))->name;
                },
            ],
            [
                'attribute' => 'id_user',
                'value' => function($model) {
                    return (Profile::findOne($model->id_user))->name;
                },
            ],
            [
                'attribute' => 'id_project_user_group',
                'value' => function($model) {
                    return (ProjectUserGroup::findOne($model->id_project_user_group))->name;
                },
            ],
            [
                'attribute' => 'create_at',
                'value' => function($model) {
                    return date('d.m.Y', $model->create_at);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
