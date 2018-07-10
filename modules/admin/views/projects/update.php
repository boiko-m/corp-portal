<?php
	use yii\helpers\Html;

	$this->title = 'Редактирование проекта';
	$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Редактирование';
?>

<style>
    .title-update-projects {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="projects-update">

    <h1 class="title-update-projects"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
