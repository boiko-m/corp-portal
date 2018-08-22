<?php
	use yii\helpers\Html;

	$this->title = 'Создание проекта';
	$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>

<div class="projects-create">

    <?= $this->render('_form', [
        'model' => $model,
        'listStatus' => array('В работе' => 'В работе', 'Завершен' => 'Завершен', 'Переход в другой проект' => 'Переход в другой проект', 'В плане' => 'В плане', 'Обкатка' => 'Обкатка'),
    ]) ?>

</div>
