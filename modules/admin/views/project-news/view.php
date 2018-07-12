<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'Новости проектов', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div class="project-news-view">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

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
            'create_at',
            'create_user',
        ],
    ]) ?>

</div>
