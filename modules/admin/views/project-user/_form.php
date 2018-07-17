<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\helpers\ArrayHelper;
	use app\models\ProjectUserGroup;
	use yii\jui\AutoComplete;
	use app\models\Projects;
	use app\models\Profile;
?>

<style>
	.input-link {
		display: block;
		box-sizing: border-box;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		width: 100%;
		padding: 8px;
		border-radius: 6px;
		-webkit-border-radius:6px;
		-moz-border-radius:6px;
		border: 2px solid #fff;
	}
</style>

<div class="project-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <? $listdata = Projects::find()->select(['id as value', 'name as label'])->asArray()->all(); ?>
    <?= $form->field($model, 'id_project')->widget(
	    AutoComplete::className(), [            
	        'clientOptions' => [
	            'source' => $listdata,
	        ],
	        'options'=>[
	            'class'=>'form-control'
	        ]
	    ])->input('text', ['placeholder' => "Введите название проекта"]);
	?>

	<? $listdata = Profile::find()->select(['id as value', 'last_name as label'])->asArray()->all(); ?>
    <?= $form->field($model, 'id_user')->widget(
	    AutoComplete::className(), [            
	        'clientOptions' => [
	            'source' => $listdata,
	        ],
	        'options'=>[
	            'class'=>'form-control'
	        ],
	    ])->input('text', ['placeholder' => "Введите фамилию сотрудника"]);
	?>

    <?php $projectGroupArray = ArrayHelper::map(ProjectUserGroup::find()->orderBy('name')->all(), 'id', 'name') ?>
	<?= $form->field($model, 'id_project_user_group')->dropDownList($projectGroupArray, ['prompt' => '---- Выберите назначение ----'])->label('Назначение') ?>

    <?= $form->field($model, 'create_at')->hiddenInput(['value' => time()])->label(false); ?>

    <div class="form-group crud-button-save">
        <?= Html::submitButton($model->isNewRecord ? 'Создать назначение' : 'Редактировать назначение', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
