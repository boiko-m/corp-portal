<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\News */
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

  .preview-image {
    margin-left: auto; 
    margin-right: auto; 
    display: block;
  }
</style>

<div class="news-form">
  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="section"><span>1</span>Содеожание</div>
    <div class="inner-wrap">
      <?= $form->field($model, 'title')->textInput(['rows' => 6]) ?>
<!--       <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?> -->
      <?= $form->field($model, 'content')->widget(TinyMce::className(), [
          'options' => ['rows' => 20],
          'language' => 'ru',
          'clientOptions' => [
              'plugins' => [
                  "advlist autolink lists link charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste image"
              ],
              'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
              'file_picker_callback' => new yii\web\JsExpression("function(cb, value, meta) {
                 var input = document.createElement('input');
                 input.setAttribute('type', 'file');
                 input.setAttribute('accept', 'image/*');

                 input.onchange = function() {
                   var file = this.files[0];
                   console.log(file);
                   
                   var reader = new FileReader();
                   reader.onload = function () {
                     var id = 'blobid' + (new Date()).getTime();
                     var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                     var base64 = reader.result.split(',')[1];
                     var blobInfo = blobCache.create(id, file, base64);
                     blobCache.add(blobInfo);

                     cb(blobInfo.blobUri(), { title: file.name });
                   };
                   reader.readAsDataURL(file);
                 };
                 
                 input.click();
                }"),
          ]
      ]);?>
      <iframe id="form_target" name="form_target" style="display:none">
        <form id="my_form" action="/upload/" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
            <input name="image" type="file" onchange="$('#my_form').submit();this.value='';">
        </form>
      </iframe>
      <?= $form->field($model, 'img_icon')->hiddenInput(['rows' => 6, 'disabled' => true])->label(false) ?>
      <div>
        <label>Предпросмотр картинки</label>
        <img src="http://portal.lbr.ru/img/gift/VAUPWTE.jpg" class="preview-image" width="150px;">
      </div>
    </div>

    <div class="section"><span>2</span>Детали</div>
    <div class="inner-wrap">
      <?= $form->field($model, 'type')->textInput(['rows' => 6, 'disabled' => true]) ?>
      <?= $form->field($model, 'date')->textInput(['rows' => 6, 'disabled' => true]) ?>
      <?= $form->field($model, 'id_user')->textInput(['rows' => 6, 'disabled' => true]) ?>
    </div>

    <div class="section"><span>1</span>Настройки доступа и ограничения</div>
    <div class="inner-wrap">
      <?= $form->field($model, "status")->hiddenInput(['disabled' => true], ['value' => 0])->label(false); ?>
      <?= $form->field($model, "like_active")->checkbox(['value' => 0]); ?>
    </div>

    <div class="form-group form-create-button">
        <?= Html::submitButton('Добавить новость', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
