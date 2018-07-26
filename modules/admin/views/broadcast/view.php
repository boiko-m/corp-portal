<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Трансляции', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="broadcast-view">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить данную трансляцию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'link',
            'name:ntext',
            'description:ntext',
            [
                'attribute' => 'close_at',
                'value' => function($model) {
                    return $model->close_at == null ? 'Трансляция не завершена' : date('d.m.Y', $model->close_at);
                },
            ],
            [
                'attribute' => 'close_at',
                'value' => function($model) {
                    return $model->close_at == null ? 'Трансляция не завершена' : date('d.m.Y', $model->close_at);
                },
            ],
            [
                'attribute' => 'complete',
                'format' => 'boolean',
            ],
            [
                'attribute' => 'create_user',
                'value' => function($model) {
                    $profile = app\models\Profile::findOne($model->create_user);
                    return $profile->name . "($model->create_user)";
                },
            ],
        ],
    ]) ?>

</div>
