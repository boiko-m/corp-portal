<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\ArrayHelper;
    use bupy7\cropbox\CropboxWidget;
    use dosamigos\tinymce\TinyMce;
    use yii\jui\AutoComplete;
    use app\models\Projects;

    use app\assets\ProjectAsset;
    ProjectAsset::register($this);
?>


<div class="project-news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(TinyMce::className(), [
        'options' => ['rows' => 20],
        'language' => 'ru',
        'clientOptions' => [
            'plugins' => [
                  'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help'
            ],
            'toolbar' => "undo redo cut copy paste | styleselect fontselect fontsizeselect | bold italic underline strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | charmap blockquote",
            'file_picker_callback' => new yii\web\JsExpression("function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                   var file = this.files[0];
                   
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
    <iframe id="form_target" name="form_target" style="display: none">
        <form id="my_form" action="/upload/" target="form_target" method="post" enctype="multipart/form-data" style="width: 0px; height: 0; overflow: hidden">
            <input name="image" type="file" onchange="$('#my_form').submit(); this.value='';">
        </form>
    </iframe>

    <? $listdata = Projects::find()->select(['name as value', 'name as label'])->asArray()->all(); ?>
    <?= $form->field($model, 'id_project', ['enableClientValidation' => false])->widget(
        AutoComplete::className(), [            
            'clientOptions' => [
                'source' => $listdata,
            ],
            'options'=>[
                'class'=>'form-control'
            ]
        ])->input('text', ['placeholder' => "Введите название проекта"]);
    ?>

    <?= $form->field($model, "visible")->checkbox(['label' => 'Видимость новости'], ['value' => true]); ?>

    <?= $form->field($model, "visible_in_home_page")->checkbox(['label' => 'Видимость новости на главной странице'], ['value' => $model->visible_in_home_page]); ?>

    <?= $form->field($model, 'image')->widget(CropboxWidget::className(), [
        'croppedDataAttribute' => 'crop_info',
    ])->label('Картинка'); ?>

    <?= $form->field($model, 'create_at')->hiddenInput(['value' => $model->isNewRecord ? time() : $model->create_at])->label(false); ?>

    <?= $form->field($model, 'create_user')->hiddenInput(['value' => $model->isNewRecord ? Yii::$app->user->id : $model->create_user])->label(false); ?>

    <div class="form-group crud-button-save">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>