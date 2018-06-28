<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Группы диалогов', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .title-view-group-im {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="im-groups-view">

    <h1 class="title-view-group-im"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить данную группу?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'avatar',
            'id_type_group_im',
        ],
    ]) ?>

</div>
