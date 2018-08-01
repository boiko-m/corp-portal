<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Филиалы', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="filials-view">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить филиал?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'id1C',
            'external',
        ],
    ]) ?>

</div>
