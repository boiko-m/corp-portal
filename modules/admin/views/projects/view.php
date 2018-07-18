<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .title-view-projects {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="projects-view">

    <!-- <h1 class="title-view-projects"><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить данный проект?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            'description:ntext',
            'goal:ntext',
            [
                'attribute' => 'create_at',
                'value' => function($model) {
                    return date('d.m.Y', $model->create_at);
                },
            ],
            [
                'attribute' => 'close_at',
                'value' => function($model) {
                    return date('d.m.Y', $model->close_at);
                },
            ],
            [
                'attribute' => 'archive',
                'value' => function($model) {
                    $model->archive ? $ret = 'Да' : $ret = 'Нет';
                    return $ret;
                },
            ],
            [
                'attribute' => 'visible',
                'value' => function($model) {
                    $model->visible ? $ret = 'Да' : $ret = 'Нет';
                    return $ret;
                },
            ],
            [
                'attribute' => 'active',
                'value' => function($model) {
                    $model->active ? $ret = 'Да' : $ret = 'Нет';
                    return $ret;
                },
            ],
            [
                'attribute' => 'description_visible',
                'value' => function($model) {
                    $model->description_visible ? $ret = 'Да' : $ret = 'Нет';
                    return $ret;
                },
            ],
            [
                'attribute' => 'create_user',
                'value' => function($model) {
                    $project = app\models\Profile::findOne($model->create_user);
                    return $project->name . "($model->create_user)";
                },
            ],
        ],
    ]) ?>

</div>