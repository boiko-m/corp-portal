<?php
	use yii\helpers\Html;

	$this->title = 'Редоктирование группы диалогов';
	$this->params['breadcrumbs'][] = ['label' => 'Группы диалогов', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Редактирование';
?>

<style>
    .title-update-group-im {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="im-groups-update">

    <h1 class="title-update-group-im"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
