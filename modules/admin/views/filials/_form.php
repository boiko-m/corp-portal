<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
?>

<div class="filials-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id1C')->textInput() ?>

    <?= $form->field($model, 'external')->textInput() ?>

    <div class="form-group crud-button-save">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
