<?php
	use yii\helpers\Html;

	$this->title = 'Создание группу диалогов';
	$this->params['breadcrumbs'][] = ['label' => 'Группы диалогов', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .title-create-group-im {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

<div class="im-groups-create">

    <h1 class="title-create-group-im"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
