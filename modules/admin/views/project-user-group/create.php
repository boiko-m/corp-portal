<?php
	use yii\helpers\Html;

	$this->title = 'Создание группы пользователей';
	$this->params['breadcrumbs'][] = ['label' => 'Группы пользователей проектов', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-user-group-create">

    <!-- <h1 class="crud-title"><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
