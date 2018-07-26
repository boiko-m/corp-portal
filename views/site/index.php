<?php

/* @var $this yii\web\View */

$this->title = 'Главная';
use app\models\Profile;
use app\models\Session;
use yii\helpers\Html;
use yii\helpers\Url;


use yii\widgets\ActiveForm;

?>
<style>
    .news-a > a {
        color:#444444;
        transition: 0.3s;
        display: block;
        padding: 5px;
    }
    .news-a a:hover {
        color: black;
        background: #f5f5f5;
    }
    .news-offer {
        text-decoration: underline;
        font-size: 11px;
        color: #747474;
    }
</style>

<!-- <div class="row">
    <div class="col-12">
        <div class="alert alert-danger" role="alert">
            <b>Уважаемый пользователь портала!</b> <br>
            Настоятельно просим актуализировать информацию в своем <a href="/profiles/update/<?php echo Yii::$app->user->identity->id;?>">личном профиле</a>, а так же <b>перезагрузить фотографию</b> в лучшем качестве.
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-xs-12 col-md-8 m-b-30">
        <div class="card">
            <ul class="nav nav-tabs nav-justified nav-project tabs-bordered" style="padding-top: 3px">
                <li class="nav-item">
                    <a href="#home-b1" data-toggle="tab" aria-expanded="false" class="nav-link <?= Yii::$app->setting->getValue('news-panel-setting') == 1 ? 'active' : null ?> <?= Yii::$app->setting->getValue('news-panel-setting') == null ? 'active' : null ?>">
                        Новости компании
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#home-b2" data-toggle="tab" aria-expanded="false" class="nav-link <?= Yii::$app->setting->getValue('news-panel-setting') == 2 ? 'active' : null ?>">
                        Новости проектов <i class="fa fa-exclamation fa-1x news-alert"></i>
                    </a>
                </li>
            </ul>
            <div class="tab-content" style="padding-top: 10px;">
                <div id="home-b1" class="tab-pane <?= Yii::$app->setting->getValue('news-panel-setting') == 1 ? 'fade active show' : null ?> <?= Yii::$app->setting->getValue('news-panel-setting') == null ? 'fade active show' : null ?>">
                    <div style="margin-bottom: 15px;">
                        <?php foreach ($news as $item): ?>
                            <div class="col-xs-12 news-a" >
                                <a href="/news/<?=$item['id']?>" style = "padding-left: 15px;">
                                    <?=$item['title'] ?> <br><small class="">от <?=date("d.m.Y h:i:s",$item['date']) ?></small>
                                </a>
                            </div>
                        <?php endforeach ?>
                        <div style="padding-left: 10px;">
                            <div style="padding-top: 10px; display: inline-block; ;">
                                <a href="/news" class="btn  waves-effect w-md btn-light">Открыть все новости компании</a>
                            </div>
                            <div style="padding-top: 10px; display: inline-block;">
                                <a href="/news/offer" class="news-offer">Предложить новость</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="home-b2" class="tab-pane <?= Yii::$app->setting->getValue('news-panel-setting') == 2 ? 'fade active show' : null ?>">
                    <div style="margin-bottom: 15px;">
                        <?php foreach ($news_project as $item): ?>
                            <div class="col-xs-12 news-a" >
                                <a href="/project-news/<?=$item['id']?>" style = "padding-left: 15px;">
                                    <?=$item['title'] ?> <br><small class="">от <?=date("d.m.Y h:i:s",$item['create_at']) ?></small>
                                </a>
                            </div>
                        <?php endforeach ?>
                        <div style="padding-left: 10px;">
                            <div style="padding-top: 10px; display: inline-block; ;">
                                <a href="/project-news" class="btn  waves-effect w-md btn-light">Открыть все новости проектов</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-4">
        <div class="card">
            <div class="card-header">Новое видео на портале</div>
            <div class="m-b-10" style="padding-top: 10px">
                <a href="/video/id/<?=$video['id']?>">
                    <div class="d-flex justify-content-around">
                        <img class="col-3 ml-15" src="/img/icon/youtube.png" alt="" style="position: absolute;padding-top: 100px">
                    </div>
                    <img src="/<?=$video['img']?>" alt="" style="width: 100%">
                </a>
            </div>
            <div class="block m-t-10" style="padding: 10px">
                <div class="btn-group mb-2" style="width: 100%">
                    <a href="/video/?tab=forum" class="btn waves-effect w-md btn-light" style="width: 100%">Форум</a>
                    <a href="/video/" class="btn waves-effect w-md btn-light" style="width: 100%">Все видео</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php if ($birthdays): ?>
        <div class="col-xs-12 col-md-4">
            <div class="card">
                <div class="card-header">Дни Рождения</div>
                <div>
                    <?php foreach ($birthdays as $user): ?>
                        <div class="row" style="padding:10px">
                            <div class="col-2">
                                <img src="<?=$user->getImage();?>" alt="" style = "width: 50px;border-radius: 5px;">
                            </div>
                            <div class="col-10" >
                                <a href="/profiles/<?php echo $user->id ?>"><?php echo $user->first_name ?> <?php echo $user->last_name ?></a> <br>
                                <div style="font-size: 11px">
                                    <?=$user->branch ?><?php echo ($user->position) ? ", ". $user->position : "" ;?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <div style="padding-top: 10px; display: inline-block;">
                        <?= Html::a('Открыть ближайшие', Url::to(['/profiles/birthday']), ['class' => 'btn  waves-effect w-md btn-light', 'style' => 'margin-left:10px;margin-bottom:10px;'])?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>

    <div class="col-xs-12 col-md-4 ">
        <div class="card">
            <div class="card-header">Новые сотрудники</div>
            <div>
                <?php foreach ($user_new as $user): ?>
                    <div class="row" style="padding:10px">
                        <div class="col-2">
                            <img src="<?=$user->getImage();?>" alt="" style = "width: 50px;border-radius: 5px;">
                        </div>
                        <div class="col-10" >
                            <a href="/profiles/<?php echo $user->id ?>"><?php echo $user->first_name ?> <?php echo $user->last_name ?></a> <br>
                            <div style="font-size: 11px">
                                <?=$user->branch ?><?php echo ($user->position) ? ", ". $user->position : "" ;?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <div style="padding-top: 10px; display: inline-block;">
                    <?= Html::a('Список', Url::to(['/profiles', 'param' => 'new' ]), ['class' => 'btn  waves-effect w-md btn-light', 'style' => 'margin-left:10px;margin-bottom:10px;'])?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-4">
        <div class="card">
            <div class="card-header">Пользователи онлайн: <?= $countOnline ?></div>
            <div>
                <?php $i = 0;
                foreach ($online as $user): $i++ ?>
                    <?php if($i == 5) { break; } ?>
                    <div class="row" style="padding:10px">
                        <div class="col-2">
                            <img src="<?= $user->getImage(); ?>" alt="" style="width: 50px; border-radius: 5px;">
                        </div>
                        <div class="col-10" >
                            <a href="/profiles/<?php echo $user->id ?>"><?php echo $user->first_name ?> <?php echo $user->last_name ?></a><br>
                            <div style="font-size: 11px">
                                <?= $user->branch ?><?php echo ($user->position) ? ", ". $user->position : "" ;?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <div style="padding-top: 10px; display: inline-block;">
                    <?= Html::a('Список', Url::to(['/profiles', 'param' => 'online' ]), ['class' => 'btn  waves-effect w-md btn-light', 'style' => 'margin-left:10px; margin-bottom:10px;'])?>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
