<?php
	use yii\helpers\Html;

	$this->title = 'Добавление филиала';
	$this->params['breadcrumbs'][] = ['label' => 'Филиалы', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filials-create">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
