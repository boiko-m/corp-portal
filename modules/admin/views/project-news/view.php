<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'Новости проектов', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="project-news-view">

    <!-- <h1 class="crud-title"><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить данную новость?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'short_description',
            'content:ntext',
            [
                'attribute' => 'id_project',
                'value' => function($model) {
                    $project = app\models\Projects::findOne($model->id_project);
                    return $project->name;
                },
            ],
            'avatar',
            [
                'attribute' => 'create_at',
                'value' => function($model) {
                    return date('d.m.Y', $model->create_at);
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
