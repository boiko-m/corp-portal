<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_1c') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'middle_name') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'date_job') ?>

    <?php // echo $form->field($model, 'sex') ?>

    <?php // echo $form->field($model, 'skype') ?>

    <?php // echo $form->field($model, 'phone1') ?>

    <?php // echo $form->field($model, 'phone2') ?>

    <?php // echo $form->field($model, 'branch') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'cabinet') ?>

    <?php // echo $form->field($model, 'phone_cabinet') ?>

    <?php // echo $form->field($model, 'about') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'service') ?>

    <?php // echo $form->field($model, 'sip') ?>

    <?php // echo $form->field($model, 'img') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
