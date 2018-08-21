<?php
	use yii\helpers\Html;
	use yii\helpers\ArrayHelper;
	use app\models\ProjectNews;

	$this->title = 'Создание вложения';
	$this->params['breadcrumbs'][] = ['label' => 'Подшитые файлы', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attachment-project-news-create">

    <?= $this->render('_form', [
        'model' => $model,
        'listType' => array('Ссылка', 'Видео', 'Файл'),
        'listProjectNews' => ArrayHelper::map(ProjectNews::find()->orderBy('id')->all(), 'id', 'title')
    ]) ?>

</div>
