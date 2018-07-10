<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use dosamigos\datepicker\DatePicker;
?>

<style>
    .button-save-projects {
        text-align: center;
        margin-top: 20px;
    }

    .class-inline {
        display: inline-block;
    }

    .center-datepicker {
        text-align: center;
    }

    .help-block {
        position: absolute;
    }
</style>

<div class="projects-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'goal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, "archive")->checkbox(['label' => 'Архивировать проект'], ['value' => 1]); ?>

    <div class="center-datepicker">
        <?= $form->field($model, 'create_at', ['options' => ['class' => 'form-group class-inline']])
            ->widget(DatePicker::classname(), [
            'inline' => true, 
            'options' => ['placeholder' => 'Выбирите дату начала...'],
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px;">{input}</div>',
            'language' => 'ru',
            'clientOptions' => [
                // 'autoclose' => true,
                'format' => 'dd MM yyyy'
            ]
        ])->label(false);?>
        <?= $form->field($model, 'close_at', ['options' => ['class' => 'form-group class-inline']])
            ->widget(DatePicker::classname(), [
            'inline' => true, 
            'options' => ['placeholder' => 'Выбирите дату окончания...'],
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px;">{input}</div>',
            'language' => 'ru',
            'clientOptions' => [
                // 'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ])->label(false);?>
    </div>

    <?= $form->field($model, 'create_user')->hiddenInput(['value' => Yii::$app->user->id])->label(false); ?>

    

    <div class="form-group button-save-projects">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
