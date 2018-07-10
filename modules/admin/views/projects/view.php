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

    <h1 class="title-view-projects"><?= Html::encode($this->title) ?></h1>

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
            'create_at',
            'close_at',
            [
                'attribute' => 'archive',
                'value' => function($model) {
                    $model->archive ? $ret = 'Да' : $ret = 'Нет';
                    return $ret;
                },
                'headerOptions' => ['style' => 'width:12%'],
            ],
            'create_user',
        ],
    ]) ?>

</div>