<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use app\models\User;
?>

<? if (!Yii::$app->user->isGuest): ?>
<?
$profile = Yii::$app->user->identity->profile;
?>
<li class="dropdown notification-list">
    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
       aria-haspopup="false" aria-expanded="false">
        <?if(isset($profile['img']) && strlen($profile['img']) > 0):?>
            <img src="/img/user/thumbnail_<?=$profile['img']?>" alt="user" class="rounded-circle">
        <?else:?>
            <img src="/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
        <?endif;?>
        <span class="ml-1" style="color: white;">
            <? echo $profile->first_name; ?>
            <i class="mdi mdi-chevron-down"></i>
        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
        <!-- item-->
        <div class="dropdown-item noti-title">
            <h6 class="text-overflow m-0">Мой аккаунт</h6>
        </div>

        <!-- item-->
        <a href="<?=Url::toRoute(['profiles/view', 'id' => Yii::$app->user->id])?>" class="dropdown-item notify-item">
            <i class="fi-head"></i> <span>Профиль</span>
        </a>

        <a href="<?=Url::toRoute(['profiles/update', 'id' => Yii::$app->user->id])?>" class="dropdown-item notify-item">
            <i class="fi-cog"></i> <span>Изм. профиль</span>
        </a>

        <?if(\Yii::$app->user->can("Admin")):?>
        <!-- item-->
            <a href="/admin/" class="dropdown-item notify-item">
                <i class="fi-lock"></i> <span>Админ-панель</span>
            </a>
        <?endif;?>

        <!-- item-->
<!--         <a href="javascript:void(0);" class="dropdown-item notify-item">
    <i class="fi-cog"></i> <span>Настройки</span>
</a>

item
<a href="javascript:void(0);" class="dropdown-item notify-item">
    <i class="fi-help"></i> <span>Помощь</span>
</a> -->

        <!-- item-->
        <a href="/user/logout" class="dropdown-item notify-item">
            <i class="fi-power"></i> <span>Выйти</span>
        </a>

    </div>
</li>
<? endif; ?>
