<?php
	use yii\helpers\Html;

	$this->title = 'Редактирование подарка';
	$this->params['breadcrumbs'][] = ['label' => 'Подарки', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="gift-update">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
