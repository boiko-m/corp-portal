<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use dosamigos\datepicker\DatePicker;
?>

<style>
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

    <?= $form->field($model, 'name')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'goal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, "archive")->checkbox(['label' => 'Архивировать проект'], ['value' => false]); ?>

    <?= $form->field($model, "visible")->checkbox(['label' => 'Видимость в списке'], ['value' => true]); ?>

    <?= $form->field($model, "active")->checkbox(['label' => 'Доступность к просмотру'], ['value' => true]); ?>

    <div class="center-datepicker">
        <?= $form->field($model, 'create_at', 
            ['options' => ['class' => 'form-group class-inline'], 'enableClientValidation' => false])
            ->widget(DatePicker::classname(), [
            'inline' => true, 
            'options' => ['placeholder' => 'Выбирите дату начала...'],
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px;">{input}</div>',
            'language' => 'en',
            'clientOptions' => [
                // 'autoclose' => true,
                'format' => 'dd M Y'
            ]
        ])->label(false);?>
        <?= $form->field($model, 'close_at', 
            ['options' => ['class' => 'form-group class-inline'], 'enableClientValidation' => false])
            ->widget(DatePicker::classname(), [
            'inline' => true, 
            'options' => ['placeholder' => 'Выбирите дату окончания...'],
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px;">{input}</div>',
            'language' => 'en',
            'clientOptions' => [
                // 'autoclose' => true,
                'format' => 'dd M Y',
            ]
        ])->label(false);?>
    </div>

    <?= $form->field($model, 'create_user')->hiddenInput(['value' => Yii::$app->user->id])->label(false); ?>

    

    <div class="form-group crud-button-save">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
