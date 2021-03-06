<?php
    use bupy7\cropbox\CropboxWidget;
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\widgets\Pjax;
?>

<?php Pjax::begin(['id' => 'new_img']); ?>

<?php $af = ActiveForm::begin([
    'options' => [
        'data' => ['pjax' => true],
        //'method' => 'post',
        'id' => 'img_gift',
        'enctype' => 'multipart/form-data',
        'class' => 'crop-form',
    ],
     'action'=>'create',
]);

echo $af->field($form, 'image')->widget(CropboxWidget::className(), [
    'croppedDataAttribute' => 'crop_info',
]);

echo Html::submitButton('Сохранить', ['class' => 'btn btn-outline-warning waves-light waves-effect submit-img-gift',
    'form' => 'img_gift']);

ActiveForm::end(); ?>

<?php Pjax::end(); ?>

<?php $this->registerJs(
    '$("document").ready(function(){
        $("#new_img").on("pjax:success", function() {
        $("#projectnews-avatar").val($(\'#new_img\').text());
        $(\'.update-new-img\').attr(\'src\', $(\'#projectnews-avatar\').val());
        $("#new_img").hide();
        });
    });'
); ?>