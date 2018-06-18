<?php

	use yii\helpers\Html;

	/* @var $this yii\web\View */
	/* @var $model app\models\SettingOptions */

	$this->title = 'Редактирование';
	$this->params['breadcrumbs'][] = ['label' => 'Пользовательские настройки', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Редактирование';

?>

<style>
    .title-update-user-options {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="setting-options-update">

    <h1 class="title-update-user-options"><?= $model->name ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
