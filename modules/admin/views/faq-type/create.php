<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FaqType */

$this->title = 'Create Faq Type';
$this->params['breadcrumbs'][] = ['label' => 'Faq Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
