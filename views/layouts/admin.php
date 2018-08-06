<?php
    use app\widgets\Alert;
    use yii\helpers\Html;
    use yii\helpers\Url;
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

    <?php include 'css/setting.css.php'; ?>
</head>
<body class="<?= Yii::$app->setting->getValue('sidebar-user-toggle'); ?>">
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
                <?=$this->render('_profile_header.php')?>
            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-light waves-effect">
                        <i class="dripicons-menu"></i>
                    </button>
                </li>
            </ul>

        </nav>

            </div>
            <!-- end topbar -->

            <?=$this->render('_left_menu_adm.php')?>

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
                                        'homeLink' => ['label' => 'Админ-панель', 'url' => '/admin/']
                                    ]) ?>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div>
                            <? echo $content; ?>
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->

</div>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
