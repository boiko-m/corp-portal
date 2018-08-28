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


<style>
    .main-info-filial b {
        width:100px;
        display: inline-block;
    }
</style>
<div class="row">
    <div class="col-xs-12 col-md-4 ">
        
        <div class="row">
            <div class="col-12 m-b-30">
                <img class="card-img-top img-fluid card" src="<?= $model->getImage() ?>"
             alt="<?= $model->last_name ?> <?= $model->first_name ?> <?= $model->middle_name ?>"
             style="border-radius: 5px;">
            </div>
        </div>


        <? if (isset($gifts_user)): ?>
            <div class="row">
                <div class="col-12 m-b-30">
                    <div class="card d-block px-3 py-2">
                        
                    
                    <?php
                $count = "<span style='color: #CCC'>$col</span>" ?>
                <?php if (!$col == 0) { ?>
                    <div class="row">
                         <div class="col-md-4" style="padding: 0 0 0 20px; text-align: left; text-decoration: none">
                        <?= Html::a('Подарки: ' . $count, '', ['class' => 'gift-button-view',
                            'data-id' => $id,'style' => ' color: black; cursor: pointer']) ?>
                         </div>
                        <?if(Yii::$app->user->id == $id) {?>
                            <div class="col-md-8" style="text-align: right; padding: 0 20px 0 0;"> Количество монет: <span style='color: #CCC'><?=$model->coins?></span></div>
                        <?php } ?>
                    </div>
                <?php }
                else{?>
                     <?if(Yii::$app->user->id == $id) {?>
                    <div class="col-md-8" style="   text-align: center;"> Количество монет: <span style='color: #CCC'><?=$model->coins?></span></div>
                     <?php } ?>
                <?php } ?>
    

                <div class="row p-3">
                <?php
                foreach ($gifts_user as $value) { //формирование 3 подарков под пользователем
                    $a = Html::a($value['userFrom']['profile']['first_name'] . ' ' . $value['userFrom']['profile']['last_name'], '/profiles/' . $value['userFrom']['id']);
                    if ($value['gift']['img'][0] != '/') {
                        $img = '/' . $value['gift']['img'];
                    } else {
                        $img = $value['gift']['img'];
                    } ?>
                    
                        <div class="col-3">
                            <span class="tooltiplbr"> <!--подарки с ховером-->
                          <img class="img-fluid" id="<?= $value['id'] ?>" src="<?= $img ?>" data-id="<?= $id ?>">
                              <span class="tooltiptext" style=" width: auto"> <!--hover-->
                                   <div class="row" style="padding: 10px; width: auto">

                                       <div class="col-md-3">
                                           <? if (isset($value['userFrom']['profile']['img']) && strlen($value['userFrom']['profile']['img']) > 0): ?>
                                               <img src="/img/user/thumbnail_<?= $value['userFrom']['profile']['img'] ?>"
                                                    alt="user"
                                                    class="rounded-circle" style="width: 35px">
                                           <? else: ?>
                                               <img src="/images/users/avatar-1.jpg" alt="user" class="rounded-circle"
                                                    style="width: 40px">
                                           <? endif; ?>
                                        </div>
                                        <div class="col-md-9" style=" text-align: justify; font-size: 13px">
                                         <?= \yii\helpers\Html::a($value['userFrom']['profile']['first_name'] .
                                             ' ' . $value['userFrom']['profile']['last_name'],
                                             \yii\helpers\Url::to(['/profiles/' . $value['userFrom']['profile']['id']]),
                                             ['class' => 'author', 'style' => 'text-align: left']) ?>
                                            <div style="color: #0a0a0a; text-align: left">
                                               <?= $value['userFrom']['profile']['branch'] ?>
                                           </div>
                                        </div>
                                    </div>

                                  <?php if ($value['message'] != '' && !empty($value['message'])): ?>
                                      <?php if ($col != 1): ?>
                                          <hr style="  margin-top: 0; margin-bottom: 0; "> <?php endif; ?>
                                      <div class="col-md-12"
                                           style="color: #0a0a0a; text-align: center; padding: 5px 0 0 0;">
                                                    "<?= ($value['message']) ?>"
                                                </div>
                                  <?php endif; ?>

                                  <div class="row" style=" width: auto">
                                      <?php if ($value['date'] != '' && !empty($value['date'])): ?>
                                          <div class="col-md-11 date-gift"
                                               style="text-align: right">  <?= date('d.m.y G:i', $value['date']); ?></div>
                                      <?php endif; ?>
                                  </div>
                              </span>
                        </span>
                        
                    </div>
                <?php } ?>
                </div>

                <?php if (Yii::$app->user->id != $id) { ?>
                        <div class="row">
                            <div class="col-12 text-center pt-3">
                                <?= Html::a('<i class="fa fa-gift "></i>Отправить подарок', '', [
                                    'class' => 'btn  waves-effect w-md btn-light showModalButton mx-auto',
                                    'data' => $id,
                                    'style' => ' border-radius: 2px'
                                ]) ?>
                            </div>
                        </div>
                <?php } ?>
                </div>

                </div>
            </div>
            <?php endif; ?>
    </div>


    <div class="col-xs-12 col-md-8">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class=""
                    style="font-weight: bold; color: black; margin: 0px;"><?= $model->last_name ?> <?= $model->first_name ?> <?= $model->middle_name?>  <span class="online"><?=' '.$online?></span> </h5>
            </div>

            <div class="row main-info-filial">
                <div class="col-12 my-2 pl-5">
                    <?php if ($model->branch): ?>
                        <div class="row">
                            <div class="col-12">
                                <div> <b>Филиал:</b> <?= $model->branch ?> </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if ($model->department): ?>
                        <div class="row">
                            <div class="col-12">
                                <div> <b>Отдел:</b> <?= $model->department ?> </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if ($model->position): ?>
                        <div class="row">
                            <div class="col-12">
                                    <div> <b>Должность:</b> <?= $model->position ?> </div>
                            </div>
                        </div>
                    <?php endif ?>

                </div>
            </div>
            <!--<span class="tooltipN">
                     <span data-default="4080" id="ajax_4080" class="ajax-user "></span>
                </span>
