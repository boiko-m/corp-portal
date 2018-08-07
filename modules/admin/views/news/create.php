<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = 'Создание новости';
$this->params['breadcrumbs'][] = ['label' => 'Список новостей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
	.title {
		text-align: center; 
	}
</style>

<div class="news-create">

    <h1 class="title"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'news_category' => $news_category,
    ]) ?>

</div>
