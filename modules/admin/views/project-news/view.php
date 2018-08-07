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
            'content:html',
            [
                'attribute' => 'project.name',
                'label' => 'Проект',
            ],
            [
                'attribute' => 'avatar',
                'format' => ['image', ['width' => '100', 'height' => '100']],
                'value' => function($model) {
                    return '/img/project-news/' . $model->avatar;
                },
            ],
            [
                'attribute' => 'create_at',
                'format' => ['date', 'php:d.m.Y'],
            ],
            [
                'attribute' => 'visible',
                'format' => 'boolean',
            ],
            [
                'attribute' => 'profile.name',
                'label' => 'Создатель',
            ],
        ],
    ]) ?>

</div>
