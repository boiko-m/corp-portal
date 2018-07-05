<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Проекты компании';
//$this->params['breadcrumbs'][] = $this->title;
?>


<style>
    .project {
        display: block;
        color:black;
        width: 100%;
        padding: 10px!important;
        transition: 0.3s;
        border-bottom:1px solid #dfdfdf;
        border-radius: 5px;
        margin-top: 5px;
    }
    .project .card-title{
        font-size:18px;
    }
    .project:hover {
        background: #f3f3f3!important;
    }
    .project-item-menu {
        font-size: 13px;
        margin-right: 15px;
        font-weight: normal;
    }
    .project-item-menu a {
        display: inline-block;
        margin-right: 15px;
        color: #707070;
        transition: 0.3s;
    }
    .project-item-menu a:hover {
        color: black;
    }
</style>
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="card-box">
            <div>
                <div style="color:#5d5d5d">
                    Поиск по проектам:
                </div>
                <input class="form-control" type="search" name="search_project">
            </div>
            <div class="project">
                    <span title="Я участвую!" style="display: inline-block; color: #f7931d;font-size:20px!important">
                        <i class=" mdi mdi-account-star"></i>
                    </span>
                    <a href="/project/1" style="display: inline-block;">
                        <h5 class="card-title">Индивидуальный план рекламы (ИПР)</h5>
                    </a>


                    <a href="" style="margin-left:10px;display: inline-block; color: #555555">
                        <i class="mdi mdi-settings"></i>
                    </a>
    
                    <div style="padding-left: 20px">
                        <div class="project-item-menu">
                            <a href="/project/info/1">Информация</a>
                        </div>
                        <div style="">
                            <small>Индивидуальный план рекламы (ИПР) – проект, направленный на индивидуальный подход к каждому клиенту. Благодаря проекту, каждый клиент будет получать именно ту рекламу, которая для него интересна, по тем каналам связи, которые ему удобны. Это облегчит работу менеджеров ...</small>
                        </div>
                    </div>
            </div>

            <div class="project">
                    <span title="Я участвую!" style="display: inline-block; color: #f7931d;font-size:20px!important">
                        <i class=" mdi mdi-account-star"></i>
                    </span>
                    <a href="/project/1" style="display: inline-block;">
                        <h5 class="card-title">Время и удобство обслуживания клиента на складе в момент отгрузки</h5>
                    </a>


                    <a href="" style="margin-left:10px;display: inline-block; color: #555555">
                        <i class="mdi mdi-settings"></i>
                    </a>
    
                    <div style="padding-left: 20px">
                        <div class="project-item-menu">
                              
                            <a href="/project/info/1#information">Информация</a>
                            <a href="/project/info/1#work_group">Рабочая группа</a>
                            <a href="/project/info/1#news">Движение по проекту</a>

                        </div>
                        <div style="">
                            <small>Доставка запчастей до двери клиента в оговоренные с ним сроки и по рыночным ценам позволит нам быть конкурентноспособными на рынке,   удержать старых и привлечь новых ...</small>
                        </div>
                    </div>
            </div>

            <div class="project">
                    <a href="/project/1" style="display: inline-block;">
                        <h5 class="card-title">Доставки запчастей до двери клиента</h5>
                    </a>

                    <div style="padding-left: 20px">
                        <div class="project-item-menu">
                              
                            <a href="/project/info/1#information">Информация</a>
                            <a href="/project/info/1#work_group">Рабочая группа</a>
                            <a href="/project/info/1#news">Движение по проекту</a>

                        </div>
                        <div style="">
                            <small>Доставка запчастей до двери клиента в оговоренные с ним сроки и по рыночным ценам позволит нам быть конкурентноспособными на рынке,   удержать старых и привлечь новых ...</small>
                        </div>
                    </div>
            </div>

            <div class="project">
                    <a href="/project/1" style="display: inline-block;">
                        <h5 class="card-title">Единое предложение по стоимости (единая скидка)</h5>
                    </a>

                    <div style="padding-left: 20px">
                        <div class="project-item-menu">
                              
                            <a href="/project/info/1#information">Информация</a>
                            <a href="/project/info/1#work_group">Рабочая группа</a>
                            <a href="/project/info/1#news">Движение по проекту</a>

                        </div>
                        <div style="">
                            <small>Доставка запчастей до двери клиента в оговоренные с ним сроки и по рыночным ценам позволит нам быть конкурентноспособными на рынке,   удержать старых и привлечь новых ...</small>
                        </div>
                    </div>
            </div>


        </div>
    </div>
</div>