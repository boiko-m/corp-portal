<?php

use app\models\Session;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = "Профиль: " . $model->first_name . " " . $model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Сотрудники', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-xs-12 col-md-4 ">

            <img class="card-img-top img-fluid card" src="<?=$model->getImage()?>" alt="<?=$model->last_name?> <?=$model->first_name?> <?=$model->middle_name?>" style = "border-radius: 5px">




            <div class="carousel view">
                <?php if(count($gift)>4){?>
                <div class="carousel-button-left view"><a href="#"></a></div>
                <div class="carousel-button-right view"><a href="#"></a></div>
                <?php }?>
                <div class="carousel-wrapper">
                    <div class="carousel-items">
                <?php
                foreach ($gift as $value){

                    if($value['gift']['img'][0] != '/') {
                        $img = '/'.$value['gift']['img'];
                    }
                    else{
                        $img = $value['gift']['img'];
                    }
                    ?>
                    <div class="carousel-block view">
                    <img class="card-img-top img-fluid card m-b-30" src="<?=$img?>"  style = "border-radius: 5px; height: 50px; width: 50px; margin: 5px">
            </div>
                <?php }?>
            </div>
                </div>
            </div>



       <!-- <div class="row">
            <div class="btn-group mb-2" style="width: 100%">
                <a href = "/" class="btn  waves-effect w-md btn-light" style="width: 100%">Подарить</a>
                <a href = "/" class="btn  waves-effect w-md btn-light" style="width: 100%">Просмотреть все</a>
            </div>
        </div>-->
    </div>
    <div class="col-xs-12 col-md-8">
        <div class="card m-b-30">
			<div class = "card-header">
                        <h5  class="" style="font-weight: bold;color: black;margin: 0px;"><?=$model->last_name?> <?=$model->first_name?> <?=$model->middle_name?></h5>
                    </div>
            	
            	<div class="col-12" style="padding: 10px 20px;">
            		<?php if ($model->branch): ?>
            			<div> Филиал: <?=$model->branch?> </div>
            		<?php endif ?>
            		<?php if ($model->department): ?>
            			<div> Отдел: <?=$model->department?> </div>
            		<?php endif ?>
            		<?php if ($model->position): ?>
            			<div> Должность: <?=$model->position?> </div>
            		<?php endif ?>
            	</div>

                    <?php if (isset($user->email)): ?>
                    	<ul class="nav nav-tabs tabs-bordered">
	                        <li class="nav-item">
	                            <a href="#home-b1" data-toggle="tab" aria-expanded="false" class="nav-link active">
	                                Основная информация
	                            </a>
	                        </li>

	                        <li class="nav-item">
	                            <a href="#profile-b1" data-toggle="tab" aria-expanded="true" class="nav-link ">
	                               Подарки
	                            </a>
	                        </li>
                            <!--
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
                            margin: 5px;
                        }
                    </style>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home-b1">


                            <?/*php if ($model->phone1): ?>
                                <div class="row information_row">
                                    <div class="col">
                                        Контакты
                                    </div>
                                    <div class="col">
                                        <?php $phones = explode(";", $model->phone1); ?>
                                        <?php foreach ($phones as $phone): ?>
                                            <div>
                                                <a href="tel:<?=$phone?>"><?=$phone?></a>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            <?php endif */?>

							<?php if (isset($model->phone) and strlen($model->phone) > 0): ?>
                                <div class="row information_row">
                                    <div class="col">
                                        Телефон
                                    </div>
                                    <div class="col">
										<div>
											<a href="tel:<?=preg_replace("/[\+\s\(\)\-]+/", "", $model->phone)?>"><?=$model->phone?></a>
										</div>
                                    </div>
                                </div>
                            <?php endif ?>
							<?php if (isset($model->phone1) and strlen($model->phone1) > 0): ?>
                                <div class="row information_row">
                                    <div class="col">
                                        Телефон (доп.)
                                    </div>
									<div class="col">
                                        <?php $phones = explode(";", $model->phone1); ?>
                                        <?php foreach ($phones as $phone): ?>
                                            <div>
                                                <a href="tel:<?=$phone?>"><?=$phone?></a>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            <?php endif ?>
							<?php if (isset($model->phone2) and strlen($model->phone2) > 0): ?>
                                <div class="row information_row">
                                    <div class="col">
                                        Телефон (доп.)
                                    </div>
									<div class="col">
                                        <?php $phones = explode(";", $model->phone2); ?>
                                        <?php foreach ($phones as $phone): ?>
                                            <div>
                                                <a href="tel:<?=$phone?>"><?=$phone?></a>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            <?php endif ?>
							
							<?php if ($model->skype): ?>
								<div class="row information_row">
	                                <div class="col">
	                                    Скайп
	                                </div>
	                                <div class="col">
	                                    <a href="skype:<?=$model->skype ?>?chat"><?=$model->skype ?></a>
	                                </div>
	                            </div>
							<?php endif ?>
                            
							<?php if ($user->email): ?>
								<div class="row information_row">
	                                <div class="col">
	                                    Электронная почта
	                                </div>
	                                <div class="col">
	                                    <a href="mailto:<?=$user->email ?>"><?=$user->email ?></a>
	                                </div>
	                            </div>
							<?php endif ?>
                            

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



                            <?php if(Yii::$app->user->id != $id){?>
                                <?=Html::a('Отправить подарок', '', ['class' => 'btn  waves-effect w-md btn-light showModalButton', 'data' =>$id])?>

                            <?php }?>

                            <div class="row" style="padding: 0 50px 0 50px">
                                <?php
                                foreach ($gift as $value){

                                    if($value['gift']['img'][0] != '/') {
                                        $img = '/'.$value['gift']['img'];
                                    }
                                    else{
                                        $img = $value['gift']['img'];
                                    }
                                    ?>
                                    <div class=" margin15"  >
                                        <img class="card-img-top img-fluid card m-b-30" src="<?=$img?>"  style = "border-radius: 5px; height: 75px; width: 75px;">
                                    </div>

                                <?php }
                                ?>

                            </div>
                        </div>

            </div>
		<?php endif // если нет email, то не выводим всю общую информацию?>

        </div>
    </div>

</div>


