<?php

	use yii\helpers\Html;


	/* @var $this yii\web\View */
	/* @var $model app\models\SettingOptions */

	$this->title = 'Создание пользовательской настройки';
	$this->params['breadcrumbs'][] = ['label' => 'Пользовательские настройки', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;

?>

<style>
    .title-create-user-options {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="setting-options-create">

    <h1 class="title-create-user-options"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
