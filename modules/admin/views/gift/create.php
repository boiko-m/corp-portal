<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gift */

$this->title = 'Создание подарка';
$this->params['breadcrumbs'][] = ['label' => 'Gifts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gift-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
