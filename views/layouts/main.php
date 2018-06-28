<?php
/* @var $this \yii\web\View */
/* @var $content string */
use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\AppAssetBottom;
use yii\widgets\ActiveForm;
use cinghie\fontawesome\FontAwesomeAsset;
use yii\bootstrap\Modal;
//FontAwesomeAsset::register($this);
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

    <?php include 'css/setting.css.php'; ?>
</head>
<body class="<?= Yii::$app->setting->getValue('sidebar-user-toggle'); ?>">
<?php $this->beginBody() ?>

<div id = "wrapper">
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left preview-nb-bg-color">
            <a href="/" class="logo">
                        <span>
                            <img src="/images/logo.png" alt="" height="35">
                        </span>
                <i>
                    <img src="/images/logo_sm.png" alt="" height="35">
                </i>
            </a>
        </div>

        <nav class="navbar-custom">

            <ul class="list-unstyled topbar-right-menu float-right mb-0">
                <li>
                    <a class="nav-link  arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="true">

                        <span style="padding: 10px;color:white;">Нужна помощь?</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div style="padding: 10px">
                            <h6 class="m-0 text-center">Удаленная поддержка</h6>

                        </div>

                        <div style="padding:  0px 10px;">
                            <small>
                                <b>Возникли затруднения?</b> <br>
                                <div>
                                    Сотрудники IT-отдела готовы  предложить Вам помощь по установке и  настройке ПО и другим вопросам, которые мешают Вам в работе. <br>

                                </div>
                                <b>Просто скачайте и запустите:</b>
                            </small>
                        </div>

                        <div class="text-center">
                            <a href="https://get.teamviewer.com/jbvpufc" target="_blank">
                                <img src="/img/icon/help.jpg" alt="" style="width:60%">
                            </a>
                        </div>



                    </div>
                </li>

                <?php echo \app\widgets\LbrNotifications::widget() ?>




                <?/*
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
*/?>
                <?=$this->render('_profile_header.php')?>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-light waves-effect">
                        <i class="dripicons-menu"></i>
                    </button>
                </li>
                <li class=" app-search">


                    <div class="hidden-xs for-desktop search">
                        <?php  $model = new \app\models\ProfileMain;
                        $form = ActiveForm::begin([
                            'method'=> 'post',
                            'id' => 'MainForm',
                            'action' => ['/search/index'],
                            'class' => 'hidden-xs',
                            'enableAjaxValidation' => true,
                        ]);
                        ?>

                        <!-- <input type="text" placeholder="Поиск..." class="form-control">-->
                        <?= $form->field($model, 'text')->textInput( [
                            'placeholder' => 'Поиск...',
                            'class' => 'form-control hidden-xs',
                            'id' => 'text-search',
                            'autocomplete'=>'off'
                        ])->label(false); ?>

                        <?/*= Html::input('text','MainForm','', ['class' => 'form-control hidden-xs',
                            'placeholder' => 'Поиск..', 'novalidate' => 'novalidate',
                        ])*/ ?>


                        <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'main-search',
                            'form' => 'MainForm', 'id' => 'submitSearch',]) ?>
                        <?= Html::button('<div class="box_x_button close-search" aria-label="Закрыть" tabindex="0" role="button"></div>', ['class' => 'main-search',
                            'form' => 'MainForm', 'id' => 'hidden-search-close', 'label' =>'input']) ?>
                        <?php $form = ActiveForm::end(); ?>
                     </div>
                  </li>
            </ul>

        </nav>


        <div id="for-search" class="hidden-xs container1">

        </div>






    </div>
    <!-- end topbar -->
    <?=$this->render('_left_menu.php')?>


    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">

                            <h4 class="page-title float-left"><? echo $this->title; ?></h4>

                            <?= Breadcrumbs::widget([
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                'tag' => 'ol',
                                'options' => ['class' => 'breadcrumb float-right'],
                                'itemTemplate' => "<li class=\"breadcrumb-item\">{link}</li>\n",
                                'activeItemTemplate' => "<li class=\"breadcrumb-item active\">{link}</li>\n",
                                'homeLink' => ['label' => 'Главная', 'url' => '/']
                            ]) ?>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <?php //echo \webzop\notifications\widgets\Notifications::widget() ?>
                <div>
                    <? echo $content; ?>
                </div>

            </div> <!-- container -->

        </div> <!-- content -->



    </div>


    <?php
    yii\bootstrap\Modal::begin([
        'headerOptions' =>   ['id' => 'modalHeader'],
        'id' => 'main-modal',
        'class' => 'modal-dialog',
        'header' => '',
        'clientOptions' =>   false
    ]);

    echo "<div id='modalContent'></div>";
    yii\bootstrap\Modal::end();
    ?>
    <script src="//apps.skaip.su/buttons/widget/core.min.js" defer="defer"></script>
    <?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
