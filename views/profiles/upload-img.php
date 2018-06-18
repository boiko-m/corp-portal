<?php
use bupy7\cropbox\CropboxWidget;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$pathThumbImage = '/upload/images/thumbnail_'
    . Yii::$app->user->identity->profile->img;?>
<div class="row">
    <div class="col-md-12">
    <div class="card-box">
        <?php
echo Html::img($profile->getImage(), ['style'=>'width: 250px;border-radius: 5px;']);



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
?>
    </div></div>
</div>