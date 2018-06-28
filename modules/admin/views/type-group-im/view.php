<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Тип групп диалогов', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .title-view-type-group-im {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="type-group-im-view">

    <h1 class="title-view-type-group-im"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить данный тип?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'code',
        ],
    ]) ?>

</div>
