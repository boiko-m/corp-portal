<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Проект "Индивидуальный план рекламы"';
$this->params['breadcrumbs'][] = "Проекты компании";
$this->params['breadcrumbs'][] = $this->title;
?>


<style>
    .work-group-view-title {

    }
    .work-group-view-content {
        margin-left: 20px;
    }
    .work-group-view-content a {
        display: block
    }
    .work-group-view-content small {
        color: black
    }
    .project-menu-left small {
        font-size: 12px
    }
    .nav-project small {
        font-size: 10px
    }
    .backlog-block {
        margin: 10px 0px;
        background: #efefef;
        padding: 5px 10px;
        border:1px solid #e5e5e5;
        border-radius: 5px;
    }
    .backlog-block-title {
        font-size:10px;

    }
    .backlog-block-content {
        font-size:14px;
        text-align: justify;
    }
</style>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <ul class="nav nav-tabs tabs-bordered nav-justified nav-project ">
                <li class="nav-item">
                    <a href="#spr1" class="nav-link" data-toggle="tab" aria-expanded="false">Этап 1</a>
                </li>
               <li class="nav-item">
                    <a href="#spr2" class="nav-link active" data-toggle="tab" aria-expanded="false">Этап 2 <small>до 20.06</small></a>
                </li>
                 <li class="nav-item">
                    <a href="#spr3" class="nav-link" data-toggle="tab" aria-expanded="false">Этап 3</a>
                </li>
                 <li class="nav-item">
                    <a href="#spr4" class="nav-link" data-toggle="tab" aria-expanded="false">Этап 4</a>
                </li>
                <li class="nav-item col-xs-3 col-md-3">
                    <a href="#target" class="nav-link" data-toggle="tab" aria-expanded="false">Проект</a>
                </li>
            </ul>
    </div>
