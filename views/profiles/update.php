<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Изменение данных';
$this->params['breadcrumbs'][] = 'Мой профиль';
?>

<style>
    .colorPicker {
      margin-top: 1em;
      font-size: 0.875em;
      text-align: center;
      display: inline-table;
      width: 100%;
      max-width: 40em;
      background: #fff;
      padding: 2px;
      border-radius: 0.35em;
      box-shadow: 0 0.5em 1.5em rgba(0,0,0,0.15);
    }

    .colorPicker label {
      -webkit-tap-highlight-color: rgba(255,255,255,0.5);
      transition: all 0.2s ease-in-out;
      display: table-cell;
      cursor: pointer;
      vertical-align: middle;
      padding: 0.5em 1em;
      text-transform: capitalize;
      letter-spacing: -0.5em;
      color: transparent;
      opacity: 0.35;
      width: 1%;
      background-image: linear-gradient(rgba(255,255,255,0.1), rgba(0,0,0,0.1));
    }

    .colorPicker label.red {
      background-color: #ff3e05;
      -webkit-tap-highlight-color: #ff3e05;
    }

    .colorPicker label.orange {
      background-color: #ff8d05;
      -webkit-tap-highlight-color: #ff8d05;
    }

    .colorPicker label.yellow {
      background-color: #ecca05;
      -webkit-tap-highlight-color: #ecca05;
    }

    .colorPicker label.green {
      background-color: #40af04;
      -webkit-tap-highlight-color: #40af04;
    }

    .colorPicker label.blue {
      background-color: #057fff;
      -webkit-tap-highlight-color: #057fff;
    }

    .colorPicker label.indigo {
      background-color: #7500ca;
      -webkit-tap-highlight-color: #7500ca;
    }

    .colorPicker label.violet {
      background-color: #cc6fcc;
      -webkit-tap-highlight-color: #cc6fcc;
    }

    .colorPicker label:first-of-type {
      border-radius: 0.25em 0 0 0.25em;
    }

    .colorPicker label:last-of-type {
      border-radius: 0 0.25em 0.25em 0;
    }

    .colorPicker label:hover {
      opacity: 1;
      color: #fff;
      letter-spacing: normal;
    }

    .colorPicker input {
      display: none;
    }

    .colorPicker input:checked + label {
      width: 90%;
      opacity: 1;
      color: #fff;
      letter-spacing: normal;
    }

</style>

<div class="row ">
    <div class="col-xs-12 col-xl-3 m-b-30 text-center" >
        <div class="card-header">
            Фотография профиля
        </div>
        <div class="card mb-2">
            <?php 
           echo Html::a(Html::img($model->getImage(),['title' => 'изменить фотографию', 'class' => 'update-img col-md-12','style'=>'margin:15px 0px;border-radius:5px;']
                ), '/profiles/image' . $value['id']); ?>
        </div>
        <div class="card">
            <a href="/profiles/image/<?php echo Yii::$app->user->identity->id;?>" class = "btn waves-effect w-md btn-light">Изменить фотографию</a>
        </div>
    </div>

    <div class="col-xs-12 col-xl-9">
        <div class="card">
            <ul class="nav nav-tabs tabs-bordered" style="padding-top: 5px">
                <li class="nav-item">
                    <a href="#home-b1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        Основные настройки
                    </a>
                </li>
            </ul>

            <div style="padding: 0px 20px;">
              <?php if (Yii::$app->user->can('SuperAdmin')) : ?>
                    <div class="colorPicker" style="float: none; margin: 0 auto;">
                      <input class="red event" type="radio" name="hat-color" value="#ff0000" id="hat-color-red"/>
                      <label class="red" for="hat-color-red">red</label>
                      <input class="orange event" type="radio" name="hat-color" value="#ffa500" id="hat-color-orange"/>
                      <label class="orange" for="hat-color-orange">orange</label>
                      <input class="yellow event" type="radio" name="hat-color" value="#ffff00" id="hat-color-yellow"/>
                      <label class="yellow" for="hat-color-yellow">yellow</label>
                      <input class="green event" type="radio" name="hat-color" value="#008000" id="hat-color-green"/>
                      <label class="green" for="hat-color-green">green</label>
                      <input class="blue event" type="radio" name="hat-color" value="#0000ff" id="hat-color-blue"/>
                      <label class="blue" for="hat-color-blue">blue</label>
                      <input class="indigo event" type="radio" name="hat-color" value="#4b0082" id="hat-color-indigo"/>
                      <label class="indigo" for="hat-color-indigo">indigo</label>
                      <input class="violet event" type="radio" name="hat-color" value="#ee82ee" id="hat-color-violet"/>
                      <label class="violet" for="hat-color-violet">violet</label>
                    </div>
                <? endif; ?>
                <?php
                    $phone = explode(',', $model->phone);
                   /* debug($phone);*/


                $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'id')->label(false)->hiddenInput() ?>

                    <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

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

<script>
  $('.event').on('click', function (e) {
    var color = $('.event').serialize();
    console.log(color);
    $.ajax({
      url: '/profiles/update-setting-nb-bg',
      data: color,
      success: function(data) {
        console.log(data);
      },
      error: function(xhr, str){
        alert('Возникла ошибка: ' + xhr.responseCode);
      }
    });
  });
</script>