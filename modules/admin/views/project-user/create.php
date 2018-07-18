<?php
	use yii\helpers\Html;

	$this->title = 'Создание назначения';
	$this->params['breadcrumbs'][] = ['label' => 'Назначения пользователей', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-user-create">

    <!-- <h1 class="crud-title"><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
