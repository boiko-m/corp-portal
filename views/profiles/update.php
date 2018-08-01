<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use yii\widgets\Pjax;

  $this->title = 'Изменение данных';
  $this->params['breadcrumbs'][] = 'Мой профиль';
?>

<style>
    .colorPanel {
      margin-top: 1em;
      text-align: center;
    }

    .colorPicker {
      margin-top: 0.1em;
      margin-bottom: 1em;
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
      max-height: 35px;
      text-transform: capitalize;
      letter-spacing: -0.5em;
      color: transparent;
      opacity: 0.35;
      width: 1%;
      height: 35px;
      background-image: linear-gradient(rgba(255,255,255,0.1), rgba(0,0,0,0.1));
    }

    .colorPicker label.red {
      background-color: #e50f0f;
      -webkit-tap-highlight-color: #e50f0f;
    }

    .colorPicker label.orange {
      background-color: #f7931d;
      -webkit-tap-highlight-color: #f7931d;
    }

    .colorPicker label.violet {
      background-color: #720586;
      -webkit-tap-highlight-color: #720586;
    }

    .colorPicker label.green {
      background-color: #008d77;
      -webkit-tap-highlight-color: #008d77;
    }

    .colorPicker label.blue {
      background-color: #195fb1;
      -webkit-tap-highlight-color: #195fb1;
    }

    .colorPicker label.dark-blue {
      background-color: #4f5a6e;
      -webkit-tap-highlight-color: #4f5a6e;
    }

    .colorPicker label.black {
      background-color: #2e2b2b;
      -webkit-tap-highlight-color: #2e2b2b;
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
            <ul class="nav nav-tabs tabs-bordered" role="tablist" style="padding-top: 5px">
                <li class="nav-item">
                    <a href="#home-b1" data-toggle="tab" class="nav-link active">
                        Основные настройки
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#home-b2" data-toggle="tab" class="nav-link">
                        Настройки интерфейса
                    </a>
                </li>
            </ul>

            <div class="tab-content" style="padding: 0px 20px;">
              <div id="home-b1" class="container tab-pane active">
                <?php $phone = explode(',', $model->phone); ?>
                <?php $form = ActiveForm::begin(); ?>
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

              <div id="home-b2" class="container tab-pane fade">
                <div class="colorPanel">
                  <div>
                    <h5><?= Yii::$app->setting->getName('navbar-background-color'); ?></h5>
                  </div>
                  <div class="colorPicker">
                    <input class="red event" type="radio" name="hat-color" value="#e50f0f" id="hat-color-red"/>
                    <label class="red" for="hat-color-red"></label>
                    <input class="orange event" type="radio" name="hat-color" value="#f7931d" id="hat-color-orange"/>
                    <label class="orange" for="hat-color-orange"></label>
                    <input class="violet event" type="radio" name="hat-color" value="#720586" id="hat-color-violet"/>
                    <label class="violet" for="hat-color-violet"></label>
                    <input class="green event" type="radio" name="hat-color" value="#008d77" id="hat-color-green"/>
                    <label class="green" for="hat-color-green"></label>
                    <input class="blue event" type="radio" name="hat-color" value="#195fb1" id="hat-color-blue"/>
                    <label class="blue" for="hat-color-blue"></label>
                    <input class="dark-blue event" type="radio" name="hat-color" value="#4f5a6e" id="hat-color-dark-blue"/>
                    <label class="dark-blue" for="hat-color-dark-blue"></label>
                    <input class="black event" type="radio" name="hat-color" value="#2e2b2b" id="hat-color-black"/>
                    <label class="black" for="hat-color-black"></label>
                  </div>
                </div>

                <div style="text-align: center">
                  <h5><?= Yii::$app->setting->getName('news-panel-setting'); ?></h5>
                  <div class="btn-group mb-2" style="display: flex; justify-content: center; align-items: center;">
                    <button type="button" class="btn btn-light waves-effect event-news-panel" <?= Yii::$app->setting->getValue('news-panel-setting') == 1 ? 'disabled' : null ?> value="1">Новости компании</button>
                    <button type="button" class="btn btn-light waves-effect event-news-panel" <?= Yii::$app->setting->getValue('news-panel-setting') == 2 ? 'disabled' : null ?> value="2">Новости проектов</button>
                  </div>
                </div>
              </div>
            </div>
          
        </div>
    </div>
</div>