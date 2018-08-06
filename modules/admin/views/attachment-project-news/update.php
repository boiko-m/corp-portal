<?php
	use yii\helpers\Html;
	use yii\helpers\ArrayHelper;
	use app\models\ProjectNews;

	$this->title = 'Редактирование вложения';
	$this->params['breadcrumbs'][] = ['label' => 'Вложения новостей', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="attachment-project-news-update">

    <?= $this->render('_form', [
        'model' => $model,
        'listType' => array('Ссылка', 'Видео', 'Файл'),
        'listProjectNews' => ArrayHelper::map(ProjectNews::find()->orderBy('id')->all(), 'id', 'title')
    ]) ?>

</div>
