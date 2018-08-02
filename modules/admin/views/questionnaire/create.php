<?php
	use yii\helpers\Html;

	$this->title = 'Создание опроса';
	$this->params['breadcrumbs'][] = ['label' => 'Опросы', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questionnaire-create">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
