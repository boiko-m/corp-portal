<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gift */

$this->title = 'Update Gift: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Gifts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gift-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
