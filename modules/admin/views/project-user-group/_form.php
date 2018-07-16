<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
?>

<div class="project-user-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'create_at')->hiddenInput(['value' => time()])->label(false); ?>

    <?= $form->field($model, 'create_user')->hiddenInput(['value' => Yii::$app->user->id])->label(false); ?>

    <div class="form-group crud-button-save">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
