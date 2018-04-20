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
                        <li><a href="/admin/user">Дан. авторизации</a></li>
                        <li><a href="/admin/profile">Профили</a></li>
                    </ul>
                </li>

                <li>
                    <a href="/admin/news">
                        <i class="fi-file"></i> <span>Новости</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/videos">
                        <i class="fi-file"></i> <span>Видео</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fi-file"></i><span> Обуч. материал </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/admin/faq">FAQ</a></li>
                        <li><a href="/admin/faq-type">Типы</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fi-file"></i><span> Подарки </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/admin/gift">Подарки</a></li>
                        <li><a href="/admin/gift-type">Типы подарков</a></li>
                    </ul>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
