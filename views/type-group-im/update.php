<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeGroupIm */

$this->title = 'Update Type Group Im: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Group Ims', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-group-im-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
