<?php
	use yii\helpers\Html;

	$this->title = 'Создание проекта';
	$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .title-create-projects {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="projects-create">

    <h1 class="title-create-projects"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
