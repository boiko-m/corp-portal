<?php
	use yii\helpers\Html;

	$this->title = 'Создание вложения';
	$this->params['breadcrumbs'][] = ['label' => 'Вложения сообщений', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .title-create-attachments-message {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="attachments-message-create">

    <h1 class="title-create-attachments-message"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
