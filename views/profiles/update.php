<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Изменение данных';
$this->params['breadcrumbs'][] = 'Мой профиль';
?>
<div class="row">
    <div class="col-md-12 container-fluid">
        <div class="card-box">
            <div class="row">
                <div class="col-12">
                    <div class="profile-form">


                        <?php
                        $phone = explode(',', $model->phone);
                       /* debug($phone);*/
                       echo Html::a(Html::img($model->getImage(),['title' => 'изменить фотографию', 'class' => 'update-img','style'=>'width: 250px;border-radius: 5px;"']
                            ), '/profiles/image' . $value['id']);


                    $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'id')->label(false)->hiddenInput() ?>

                        <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'phone1')->textInput(['maxlength' => true, 'value' => $phone[0]]) ?>

                        <?= $form->field($model, 'phone2')->textInput(['maxlength' => true, 'value' => $phone[1]]) ?>


                        <?= $form->field($model, 'phone_cabinet')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'cabinet')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'about')->textarea(['rows' => 6]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-outline-warning waves-light waves-effect']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
