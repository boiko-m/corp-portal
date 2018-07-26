<?php
	use yii\helpers\Html;

	$this->title = 'Редактирование трансляции';
	$this->params['breadcrumbs'][] = ['label' => 'Трансляции', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="broadcast-update">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
