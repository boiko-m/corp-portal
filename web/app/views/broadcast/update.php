<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Broadcast */

$this->title = 'Update Broadcast: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Broadcasts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="broadcast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
