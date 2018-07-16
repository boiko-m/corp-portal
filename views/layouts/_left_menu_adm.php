<?php

use yii\helpers\Url;
use app\models\User;
use app\models\News;

?>

<style>
    .badge-info-status {
        margin-left: 5px;
        background-color: #F7931D;
    }
</style>

<?php $unconfirmedNews = News::find()->where(['status' => 0])->orderBy('id desc')->count() ?>

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
                <?if(\Yii::$app->user->can("allAccess")):?>
                <li>
                    <a href="javascript: void(0);"><i class="fi-file"></i><span> Роли </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/rbac/route">Маршруты</a></li>
                        <li><a href="/rbac/permission">Разрешения</a></li>
                        <li><a href="/rbac/role">Роли</a></li>
                        <li><a href="/rbac/assignment">Назначения</a></li>
                    </ul>
                </li>
                <?endif;?>
                <?if(\Yii::$app->user->can("allAccess")):?>
                <li>
                    <a href="javascript: void(0);"><i class="fi-file"></i><span> Пользователи </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/admin/userup/">Обновление</a></li>
                        <li><a href="/admin/user">Дан. авторизации</a></li>
                        <li><a href="/admin/profile">Профили</a></li>
                        <li><a href="/admin/setting-options">Настройки интерфейса</a></li>
                    </ul>
                </li>
                <?endif;?>
                <?if(\Yii::$app->user->can("controlProject")):?>
                <li>
                    <a href="javascript: void(0);"><i class="fi-file"></i><span> Проекты </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/admin/projects">Проекты</a></li>
                        <li><a href="/admin/project-news">Новости о проектах</a></li>
                        <li><a href="/admin/project-user-group">Группы пользователей</a></li>
                    </ul>
                </li>
                <?endif;?>
                    <?if(\Yii::$app->user->can("controlMessages")):?>
                <li>

                    <a href="javascript: void(0);"><i class="fi-file"></i><span> Сообщения </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/admin/im-groups/">Группы</a></li>
                        <li><a href="/admin/type-group-im">Тип групп</a></li>
                        <li><a href="/admin/attachments-message">Вложения сообщений</a></li>
                    </ul>

                </li>
            <?endif;?>
                <?if(\Yii::$app->user->can("controlNews")):?>
                <li>
                    <a href="/admin/news">
                        <i class="fi-file"></i> <span>Новости</span><span class="badge badge-info badge-info-status" style="margin-top: 2px;"><?= $unconfirmedNews ?></span>
                    </a>
                </li>
                <?endif;?>
                <?if(\Yii::$app->user->can("controlVideo")):?>
                <li>

                    <a href="/admin/videos">
                        <i class="fi-file"></i> <span>Видео</span>
                    </a>
                </li>
            <?endif;?>
                <?if(\Yii::$app->user->can("controlFAQ")):?>
                <li>
                    <a href="javascript: void(0);"><i class="fi-file"></i><span> Обуч. материал </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/admin/faq">FAQ</a></li>
                        <li><a href="/admin/faq-type">Типы</a></li>
                    </ul>
                </li>
                <?endif;?>
                <?if(\Yii::$app->user->can("controlGift")):?>
                <li>
                    <a href="javascript: void(0);"><i class="fi-file"></i><span> Подарки </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/admin/gift">Подарки</a></li>
                        <li><a href="/admin/gift-type">Типы подарков</a></li>
                    </ul>
                </li>
                <?endif;?>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
