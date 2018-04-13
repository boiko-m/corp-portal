<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = "Профиль: " . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?
    echo "<pre>".print_r($model->first_name, true)."</pre>";
    echo "<pre>".print_r($model->img, true)."</pre>";
    echo "<pre>".print_r($model->position, true)."</pre>";
    ?>
</div>
