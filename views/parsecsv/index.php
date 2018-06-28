<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\widgets\Alphabet;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Сотрудники';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="table-responsive wrap-relative">

                <?=Html::a('расспарсить данные', ['/parsecsv', 'param' => 'get'])?>
            </div></div></div></div>


