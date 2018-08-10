<?php
	use yii\helpers\Html;

	$this->title = 'Создание категории подарков';
	$this->params['breadcrumbs'][] = ['label' => 'Катерогии подарков', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gift-type-create">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
