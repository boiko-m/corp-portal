<?php
	use yii\helpers\Html;

	$this->title = 'Редактирование назначения';
	$this->params['breadcrumbs'][] = ['label' => 'Назначения пользователей', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="project-user-update">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
