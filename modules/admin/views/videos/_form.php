<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Videos */
/* @var $form yii\widgets\ActiveForm */
?>

<style> 
  .inner-wrap{
    padding: 20px;
    background: #F8F8F8;
    border-radius: 6px;
    margin-bottom: 15px;
  }

  .section{
    font: normal 20px 'Bitter', serif;
    color: #2A88AD;
    margin-bottom: 10px;
    margin-top: 20px;
    margin-left: 25px;
  }
  .section span {
    background: #2A88AD;
    padding: 5px 10px 5px 10px;
    position: absolute;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border: 4px solid #fff;
    font-size: 14px;
    margin-left: -45px;
    color: #fff;
    margin-top: -3px;
  }
  .form-style-10 .privacy-policy{
    float: right;
    width: 250px;
    font: 12px Arial, Helvetica, sans-serif;
    color: #4D4D4D;
    margin-top: 10px;
    text-align: right;
  }

  .form-create-button {
    text-align: center;
  }
</style>

<div class="videos-form">
  <?php $form = ActiveForm::begin(); ?>
    <div class="section"><span>1</span>Информация о видео</div>
    <div class="inner-wrap">
      <?= $form->field($model, 'link')->textInput(['rows' => 6, 'readonly' => true])->label('Ссылка'); ?>
      <?= $form->field($model, 'name')->textInput(['rows' => 6])->label('Название'); ?>
      <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Описание'); ?>
      <?= $form->field($model, 'img')->textInput(['rows' => 6, 'readonly' => true])->label('Картинка'); ?>
      <?= $form->field($model, 'youtube_views')->textInput(['rows' => 6])->label('Количество просмотров'); ?>
    </div>
    <div class="section"><span>2</span>Детали</div>
    <div class="inner-wrap">
      <?= $form->field($model, 'id_user')->textInput(['rows' => 6, 'readonly' => true])->label('Id пользователя'); ?>
      <?= $form->field($model, 'date')->textInput(['rows' => 6, 'readonly' => true])->label('Дата добавления'); ?>
      <?php $VideoCategoryArray = ArrayHelper::map(\app\models\VideoCategory::find()->orderBy('name_category')->all(), 'id', 'name_category'); ?>
      <?= $form->field($model, 'id_category')->dropDownList($VideoCategoryArray, ['prompt' => '---- Выберите категорию ----'])->label('Категория'); ?>
    </div>
    <div class="section"><span>3</span>Настройки доступа</div>
    <div class="inner-wrap">
      <?= $form->field($model, "comment_accept")->checkbox(['label' => 'Доступ к комментариям'], ['value' => false]); ?>
      <?= $form->field($model, "right_module")->checkbox(['label' => 'Поместить на правую панель'], ['value' => true]); ?>
    </div>
    <div class="form-group form-create-button">
        <?= Html::submitButton('Добавить видео', ['class' => 'btn btn-success']); ?>
    </div>
  <?php ActiveForm::end(); ?>
</div>