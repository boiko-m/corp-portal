<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WantToProject */

$this->title = 'Update Want To Project: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Want To Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="want-to-project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
