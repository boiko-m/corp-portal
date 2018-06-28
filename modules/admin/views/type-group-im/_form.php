<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
?>

<style>
    .button-save-type-group-im {
        text-align: center;
        margin-top: 20px;
    }
</style>

<div class="type-group-im-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
    <div class="form-group button-save-type-group-im">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
