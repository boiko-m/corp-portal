<?php
    use yii\helpers\Url;
    use app\models\User;
    use app\models\News;
    use app\models\WantToProject;
    use app\models\Profile;

    $unconfirmedNews = News::find()->where(['status' => 0])->orderBy('id desc')->count();
    $unconfirmedStatements = WantToProject::find()->where(['complete' => 0])->orderBy('id desc')->count();
    $scrumMaster = (Profile::findOne(Yii::$app->user->id))->id_profile_position;
?>

<style>
    .badge-info-status {
        margin-left: 5px;
        background-color: #F7931D;
    }
</style>

<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Админ-панель</li>
                <div>
                    <div>
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
                        <li class="<?= $scrumMaster == 150 ? 'active' : null ?>">
                            <a href="javascript: void(0);"><i class="fi-file"></i><span> Проекты </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="/admin/projects">Проекты</a></li>
                                <li><a href="/admin/project-news">Новости проектов</a></li>
                                <li><a href="/admin/attachment-project-news">Подшитые файлы</a></li>
                                <li><a href="/admin/project-user">Назначения</a></li>
                                <li><a href="/admin/want-to-project">Желающие<span class="badge badge-info badge-info-status"><?= $unconfirmedStatements ?></span></a></li>
                                <li><a href="/admin/project-user-group">Группы пользователей</a></li>
                            </ul>
                        </li>
                        <?endif;?>
                        <?if(\Yii::$app->user->can("allAccess")):?>
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
                            <a href="javascript: void(0);">
                                <i class="fi-file"></i> <span>Новости <span class="badge badge-info badge-info-status"><?= $unconfirmedNews ?></span></span> <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="/admin/news">Новости</a></li>
                                <li><a href="/admin/news-category">Категории</a></li>
                            </ul>
                        </li>
                        <?endif;?>
                        <?if(\Yii::$app->user->can("Marketing")):?>
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

                        <?if(\Yii::$app->user->can("Broadcast manager")):?>
                        <li>
                            <a href="/admin/broadcast"><i class="fi-file"></i><span> Трансляции </span></a>
                        </li>
                        <?endif;?>

                        <?if(\Yii::$app->user->can("Questionnaire manager")):?>
                        <li>
                            <a href="javascript: void(0);"><i class="fi-file"></i><span> Компания </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="/admin/filials">Филиалы</a></li>
                                <li><a href="/admin/questionnaire">Опросы</a></li>
                            </ul>
                        </li>
                        <?endif;?>
                    </div>
                </div>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
