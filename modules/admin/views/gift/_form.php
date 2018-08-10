<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use bupy7\cropbox\CropboxWidget;
    use yii\widgets\Pjax;
?>


<div class="test btn btn-primary">Загрузить картинку </div>

<div class="admin-gift"> </div>
</div>
<div><img class="update-new-img" src="" style="padding: 10px; width: 100px"> </div>
    <div class="gift-form">

        <?php $form = ActiveForm::begin([
            'options' => [
                'id' => 'full_gift',
                'enctype' => 'multipart/form-data',
            ]]); ?>

        <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'date')->hiddenInput(['value' => time()])->label(false); ?>

        <?= $form->field($model, 'sum_coin')->textInput(['type' => 'number']); ?>

       <?= $form->field($model, 'id_gift_type')
        ->radioList(\yii\helpers\ArrayHelper::map(\app\models\GiftType::find()->all(), 'id', 'name'));?>

        <?= $form->field($model, 'visible')
            ->radioList([1=>'Видимый', 2=> 'Скрытый']);?>

        <?= $form->field($model, 'img')->hiddenInput(/*['disabled' => 'true']*/)->label(false); ?>

        <?= $form->field($model, 'id_user')->hiddenInput(['value' => Yii::$app->user->id])->label(false); ?>
        
        <div class="form-group crud-button-save">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success',  'form' => 'full_gift']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

<script>
    $( document ).ready(function() {
        var img = $('#gift-img').val();
         if( img[0] != '/' && img!=''){
             img = '/'+img
         }
        $('.update-new-img').attr('src', img);
    });

</script>
