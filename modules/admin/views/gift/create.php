<?php
	use yii\helpers\Html;

	$this->title = 'Создание подарка';
	$this->params['breadcrumbs'][] = ['label' => 'Подарки', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>

<div class="gift-create">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
