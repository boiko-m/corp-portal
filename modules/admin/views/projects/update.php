<?php
	use yii\helpers\Html;

	$this->title = 'Редактирование проекта';
	$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="projects-update">

    <!-- <h1 class="crud-title"><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
