<?php
	use yii\helpers\Html;

	$this->title = 'Редактирование Филиала';
	$this->params['breadcrumbs'][] = ['label' => 'Филиалы', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="filials-update">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
