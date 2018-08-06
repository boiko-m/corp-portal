<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = $model->username;
    $this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Подумайте, прежде чем удалять данные пользователя!',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'status',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:d.m.Y'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:d.m.Y'],
            ],
        ],
    ]) ?>

</div>
