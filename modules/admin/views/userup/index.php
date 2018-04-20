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
    <div class="col-12 card-box" >

        <button class="btn  waves-effect w-md btn-light" onclick="ajax('insert','', 'update_user','Идет добавление пользователей...')">
            Добавить новых пользователей
        </button>

        <div class="row">
             <div class="col-12" id = "update_user">
                 
             </div>
        </div>
        
    </div>
</div>