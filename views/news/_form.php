<?php

  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use dosamigos\tinymce\TinyMce;

?>

<style>
  .form-create-button {
    text-align: center;
  }
</style>

<div class="news-form" style="overflow: hidden;">
  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
      <?= $form->field($model, 'title')->textInput(['rows' => 6]) ?>
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
    </div>

    <div class="form-group form-create-button form-create-button">
        <?= Html::submitButton('Предложить новость', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
