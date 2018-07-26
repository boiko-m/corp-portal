<?php
	use yii\helpers\Html;

	$this->title = 'Создание трансляции';
	$this->params['breadcrumbs'][] = ['label' => 'Трансляции', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="broadcast-create">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
