<?php
	use yii\helpers\Html;

	$this->title = 'Редактирование новости проекта';
	$this->params['breadcrumbs'][] = ['label' => 'Новости проектов', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="project-news-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    
</div>