<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<div class="questionnaire-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Описание (не обязательно)') ?>

    <?= $form->field($model, 'type')->checkbox(['value' => true]); ?>

    <?= $form->field($model, 'create_at')->hiddenInput(['value' => time()])->label(false) ?>

    <?= $form->field($model, 'create_user')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

    <div class="form-group crud-button-save">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>