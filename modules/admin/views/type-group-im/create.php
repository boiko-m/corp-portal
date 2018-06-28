<?php
	use yii\helpers\Html;

	$this->title = 'Создать тип группы';
	$this->params['breadcrumbs'][] = ['label' => 'Тип групп диалогов', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .title-create-type-group-im {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="type-group-im-create">

    <h1 class="title-create-type-group-im"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
