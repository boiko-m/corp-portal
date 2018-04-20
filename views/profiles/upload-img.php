<?php
use bupy7\cropbox\CropboxWidget;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$af = ActiveForm::begin([
    'options' => ['enctype'=>'multipart/form-data'],
    'action' => ['cropbox', 'submit'],
]);

echo $af->field($form, 'image')->widget(CropboxWidget::className(), [
    'croppedDataAttribute' => 'crop_info',
]);

echo Html::submitButton('Отправить', ['class' => 'submit']);

ActiveForm::end();
