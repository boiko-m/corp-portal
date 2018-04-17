<?php

/* @var $this \yii\web\View */

use yii\helpers\Url;
use app\models\User;
?>

<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Админ-панель</li>
                <li>
                    <a href="/admin/">
                        <i class="fi-grid"></i> <span> Главная </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fi-file"></i><span> Роли </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/rbac/route">Маршруты</a></li>
                        <li><a href="/rbac/permission">Разрешения</a></li>
                        <li><a href="/rbac/role">Роли</a></li>
                        <li><a href="/rbac/assignment">Назначения</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fi-file"></i><span> Пользователи </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="<?=Url::toRoute(['user/index'])?>">Дан. авторизации</a></li>
                        <li><a href="<?=Url::toRoute(['profile/index'])?>">Профили</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?=Url::toRoute(['news/index'])?>">
                        <i class="fi-file"></i> <span>Новости</span>
                    </a>
                </li>

                <li>
                    <a href="<?=Url::toRoute(['videos/index'])?>">
                        <i class="fi-file"></i> <span>Видео</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fi-file"></i><span> Подарки </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="<?=Url::toRoute(['gift/index'])?>">Подарки</a></li>
                        <li><a href="<?=Url::toRoute(['gift-type/index'])?>">Типы подарков</a></li>
                    </ul>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
