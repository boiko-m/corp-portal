<?php
	use yii\helpers\Html;

	$this->title = 'Редактирование';
	$this->params['breadcrumbs'][] = ['label' => 'Вложения сообщений', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Update';
?>

<style>
    .title-update-attachments-message {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="attachments-message-update">

    <h1 class="title-update-attachments-message"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
