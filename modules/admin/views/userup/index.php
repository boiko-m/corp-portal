<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VideosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Обновление пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-12">
        <?php $odata->link(); ?>
        <pre><?=var_dump($data) ?></pre>
    </div>
</div>