<?php
	use yii\helpers\Html;

	$this->title = 'Создание проекта';
	$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>

<div class="projects-create">

    <!-- <h1 class="crud-title"><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
