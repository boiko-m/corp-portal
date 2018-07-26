<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<div class="broadcast-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'link')->textInput(['rows' => 6, 'readonly' => $model->isNewRecord ? false : true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Описание(не обязательно)') ?>

    <?= $form->field($model, 'create_at')->hiddenInput(['value' => time()])->label(false) ?>

    <?= $form->field($model, 'close_at')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'complete')->checkbox(['label' => 'Завершенность', 'disabled' => $model->isNewRecord || $model->complete ? true : false], ['value' => false]) ?>

    <?= $form->field($model, 'create_user')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

    <div class="form-group crud-button-save">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
