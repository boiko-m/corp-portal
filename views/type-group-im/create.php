<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TypeGroupIm */

$this->title = 'Create Type Group Im';
$this->params['breadcrumbs'][] = ['label' => 'Type Group Ims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-group-im-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