-->
            <?php if (isset($user->email)): ?>
            <ul class="nav nav-tabs tabs-bordered">
                <li class="nav-item">
                    <a href="#home-b1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        Основная информация
                    </a>
                </li>

                <!--<li class="nav-item">
                    <a href="#profile-b1" data-toggle="tab" aria-expanded="true" class="nav-link ">
                       Подарки
                    </a>
                </li>-->
                <!--
               <li class="nav-item">
                   <a href="#profile-b1" data-toggle="tab" aria-expanded="true" class="nav-link ">
                       Управление
                   </a>
               </li> -->
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="home-b1">
                    <?php if (isset($model->phone) and strlen($model->phone) > 0): ?>
                        <?php $phones = explode(";", $model->phone); ?>
                        <?php foreach ($phones as $phone): ++$i;?>
                            <div class="row information_row">
                                <div class="col-12 col-md-3">
                                    Телефон <?php echo ($i>1) ?  "№".$i: ''; ?>
                                </div>
                                <div class="col-9">
                                    <div>
                                        <a href="tel:<?=$phone?>"><?=$phone;?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        
                    <?php endif ?>


                    <?php if ($model->skype): ?>
                        <div class="row information_row">
                            <div class="col-12 col-md-3">
                                Скайп
                            </div>
                            <div class="col-9">
                                <a href="skype:<?= $model->skype ?>?chat"><?= $model->skype ?></a>
                            </div>
                        </div>
                    <?php endif ?>

                    <?php if ($user->email): ?>
                        <div class="row information_row">
                            <div class="col-12 col-md-3">
                                Электронная почта
                            </div>
                            <div class="col">
                                <a href="mailto:<?= $user->email ?>"><?= $user->email ?></a>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if ($model->birthday): ?>
                        <div class="row information_row">
                            <div class="col-12 col-md-3">
                                День рождения
                            </div>
                            <div class="col">
                                <?= $model->getBirthday()?>
                            </div>
                        </div>
                    <?php endif ?>

                    <?=var_dump($model->sip) ?>

                    <?php if (isset($model->sip) and $model->sip != 0): ?>
                        <div class="row information_row">
                            <div class="col-12 col-md-3">
                                IP-номер
                            </div>
                            <div class="col">
                                <?= $model->sip ?>
                            </div>
                        </div>
                    <?php endif ?>

                    <?php if ($model->cabinet): ?>
                        <div class="row information_row">
                            <div class="col-12 col-md-3">
                                Кабинет
                            </div>
                            <div class="col">
                                <?= $model->cabinet ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if ($model->phone_cabinet and $model->phone_cabinet != "-"): ?>
                        <div class="row information_row">
                            <div class="col-12 col-md-3">
                                Аналоговый номер
                            </div>
                            <div class="col">
                                <?= $model->phone_cabinet ?>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if ($model->about): ?>
                        <div class="row information_row">
                            <div class="col-12 col-md-3">
                                Обо мне
                            </div>
                            <div class="col">
                                <?= $model->about ?>
                            </div>
                        </div>
                    <?php endif ?>

                </div>

                <div class="tab-pane fade" id="profile-b1">
                    <?php if (Yii::$app->user->id != $id) { ?>
                        <?= Html::a('Отправить подарок', '', ['class' => 'btn  waves-effect w-md btn-light showModalButton', 'data' => $id]) ?>

                    <?php } ?>
                    <?= Html::a('Просмотреть все', '', ['class' => 'btn  waves-effect w-md btn-light gift-button-view', 'data' => $id]) ?>
                </div>
                <?php endif // если нет email, то не выводим всю общую информацию?>

            </div>
        </div>

    </div>
