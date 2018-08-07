<?php
	use yii\helpers\Html;

	$this->title = 'Создание категории';
	$this->params['breadcrumbs'][] = ['label' => 'Катерогии новостей', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-category-create">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
