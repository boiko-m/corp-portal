<?php
	use yii\helpers\Html;

	$this->title = 'Создание новости проекта';
	$this->params['breadcrumbs'][] = ['label' => 'Новости проектов', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-news-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
