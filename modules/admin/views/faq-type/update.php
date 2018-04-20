<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FaqType */

$this->title = 'Update Faq Type: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Faq Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="faq-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
