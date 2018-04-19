<?php

use app\models\Session;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = "Профиль: " . $model->first_name . " " . $model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-xs-12 col-md-4 ">
        <img class="card-img-top img-fluid card" src="http://portal.lbr.ru/img/user/thumbnail_<?=$model->getImage()?>" alt="Card image cap" style = "border-radius: 5px">

        

        <!-- <div class="row">
            <div class="col-12 card-box">
                asd
            </div>
        </div> -->
    </div>
    <div class="col-xs-12 col-md-8">
        <div class="card-box m-b-30">

            <div class="row">
                <div class="col-9">
                    <div >
                        <h5  class="card-title" style="font-weight: bold;color: black"><?=$model->last_name?> <?=$model->first_name?> <?=$model->middle_name?></h5>
                    </div>
                    
                </div>
                <?php if (Session::getOnlineUser($model->id)) { ?>
                    <div class="col-3 text-right" style="color:#d6d6d6;font-size: 12px;">
                        online
                    </div>
                <?php } ?>
                
             </div>
            <div class="row">
                <div class="col-2">
                    Филиал:
                </div>
                <div>
                    <?=$model->branch?>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    Отдел:
                </div>
                <div>
                    <?=$model->department?>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    Должность:
                </div>
                <div>
                    <?=$model->position?>
                </div>
            </div>
                
                

           

            <br>
                    <ul class="nav nav-tabs tabs-bordered">
                        <li class="nav-item">
                            <a href="#home-b1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                Основная информация
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#profile-b1" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                Сообщения
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile-b1" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                Управление
                            </a>
                        </li> -->
                    </ul>
                    <style>
                        .information_row {
                            border-bottom: 1px solid #ebebeb;
                            padding: 5px;
                        }
                    </style>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home-b1">
                            
                            
                            <?php if ($model->phone1): ?>
                                <div class="row information_row">
                                    <div class="col">
                                        Телефон 1
                                    </div>
                                    <div class="col">
                                        <?=$model->phone1 ?>
                                    </div>
                                </div>
                            <?php endif ?>
                            <?php if ($model->phone2): ?>
                                <div class="row information_row">
                                    <div class="col">
                                        Телефон 2
                                    </div>
                                    <div class="col">
                                        <?=$model->phone2 ?>
                                    </div>
                                </div>
                            <?php endif ?>

                            <div class="row information_row">
                                <div class="col">
                                    Скайп
                                </div>
                                <div class="col">
                                    <a href="skype:<?=$model->skype ?>?chat"><?=$model->skype ?></a>
                                </div>
                            </div>

                            <div class="row information_row">
                                <div class="col">
                                    Электронная почта
                                </div>
                                <div class="col">
                                    <a href="mailto:<?=$user->email ?>"><?=$user->email ?></a>
                                </div>
                            </div>

                            <?php if (isset($model->sip) and $model->sip != 0): ?>
                                <div class="row information_row">
                                    <div class="col">
                                        SIP
                                    </div>
                                    <div class="col">
                                        <?=$model->sip ?>
                                    </div>
                                </div>
                            <?php endif ?>
                            
                            <?php if ($model->cabinet): ?>
                                <div class="row information_row">
                                    <div class="col">
                                        Кабинет
                                    </div>
                                    <div class="col">
                                        <?=$model->cabinet ?>
                                    </div>
                                </div>
                            <?php endif ?>
                            <?php if ($model->phone_cabinet and $model->phone_cabinet != "-"): ?>
                                <div class="row information_row">
                                    <div class="col">
                                        Внутренний телефон
                                    </div>
                                    <div class="col">
                                        <?=$model->phone_cabinet ?>
                                    </div>
                                </div>
                            <?php endif ?>
                            <?php if ($model->about): ?>
                                <div class="row information_row">
                                    <div class="col">
                                        Обо мне
                                    </div>
                                    <div class="col">
                                        <?=$model->about ?>
                                    </div>
                                </div>
                            <?php endif ?>

                        </div>

                        <div class="tab-pane fade" id="profile-b1">
                            2 часть
                        </div>
            </div>

        </div>
    </div>
   
</div>