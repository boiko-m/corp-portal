<?php
	use yii\helpers\Html;

	$this->title = 'Редактирование проекта';
	$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="projects-update">

    <?= $this->render('_form', [
        'model' => $model,
        'listStatus' => array('В работе' => 'В работе', 'Завершен' => 'Завершен', 'Переход в другой проект' => 'Переход в другой проект', 'В плане' => 'В плане', 'Обкатка' => 'Обкатка'),
    ]) ?>

</div>
