<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Изменение данных';
$this->params['breadcrumbs'][] = 'Мой профиль';
?>
<div class="row ">
    <div class="col-xs-12 col-xl-3 m-b-30 text-center" >
        <div class="card-header">
            Фотография профиля
        </div>
        <div class="card mb-2">
            <?php 
           echo Html::a(Html::img($model->getImage(),['title' => 'изменить фотографию', 'class' => 'update-img','style'=>'width: 250px;border-radius: 5px;margin:10px;"']
                ), '/profiles/image' . $value['id']); ?>
        </div>
        <div class="card">
            <a href="/profiles/update/<?php echo Yii::$app->user->identity->id;?>" class = "btn  waves-effect w-md btn-light">Изменить фотографию</a>
        </div>
    </div>

    <div class="col-xs-12 col-xl-9">
        <div class="card">
            <ul class="nav nav-tabs tabs-bordered" style="padding-top: 5px">
                <li class="nav-item">
                    <a href="#home-b1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        Основный настройки
                    </a>
                </li>
            </ul>

            <div style="padding: 0px 20px;">
                <?php
                    $phone = explode(',', $model->phone);
                   /* debug($phone);*/


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
