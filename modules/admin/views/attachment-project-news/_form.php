<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<div class="attachment-project-news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'type')->dropDownList($listType, ['prompt' => '---- Выберите тип вложения ----'])->label('Назначение') ?>

    <?= $form->field($model, 'link', ['enableClientValidation' => false])->textInput(['maxlength' => true, 'disabled' => true]) ?>

    <?= $form->field($model, 'file')->fileInput(['style' => 'display: none'])->label(false) ?>

    <?= $form->field($model, 'create_at')->hiddenInput(['value' => time()])->label(false) ?>

    <?= $form->field($model, 'create_user')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

    <?= $form->field($model, 'id_project_news')->dropDownList($listProjectNews, ["disabled" => "disabled"], ['prompt' => '---- Выберите новость ----'])->label('Назначение') ?>

    <div class="form-group crud-button-save">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    $("select#attachmentprojectnews-type").change(function() {
        console.log($("#attachmentprojectnews-type option:selected").val());
        if ($("#attachmentprojectnews-type option:selected").val().length == 0) {
            $('#attachmentprojectnews-link').attr('disabled', 'disabled');
        } else {
            $('#attachmentprojectnews-link').removeAttr('disabled');
        }
        if ($("#attachmentprojectnews-type option:selected").val() == '2') {
            $('#attachmentprojectnews-link').hide();
            $('#attachmentprojectnews-file').show();
        } else {
            $('#attachmentprojectnews-file').hide();
            $('#attachmentprojectnews-link').show();
        }
    });
</script>