<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Вложения новостей', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="attachment-project-news-view">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить вложение?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:4%'],
            ],
            'link',
            'name',
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
                'value' => function($model) {
                    $profile = app\models\Profile::findOne($model->create_user);
                    return $profile->name . " ($model->create_user)";
                },
            ],
            [
                'attribute' => 'id_project_news',
                'value' => function($model) {
                    $project = app\models\Projects::findOne($model->id_project_news);
                    return $project->name;
                },
            ],
        ],
    ]) ?>

</div>
