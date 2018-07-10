<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<style>
    .button-save-projects {
        text-align: center;
        margin-top: 20px;
    }
</style>

<div class="projects-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'goal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'create_at')->textInput() ?>

    <?= $form->field($model, 'close_at')->textInput() ?>

    <?= $form->field($model, 'archive')->textInput() ?>

    <?= $form->field($model, 'create_user')->textInput() ?>

    <div class="form-group button-save-projects">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