</div>
<br>
<div class="row">
    <!-- <div class="col-xs-12 col-md-2 ">
    
        <div class="card project-menu-left" >
                item
                <div class="card-header">
                    Этапы
                </div>
                <a href="javascript:void(0);" class="dropdown-item">
                    <div>
                        Этап 1
                    </div>
                    <small>
                        с 20.01.2018 по 27.02.2018 <br>
                        Завершен
                    </small>
                </a>
    
                <a href="javascript:void(0);" class="dropdown-item">
                    <div>
                        Этап 2
                    </div>
                    <small>
                        с 27.02.2018 по 27.04.2018 <br>
                        Завершен
                    </small>
                </a>
    
    
                <a href="javascript:void(0);" class="dropdown-item" style="background: #f5f5f5;">
                    <div>
                        Этап 3
                    </div>
                    <small>
                        с 27.04.2018 по 27.06.2018 <br>
                        В работе
                    </small>
                </a>
    
                
    
                <div style="padding: 3px 10px">
                    <a href="" class = "crad-link"><small>Создать этап</small></a>
                    <a href="" class = "crad-link"><small>Управление</small></a>
                </div>
    
        </div>
    </div> -->
    <div class="col-xs-12 col-md-9 ">
        <div class="card">
            <div class="card-header">
                Этап 3 <small> с 20.01.2018 по 20.02.2018</small>
            </div>

            <ul class="nav nav-tabs tabs-bordered nav-justified nav-project ">
                <li class="nav-item">
                    <a href="#spr1" class="nav-link" data-toggle="tab" aria-expanded="false">Спринт<br>1</a>
                </li>
               <li class="nav-item">
                    <a href="#spr2" class="nav-link active" data-toggle="tab" aria-expanded="false">Спринт 2<br><small>(20.02 - 20.03)</small> </a>
                </li>
                 <li class="nav-item">
                    <a href="#spr3" class="nav-link" data-toggle="tab" aria-expanded="false">Спринт<br>3</a>
                </li>
                 <li class="nav-item">
                    <a href="#spr4" class="nav-link" data-toggle="tab" aria-expanded="false">Спринт<br>4</a>
                </li>
                <li class="nav-item">
                    <a href="#spr4" class="nav-link" data-toggle="tab" aria-expanded="false">Спринт<br>5</a>
                </li>
                <li class="nav-item">
                    <a href="#spr4" class="nav-link" data-toggle="tab" aria-expanded="false">Спринт<br>6</a>
                </li>
            </ul>


                <div  class="tab-content">
                    <div id="spr1" class="tab-pane  show ">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est excepturi quis totam expedita voluptas veniam, molestias itaque perspiciatis libero aliquid, laborum possimus velit, nemo tempore in repudiandae beatae reprehenderit repellendus eius cumque enim numquam dolor. Eaque maiores fuga iure quia, necessitatibus, nesciunt architecto dolor magni. Voluptatum cum quae, vero laudantium!
                        </p>
                    </div>
                    <div id="spr2" class="tab-pane show active">
                        <table class="table project-table table-striped">
                            <thead>
                                <th>Задача</th>
                                <th style="text-align: center;">План.</th>
                                <th>Факт.</th>
                                <th>%</th>
                                <th>Исполнитель</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href=""><i class="dripicons-document-edit"></i></a>
                                        <small><a href="" class="card-link">Разобраться, как конкуренты предлагают зпч, сразу с доставкой или после</a></small>
                                    </td>
                                    <td>3</td>
                                    <td>1</td>
                                    <td>33</td>
                                    <td><a href="" class="card-link">Гавриленко А.С.</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <small><a href="" class="card-link">Доделать алгоритм автоматизации доставки в 1С и сделать ТЗ в ИТ </a></small>
                                    </td>
                                    <td>3</td>
                                    <td>32</td>
                                    <td>5</td>
                                    <td><a href="" class="card-link">Савченко А.Е.</a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <small><a href="" class="card-link">Сделать в алгоритме автоматизации в блоке транспорта предложения, замечания </a></small>
                                    </td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>100</td>
                                    <td><a href="" class="card-link">Михлай И.К.</a></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="spr3" class="tab-pane show ">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt earum, reprehenderit sequi qui recusandae rem labore numquam, deserunt soluta quo?
                        </p>
                    </div>

                    <div id="spr4" class="tab-pane show ">
                        <p>
                            spr4
                        </p>
                    </div>

                    <div id="target" class="tab-pane show" style="padding: 0px 20px;">
                        <h5>
                            Цели этапа
                        </h5>
                        <p class="text-muted" style="padding-left: 20px;">
                            Начинаем считать фактические даты доставки клиенту, Дату, к которой обещаем привезти (не позже).  И разницу= опоздание по сроку. 
                        </p>
                        <div class="project-target" style="padding-left: 20px;">
                            <div class = "project-target-items" style = "background: #f7931d1c">
                                <div class="project-target-item">
                                    Cделать 50 клиентов /отгрузок по программе.
                                </div>
                                <small> - Скорректированная цель: <a href="">Алла Чиж</a> от 15.02.2018</small>
                            </div>
                            <div class = "project-target-items">
                                <div class="project-target-item">
                                    Отработать ИПР на 2-х клиентах.  Разобраться с проблемами: 1) что такое "отработать " (найти ЛВП и ЛВПР, как найти и найти каналы воздействия).
                                </div>
                                <small></small>
                            </div>
                            <div class = "project-target-items">
                                <div class="project-target-item">
                                    Опоздание  -  не более 5 клиентам  и/или более 10% опозданий (на 2-3 дня) -  считаем вручную.
                                </div>
                                <small></small>
                            </div>
                            <div class = "project-target-items">
                                <div class="project-target-item">
                                    Некомплект при отправках.
                                </div>
                                <small></small>
                            </div>
                        </div>

                        <br> <br>
                        <h5>
                            Итоги этапа
                        </h5>
                        <p class="text-muted" style="padding-left: 20px;">
                            Начинаем считать фактические даты доставки клиенту, Дату, к которой обещаем привезти (не позже).  И разницу= опоздание по сроку. 
                        </p>
                        <div class="project-target" style="padding-left: 20px;">
                            <div class = "project-target-items">
                                <div class="project-target-item">
                                    Разобрались с  проблемой и выработали план действий на примере 3-х клиентов
                                </div>
                            </div>
                            <div class = "project-target-items">
                                <div class="project-target-item">
                                    Выполнили задачи этапа, приняли решение закрыть этап с оценкой Хорошо (зеленая зона).
                                </div>
                                <small></small>
                            </div>
                        </div>


                    </div>
                    
                </div>
            
        </div>
    </div>
    <div class="col-xs-12 col-md-3 ">
        <div class="card">
            <ul class="nav nav-tabs tabs-bordered nav-justified nav-project ">
                <li class="nav-item col-xs-12">
                    <a href="#right1" class="nav-link " data-toggle="tab" aria-expanded="false"><i class=" dripicons-view-list"></i></a>
                </li>
                <li class="nav-item col-xs-12">
                    <a href="#right2" class="nav-link active" data-toggle="tab" aria-expanded="false"><i class="dripicons-user-group"></i></a>
                </li>
                <li class="nav-item col-xs-12">
                    <a href="#right3" class="nav-link " data-toggle="tab" aria-expanded="false"><i class="dripicons-toggles"></i></a>
                </li>
            </ul>

            <div style="padding: 0px 10px; padding-bottom: 10px" class="tab-content">
                    <div id="right1" class="tab-pane  show ">

                        <div class="dropdown mt-3">
                            <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Бэклог
                            </button>
                            <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item" href="#">Добавить</a>
                                <a class="dropdown-item" href="#">Добавить со временем</a>
                            </div>

                            <button type="button" class="btn btn-light waves-effect w-md">Старт</button>
                        </div>
                        <div class="backlog">
                            <div class="backlog-block">
                                <div class="backlog-block-title">
                                    запись от 20.10 15:25
                                </div>
                                <div class="backlog-block-content">
                                    Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности позволяет оценить значение системы обучения кадров, соответствует насущным потребностям. Идейные соображения высшего порядка?
                                </div>
                                <div class="backlog-block-content" style="text-align: right;">
                                    <div class="dropdown mt-3">
                                        <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding-top: 3px;padding-bottom: 3px;">
                                            Отправить в работу
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#">Прикрепить к задаче</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="backlog-block">
                                <div class="backlog-block-title">
                                    запись от 20.10 15:25
                                </div>
                                <div class="backlog-block-content">
                                    Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности позволяет оценить значение системы?
                                </div>
                                <div class="backlog-block-content" style="text-align: right;">
                                    <div class="dropdown mt-3">
                                        <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding-top: 3px;padding-bottom: 3px;">
                                            Отправить в работу
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#">Прикрепить к задаче</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="backlog-block">
                                <div class="backlog-block-title">
                                    запись от 20.10 15:25
                                </div>
                                <div class="backlog-block-content">
                                    Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности позволяет оценить значение системы?
                                </div>
                                <div class="backlog-block-content" style="text-align: right;">
                                    <div class="dropdown mt-3">
                                        <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding-top: 3px;padding-bottom: 3px;">
                                            Отправить в работу
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <a class="dropdown-item" href="#">Прикрепить к задаче</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div id="right2" class="tab-pane show active">
                        <div class="work-group-view">
                            <div class="work-group-view-title" style="padding-top: 10px;">
                                Руководитель проекта
                            </div>
                            <div class="work-group-view-content">
                                <div class="btn-group m-b-10">
                                    <button type="button" class="btn btn-light">Савченко А. Е.</button>
                                    <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Добавить задачу</span>
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(95px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="#">Добавить задачу</a>
                                        <div class="dropdown-divider"></div>
                                        <small style="padding: 10px;">с 20.01.2018</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="work-group-view">
                            <div class="work-group-view-title">
                                Команда
                            </div>
                            <div class="work-group-view-content">
                                <div class="btn-group m-b-10">
                                    <button type="button" class="btn btn-light">Гавриленко А.С.</button>
                                    <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Добавить задачу</span>
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(95px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="#">Добавить задачу</a>
                                        <div class="dropdown-divider"></div>
                                        <small style="padding: 10px;">с 20.01.2018</small>
                                    </div>
                                </div>

                                <div class="btn-group m-b-10">
                                    <button type="button" class="btn btn-light">Червяков Д. В.</button>
                                    <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Добавить задачу</span>
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(95px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="#">Добавить задачу</a>
                                        <div class="dropdown-divider"></div>
                                        <small style="padding: 10px;">с 20.01.2018</small>
                                    </div>
                                </div>

                                <div class="btn-group m-b-10">
                                    <button type="button" class="btn btn-light">Тищенко А. В.</button>
                                    <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Добавить задачу</span>
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(95px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="#">Добавить задачу</a>
                                        <div class="dropdown-divider"></div>
                                        <small style="padding: 10px;">с 20.01.2018</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="work-group-view">
                            <div class="work-group-view-title">
                                Скрам мастер
                            </div>
                            <div class="work-group-view-content">
                                <div class="btn-group m-b-10">
                                    <button type="button" class="btn btn-light">Михлай И. К.</button>
                                    <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Добавить задачу</span>
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(95px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="#">Добавить задачу</a>
                                        <div class="dropdown-divider"></div>
                                        <small style="padding: 10px;">с 20.01.2018</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="right3" class="tab-pane show ">

                            <div style="font-size:12px;padding-top: 10px;font-weight: bold">
                                Управление
                            </div>

                            <a href="javascript:void(0);" class="dropdown-item">
                                    группой
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item">
                                <div>
                                    проектом
                                </div>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item">
                                <div>
                                    новостями
                                </div>
                            </a>
                            
                            <div style="font-size:12px;padding-top: 10px;font-weight: bold">
                                Отчет
                            </div>

                            <a href="javascript:void(0);" class="dropdown-item">
                                <div>
                                    по проекту
                                </div>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item">
                                <div>
                                    по этапу
                                </div>
                            </a>

                            <a href="javascript:void(0);" class="dropdown-item">
                                <div>
                                    по спринту
                                </div>
                            </a>

                    </div>
                    
                </div>

        </div>

        <div class="project-news" style="padding: 10px 0px;">
            Новости проекта
        </div>

        <div class="card">
            <div class="project-news-title">
                <small>28.01.2018</small> <a href="">Верстка осуществляется с помощью Sublime Text 3.</a> 
            </div>

            <div class="project-news-title">
                <small>20.01.2018</small> <a href="">Почти завершена разработка</a> 
            </div>
            <div class="project-news-content">
                <button type="button" class="btn btn-light waves-effect w-md" style="padding: 3px;">Добавить</button>
            </div>
        </div>

    </div>

    
</div>
<style>
    .project-news-title {
        font-size: 14px;
        padding-left: 10px;
        padding-top: 3px;
    }
    .project-news-title a {
        font-size: 14px;
        color: #979797;
        transition: 0.3s;

    }
    .project-news-title a:hover {
        color: black;
    }
    .project-news-content {
        padding: 5px;
    }
    .project .btn-group {
        margin-top: 5px;
    }
    .work-group-view-content .btn-group {
        margin-top: 5px;
    }
    .work-group-view-content .btn {
        padding-top: 2px;
        padding-bottom: 2px;
    }
    .project-target-items{
        padding: 10px;
        background: #f5f5f5;
        border-radius: 3px;
        margin-top: 5px;
    }
</style>
