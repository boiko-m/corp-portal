<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VideosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Обновление пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row card-box" style="text-align: left;">
    <div class="col-12">

       

        <button type="button" class="btn btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="true"> Синхронизация пользователей <span class="caret"></span> </button>

        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
            <a class="dropdown-item" href="#" onclick="ajax('insert','', 'update_user','Идет синхронизация пользователей. Ожидайте...')">обычных</a>
            <a class="dropdown-item" href="#" onclick="ajax('insert/?dogovor=true','', 'update_user','Идет синхронизация пользователей по договору подряда. Ожидайте...')">по договору подряда</a>
            <a class="dropdown-item" href="#" onclick="ajax('position','', 'update_user','Идет синхронизация должностей. Ожидайте...')">должностей</a>
        </div>

        <button class="btn  waves-effect w-md btn-light" onclick="ajax('replace','', 'update_user','Идет обновление. Ожидайте...')">
            Обновление пользовательской информации
        </button>

        <div id="update_user" style="margin:30px 0px;">
            Выберите один из пунктов обновления!
        </div>




    </div>

</div>