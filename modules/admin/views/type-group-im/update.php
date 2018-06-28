<?php
	use yii\helpers\Html;

	$this->title = 'Редактирование';
	$this->params['breadcrumbs'][] = ['label' => 'Тип групп диалогов', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .title-update-tyoe-group-im {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="type-group-im-update">

    <h1 class="title-update-tyoe-group-im"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
