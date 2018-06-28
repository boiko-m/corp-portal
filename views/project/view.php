<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Проект "Индивидуальный план рекламы (ИПР)"';
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
    .nav-tabs .nav-link {
        border: 5px solid #ff000000;
    }
    
</style>

<div class="row">
    <div class="col-xs-9 col-md-9 ">
        <div class="card">
            <ul class="nav nav-tabs nav-justified nav-project " style="margin: 10px;">
                <li class="nav-item">
                    <a href="#id=1" class="nav-link" data-toggle="tab" aria-expanded="false" onclick = "tajax('/project/all', {
                        container : 'projectall',
                        data: 'id=1'
                    })">1 этап (01.01. -21.02.18)</a>
                </li>
               <li class="nav-item">
                    <a href="#spr2" class="nav-link" data-toggle="tab" aria-expanded="false" onclick = "tajax('/project/all', {
                        container : 'projectall',
                        data: 'id=2'
                    })">2 этап (21.02. - 25.04.18)</small></a>
                </li>
                 <li class="nav-item">
                    <a href="#spr3" class="nav-link active" data-toggle="tab" aria-expanded="false" onclick = "tajax('/project/all', {
                        container : 'projectall',
                        data: 'id=3'
                    })">3 этап (27.04 - 21.06.18)</a>
                </li>
                 <li class="nav-item">
                    <a href="#spr4" class="nav-link" data-toggle="tab" aria-expanded="false" onclick = "tajax('/project/all', {
                        container : 'projectall',
                        data: 'id=4'
                    })">4 этап <br> <br></a>
                </li>
                <li class="nav-item col-xs-3 col-md-3">
                    <a href="#target2" class="nav-link" data-toggle="tab" aria-expanded="false" onclick = "tajax('/project/infoajax', {
                        container : 'projectall',
                        data: 'id=1'
                    })">Проект <br> <br></a>
                </li>
            </ul>

            <div>
                <div id = "projectall">
                    // контент
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
                                    <button type="button" class="btn btn-light">Масюк Е.</button>
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
                                    <button type="button" class="btn btn-light">Гавриленко А.</button>
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
                                    <button type="button" class="btn btn-light">Власов С.</button>
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
                                    <button type="button" class="btn btn-light">Горустович Ю.</button>
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
                                    <button type="button" class="btn btn-light">Савченко А.</button>
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
                                    <button type="button" class="btn btn-light">Солтан Д.</button>
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
                                Привлеченный состав:
                            </div>
                            <div class="work-group-view-content">
                                <div class="btn-group m-b-10">
                                    <button type="button" class="btn btn-light">Жуковский Ю.</button>
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
                                    <button type="button" class="btn btn-light">Бондарев С.</button>
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
                                    <button type="button" class="btn btn-light">Дубовик С.</button>
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
                                    <button type="button" class="btn btn-light">Чиж А.</button>
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
<script>
$( document ).ready(function() {
  tajax('/project/all', {
                        container : 'projectall',
                        data: 'id=3'
                    })
});
    
</script>
<br>

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
        margin-top: 10px;
        box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8!important;
    }
    .success-border {
        border: 1px solid #43c499;
    }
</style>
