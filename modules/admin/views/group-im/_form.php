<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
?>

<style>
    .button-save-group-im {
        text-align: center;
        margin-top: 20px;
    }
</style>

<div class="group-im-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'id_type_group_im')->textInput() ?>
    <div class="form-group button-save-group-im">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
