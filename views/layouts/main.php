<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\AppAssetBottom;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id = "wrapper">
    <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="/" class="logo">
                        <span>
                            <img src="/images/logo.png" alt="" height="32">
                        </span>
                        <i>
                            <img src="/images/logo_sm.png" alt="" height="28">
                        </i>
                    </a>
                </div>

                <nav class="navbar-custom">

                    <ul class="list-unstyled topbar-right-menu float-right mb-0">


                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <i class="fi-bell noti-icon"></i>
                                <span class="badge badge-danger badge-pill noti-icon-badge">4</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Удалить все</small></a> </span>Уведомления</h6>
                                </div>

                                <div class="slimscroll" style="max-height: 190px;">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
                                        <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>
                                        <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3 days ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i></div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-purple"><i class="mdi mdi-account-plus"></i></div>
                                        <p class="notify-details">New user registered.<small class="text-muted">7 days ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-custom"><i class="mdi mdi-heart"></i></div>
                                        <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">13 days ago</small></p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    Отобразить все <i class="fi-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <i class="fi-speech-bubble noti-icon"></i>
                                <span class="badge badge-light badge-pill noti-icon-badge">6</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Очистить</small></a> </span>Чат</h6>
                                </div>

                                <div class="slimscroll" style="max-height: 190px;">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Максим Лешик</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Привет, как дела? Возьми у меня заказ</p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="/images/users/avatar-3.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Sam Garret</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Wow that's great</p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="/images/users/avatar-5.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Sherry Marshall</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next meeting</p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="/images/users/avatar-6.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Shawn Millard</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    Все сообщения <i class="fi-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <img src="/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1">Андрей <i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Мой аккаунт !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-head"></i> <span>Профиль</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-cog"></i> <span>Настройки</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-help"></i> <span>Помощь</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-power"></i> <span>Выйти</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        <?php
                            /*
                            <li class="hide-phone app-search">
                            <form role="search" class="">
                                <input type="text" placeholder="Поиск..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                        */
                         ?>
                    </ul>

                </nav>

            </div>
            <!-- end topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Комания</li>
                            <li>
                                <a href="index.html">
                                    <i class="fi-air-play"></i> <span> Главная </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-briefcase"></i> <span> Компания </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="https://www.lbr.ru/company/contacts/" target="_blank">Филиалы</a></li>
                                    <li><a href="ui-cards.html">Презентация компании</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="index.html">
                                    <i class="fi-air-play"></i> <span> Сотрудники </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-bar-graph-2"></i><span> Документы </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="chart-flot.html">Часто задаваемые вопросы - Отдел ИТ</a></li>
                                    <li><a href="chart-morris.html">Доступ к каталогам компании</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-mail"></i><span> База знаний </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="email-inbox.html">Словари и глоссарии</a></li>
                                    <li><a href="email-read.html">Обучающий материал</a></li>
                                    <li><a href="email-compose.html">Видео материал</a></li>
                                    <li><a href="email-compose.html">Общение с клиентом по погашению просроченной задолжности</a></li>
                                </ul>
                            </li>

                             <li>
                                <a href="index.html">
                                    <i class="fi-air-play"></i> <span> Помощь сотруднику </span>
                                </a>
                            </li>


                            

                            <?php // <li class="menu-title">Дни Рождения:</li> ?>



                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->


            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Главная</h4>

                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">Abstack</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fi-box float-right"></i>
                                    <h6 class="text-muted text-uppercase mb-3">Orders</h6>
                                    <h4 class="mb-3" data-plugin="counterup">1,587</h4>
                                    <span class="badge badge-primary"> +11% </span> <span class="text-muted ml-2 vertical-middle">From previous period</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fi-layers float-right"></i>
                                    <h6 class="text-muted text-uppercase mb-3">Revenue</h6>
                                    <h4 class="mb-3">$<span data-plugin="counterup">46,782</span></h4>
                                    <span class="badge badge-primary"> -29% </span> <span class="text-muted ml-2 vertical-middle">From previous period</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fi-tag float-right"></i>
                                    <h6 class="text-muted text-uppercase mb-3">Average Price</h6>
                                    <h4 class="mb-3">$<span data-plugin="counterup">15.9</span></h4>
                                    <span class="badge badge-primary"> 0% </span> <span class="text-muted ml-2 vertical-middle">From previous period</span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="fi-briefcase float-right"></i>
                                    <h6 class="text-muted text-uppercase mb-3">Product Sold</h6>
                                    <h4 class="mb-3" data-plugin="counterup">1,890</h4>
                                    <span class="badge badge-primary"> +89% </span> <span class="text-muted ml-2 vertical-middle">Last year</span>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xl-7">
                                <div class="card-box">
                                    <h4 class="header-title">Transactions History</h4>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="text-center mt-3">
                                                <h6 class="font-normal text-muted font-14">Conversion Rate</h6>
                                                <h6 class="font-18"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> <span class="text-dark">1.78%</span> <small></small></h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center mt-3">
                                                <h6 class="font-normal text-muted font-14">Average Order Value</h6>
                                                <h6 class="font-18"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> <span class="text-dark">25.87</span> <small>USD</small></h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center mt-3">
                                                <h6 class="font-normal text-muted font-14">Total Wallet Balance</h6>
                                                <h6 class="font-18"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> <span class="text-dark">87,4517</span> <small>USD</small></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <canvas id="transactions-chart" height="350" class="mt-4"></canvas>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="card-box">
                                    <h4 class="header-title">Sales History</h4>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="text-center mt-3">
                                                <h6 class="font-normal text-muted font-14">Conversion Rate</h6>
                                                <h6 class="font-18"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> <span class="text-dark">3.94%</span> <small></small></h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center mt-3">
                                                <h6 class="font-normal text-muted font-14">Average Sales</h6>
                                                <h6 class="font-18"><i class="mdi mdi-arrow-down-bold-hexagon-outline text-danger"></i> <span class="text-dark">16.25</span> <small>USD</small></h6>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center mt-3">
                                                <h6 class="font-normal text-muted font-14">Total Sales</h6>
                                                <h6 class="font-18"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> <span class="text-dark">124,858.67</span> <small>USD</small></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <canvas id="sales-history" height="350" class="mt-4"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Messages</h4>

                                    <div class="inbox-widget slimscroll" style="max-height: 370px;">
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-1.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Chadengle</p>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">13:40 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-2.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Tomaslau</p>
                                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                                <p class="inbox-item-date">13:34 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-3.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Stillnotdavid</p>
                                                <p class="inbox-item-text">This theme is awesome!</p>
                                                <p class="inbox-item-date">13:17 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-4.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Kurafire</p>
                                                <p class="inbox-item-text">Nice to meet you</p>
                                                <p class="inbox-item-date">12:20 PM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-5.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Shahedk</p>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">10:15 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-6.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Adhamdannaway</p>
                                                <p class="inbox-item-text">This theme is awesome!</p>
                                                <p class="inbox-item-date">9:56 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-8.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Arashasghari</p>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">10:15 AM</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img"><img src="assets/images/users/avatar-9.jpg" class="rounded-circle bx-shadow-lg" alt=""></div>
                                                <p class="inbox-item-author">Joshaustin</p>
                                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                                <p class="inbox-item-date">9:56 AM</p>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Latest Comments</h4>

                                    <div class="comment-list slimscroll" style="max-height: 370px;">
                                        <a href="#">
                                            <div class="comment-box-item">
                                                <div class="badge badge-pill badge-success">Ubold - Admin</div>
                                                <p class="commnet-item-date">1 month ago</p>
                                                <h6 class="commnet-item-msg">Do you have any plans to add a vertical menu?</h6>
                                                <p class="commnet-item-user">Ubold User</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="comment-box-item">
                                                <div class="badge badge-pill badge-warning">Adminox - Admin</div>
                                                <p class="commnet-item-date">1 month ago</p>
                                                <h6 class="commnet-item-msg">Hello, what is your plan to upgrade Bootstrap 4 versions? Beta or wait for stable?</h6>
                                                <p class="commnet-item-user">Ubold User</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="comment-box-item">
                                                <div class="badge badge-pill badge-primary">Staro - Landing</div>
                                                <p class="commnet-item-date">1 month ago</p>
                                                <h6 class="commnet-item-msg">Hi coderthemes – do you have PSD for this admin UI? I could really use it.</h6>
                                                <p class="commnet-item-user">Ubold User</p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="comment-box-item">
                                                <div class="badge badge-pill badge-dark">Ubold - Admin</div>
                                                <p class="commnet-item-date">1 month ago</p>
                                                <h6 class="commnet-item-msg">Do you have any plans to add a vertical menu?</h6>
                                                <p class="commnet-item-user">Ubold User</p>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card-box">
                                    <h4 class="header-title mb-4">Last Transactions</h4>

                                    <ul class="list-unstyled transaction-list slimscroll mb-0" style="max-height: 370px;">
                                        <li>
                                            <i class="dripicons-arrow-down text-success"></i>
                                            <span class="tran-text">Advertising</span>
                                            <span class="pull-right text-success tran-price">+$230</span>
                                            <span class="pull-right text-muted">07/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-up text-danger"></i>
                                            <span class="tran-text">Support licence</span>
                                            <span class="pull-right text-danger tran-price">-$965</span>
                                            <span class="pull-right text-muted">07/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-down text-success"></i>
                                            <span class="tran-text">Extended licence</span>
                                            <span class="pull-right text-success tran-price">+$830</span>
                                            <span class="pull-right text-muted">07/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-down text-success"></i>
                                            <span class="tran-text">Advertising</span>
                                            <span class="pull-right text-success tran-price">+$230</span>
                                            <span class="pull-right text-muted">05/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-up text-danger"></i>
                                            <span class="tran-text">New plugins added</span>
                                            <span class="pull-right text-danger tran-price">-$452</span>
                                            <span class="pull-right text-muted">05/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-down text-success"></i>
                                            <span class="tran-text">Google Inc.</span>
                                            <span class="pull-right text-success tran-price">+$230</span>
                                            <span class="pull-right text-muted">04/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-up text-danger"></i>
                                            <span class="tran-text">Facebook Ad</span>
                                            <span class="pull-right text-danger tran-price">-$364</span>
                                            <span class="pull-right text-muted">03/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-down text-success"></i>
                                            <span class="tran-text">New sale</span>
                                            <span class="pull-right text-success tran-price">+$230</span>
                                            <span class="pull-right text-muted">03/09/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-down text-success"></i>
                                            <span class="tran-text">Advertising</span>
                                            <span class="pull-right text-success tran-price">+$230</span>
                                            <span class="pull-right text-muted">29/08/2017</span>
                                            <span class="clearfix"></span>
                                        </li>

                                        <li>
                                            <i class="dripicons-arrow-up text-danger"></i>
                                            <span class="tran-text">Support licence</span>
                                            <span class="pull-right text-danger tran-price">-$854</span>
                                            <span class="pull-right text-muted">27/08/2017</span>
                                            <span class="clearfix"></span>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                        </div>


                    </div> <!-- container -->

                </div> <!-- content -->



</div>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
