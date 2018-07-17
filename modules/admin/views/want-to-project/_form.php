<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WantToProject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="want-to-project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'complete')->textInput() ?>

    <?= $form->field($model, 'decision')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_project')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
