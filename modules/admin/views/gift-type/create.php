<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GiftType */

$this->title = 'Create Gift Type';
$this->params['breadcrumbs'][] = ['label' => 'Gift Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gift-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
