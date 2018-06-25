<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AttachmentsMessage */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Вложения сообщений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .title-view-attachments-message {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="attachments-message-view">

    <h1 class="title-view-attachments-message"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить данное вложение?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            'name',
            'link',
            'type',
            'id_message',
        ],
    ]) ?>

</div>
