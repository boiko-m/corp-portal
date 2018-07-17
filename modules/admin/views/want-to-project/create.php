<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WantToProject */

$this->title = 'Create Want To Project';
$this->params['breadcrumbs'][] = ['label' => 'Want To Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="want-to-project-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
