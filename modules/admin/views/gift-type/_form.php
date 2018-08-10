<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
?>

<div class="gift-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'visible')->textInput() ?>

    <div class="form-group crud-button-save">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
