<?php
use bupy7\cropbox\CropboxWidget;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$pathThumbImage = '/upload/images/thumbnail_'
    . Yii::$app->user->identity->profile->img;

$af = ActiveForm::begin([
    'options' => [
        'enctype' => 'multipart/form-data',
        'class' => 'crop-form'
    ],
    'action' => ['image', 'submit'],
]);

echo $af->field($form, 'image')->widget(CropboxWidget::className(), [
    'croppedDataAttribute' => 'crop_info',
    //'pathToView' => $pathThumbImage
]);

echo Html::submitButton('Сохранить', ['class' => 'btn btn-outline-warning waves-light waves-effect']);


ActiveForm::end();
