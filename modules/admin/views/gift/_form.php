<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bupy7\cropbox\CropboxWidget;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $model app\models\Gift */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="test btn btn-primary">загрузить картинку </div>

<div class="admin-gift"> </div>
</div>

    <div class="gift-form">

        <?php $form = ActiveForm::begin([
            'options' => [
                'id' => 'full_gift',
                'enctype' => 'multipart/form-data',
            ]]); ?>

        <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>






        <!-- <div class="admin-gift">

         </div>
     -->


        <?= $form->field($model, 'date')->hiddenInput(['value' => time()])->label(false); ?>

        <?= $form->field($model, 'sum_coin')->textInput(['type' => 'number']); ?>

       <?= $form->field($model, 'id_gift_type')
        ->radioList(\yii\helpers\ArrayHelper::map(\app\models\GiftType::find()->all(), 'id', 'name'));?>
        <?= $form->field($model, 'visible')
            ->radioList([1=>'Видимый', 2=> 'Скрытый']);?>

        <?= $form->field($model, 'img')->textInput(['disabled' => 'true']) ?>
        <?= $form->field($model, 'id_user')->hiddenInput(['value' => Yii::$app->user->id])->label(false); ?>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success',  'form' => 'full_gift']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


