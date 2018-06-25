<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<style>
    .button-save-attachments-message {
        text-align: center;
        margin-top: 20px;
    }
</style>

<div class="attachments-message-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'date')->textInput() ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'id_message')->textInput() ?>
    <div class="form-group button-save-attachments-message">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
