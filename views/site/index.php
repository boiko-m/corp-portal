<?php
    use app\models\Profile;
    use app\models\Session;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
    use \app\widgets\Questionnaire;

    $this->title = 'Главная';
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
    .news-container * {
        line-height: 1;
    }
    .news-container a {
        font-weight: normal;
        color: <?=Yii::$app->setting->getValue('navbar-background-color')?>;
        opacity: 0.9;
        transition: 0.3s;
    }
    .news-container a:hover {
        opacity: 0.7;
    }
    .news-container i {
        color: #bfbfbf;
    }
</style>

<?php if ($live): ?>
    <div class="row ">
        <div class="col-12 mb-4 w-100 ml-3" >
            <div class="row">
                <a  href="/broadcast/<?=$live->id?>" target="_blank" class="btn btn-outline-danger waves-light waves-effect w-md col-xs-12 col-md-3 ">Сейчас проходит трансляция! <br> <b>Подключайтесь!</b></a>
            </div>
        </div>
    </div>
<?php endif ?>

<div class="row">
    <div class="col-xs-12 col-md-8 m-b-30" style="margin-bottom: 30px;">
            <div class="card pb-2">
                <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs  nav-project tabs-bordered" style="padding-top: 3px">
                        <li class="nav-item">
                            <a href="#home-b1" data-toggle="tab" aria-expanded="false" class="nav-link <?= Yii::$app->setting->getValue('news-panel-setting') == 1 ? 'active' : null ?> <?= Yii::$app->setting->getValue('news-panel-setting') == null ? 'active' : null ?>">
                                Новости компании
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#home-b2" data-toggle="tab" aria-expanded="false" class="nav-link <?= Yii::$app->setting->getValue('news-panel-setting') == 2 ? 'active' : null ?>">
                                Новости проектов
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>

            <div class="row ">
                <div class="col-12">
                    <div class="tab-content pt-0">
                        <div id="home-b1" class="tab-pane <?= Yii::$app->setting->getValue('news-panel-setting') == 1 ? 'fade active show' : null ?> <?= Yii::$app->setting->getValue('news-panel-setting') == null ? 'fade active show' : null ?>">
                                
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <?php foreach ($news as $item): ?>
                                            <div class="row pl-2 pt-3 align-items-center news-container">
                                                <div class="d-none d-lg-block col-md-1 text-right pr-0">
                                                    <i class="fa <?= $item['newsCategory']['pintogram'] ?> fa-2x" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-md-10" >
                                                    <div>
                                                        <?php $visit = Yii::$app->visit->get([
                                                            'controller' => 'news',
                                                            'action' => 'view',
                                                            'id' => $item['id'],
                                                            'save' => false,
                                                            'one' => true
                                                        ]); ?>
                                                        <a href="/news/<?= $item['id'] ?>" style = "<?=($visit) ? 'opacity: 0.3' : '';?>">
                                                            <?=$item['title'] ?>
                                                        </a>
                                                    </div>
                                                    <div>
                                                         <small>Категория: <b><?=$item['newsCategory']['name']?></b> от <?= date("d.m.Y H:i:s", $item['date']) ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12 text-right">
                                        <div class="row align-items-center mx-2">
                                            <div class="col-8">
                                                <a href="/news/offer" class="news-offer">Предложить новость</a>
                                            </div>
                                            <a href="/news" class="btn waves-effect w-md btn-light col-12 col-lg-4">Открыть все новости компании</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div id="home-b2" class="tab-pane <?= Yii::$app->setting->getValue('news-panel-setting') == 2 ? 'fade active show' : null ?>">
                            <div style="margin-bottom: 15px;">
                                <?php foreach ($news_project as $item): ?>
                                    <div class="col-xs-12 news-a">
                                        <a href="/project-news/<?= $item['id'] ?>" style = "padding-left: 15px;">
                                            <?=$item['title'] ?> <br><small class="">от <?=date("d.m.Y h:i:s", $item['create_at']) ?></small>
                                        </a>
                                    </div>
                                <?php endforeach ?>
                                <div style="padding-left: 10px;">
                                    <div style="padding-top: 10px; display: inline-block;">
                                        <a href="/project-news" class="btn waves-effect w-md btn-light">Открыть все новости проектов</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>

    <div class="col-xs-12 col-md-4 m-b-30">
        <div class="card">
            <div class="card-header">Новое видео на портале</div>
            <div class="m-b-10" style="padding-top: 10px;">
                <a href="/video/id/<?= $video['id'] ?>">
                    <div class="d-flex justify-content-around">
                        <img class="col-3 ml-15" src="/img/icon/youtube.png" alt="" style="position: absolute;padding-top: 100px;">
                    </div>
                    <img src="/<?= $video['img'] ?>" alt="" width="100%">
                </a>
            </div>
            <div class="block m-t-10" style="padding: 10px;">
                <div class="btn-group mb-2" style="width: 100%;">
                    <a href="/video/?tab=forum" class="btn waves-effect w-md btn-light" style="width: 100%;">Форум</a>
                    <a href="/video/" class="btn waves-effect w-md btn-light" style="width: 100%;">Все видео</a>
                </div>
            </div>
        </div>
    </div>

</div>



<style>
    .tabs-vertical-env .nav.tabs-vertical li > a.active {
        background: <?=\Yii::$app->setting->getValue('navbar-background-color')?>
    }
</style>

<div class="row">
    <div class="col-xs-12 col-md-8 m-b-30">
        <div class="card">
            <div class="card-header">Сотрудники</div>

            <div class="card-body">
                    

                <div class="tabs-vertical-env">
                    <ul class="nav tabs-vertical m-b-30">
                        <li class="nav-item">
                            <a href="#v-birthday" class="nav-link active" data-toggle="tab" aria-expanded="true">Дни Рождения</a>
                        </li>
                        <li class="nav-item">
                            <a href="#v-new" class="nav-link " data-toggle="tab" aria-expanded="false">Новые</a>
                        </li>
                        <li class="nav-item">
                            <a href="#v-online" class="nav-link" data-toggle="tab" aria-expanded="false">Онлайн <span class="badge badge-primary" style="background: <?=\Yii::$app->setting->getValue('navbar-background-color')?>"><?= $online_count ?></span></a>
                        </li>
                    </ul>

                    <div class="tab-content d-block d-md-table-cell" style="width: 100%;">
                        <div class="tab-pane active" id="v-birthday">
                            <div class="row">
                                <?php foreach ($birthdays as $user): ?>
                                    <div class="col-12 col-lg-2">
                                        <div title = "<?php echo $user->first_name ?> <?php echo $user->last_name ?>">
                                            <a href="/profiles/<?php echo $user->id ?>">
                                                <img src="<?= $user->getImage(); ?>" alt="" style="border-radius: 5px;" class ="img-fluid">
                                            </a>
                                        </div>
                                        <div class="text-center pt-2">
                                             <a href="/profiles/<?php echo $user->id ?>" style = "font-size:14px"><?=$user->first_name?></a>
                                        </div>
                                        <div class="text-center " style="font-size:12px;" title = "<?=$user->branch ?>"><b><?=($user->position) ? $user->position : ""?></b>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <div class="row">
                                <div class="col-12 pt-3">
                                    <?= Html::a('Открыть ближайшие', Url::to(['/profiles/birthday']), ['class' => 'btn  waves-effect w-md btn-light', 'style' => ';'])?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="v-new">
                            <div class="row">
                                <?php foreach ($user_new as $user): ?>
                                    <div class="col-12 col-lg-2">
                                        <div title = "<?php echo $user->first_name ?> <?php echo $user->last_name ?>">
                                            <a href="/profiles/<?php echo $user->id ?>">
                                                <img src="<?= $user->getImage(); ?>" alt="" style="border-radius: 5px;" class ="img-fluid">
                                            </a>
                                        </div>
                                        <div class="text-center pt-2">
                                             <a href="/profiles/<?php echo $user->id ?>" style = "font-size:14px"><?=$user->first_name?></a>
                                        </div>
                                        <div class="text-center " style="font-size:12px;" title = "<?=$user->branch ?>"><b><?=($user->position) ? $user->position : ""?></b>
                                        </div>
                                        <div class="text-center" style="color:#868686;font-size:10px;">
                                            <?=date('d.m', strtotime($user->date_job))?>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="v-online">
                            <div class="row">
                                <?php foreach ($online as $user): ?>
                                    <div class="col-12 col-md-2">
                                        <div title = "<?=$user->first_name ?> <?= $user->last_name ?>">
                                            <a href="/profiles/<?=$user->id ?>">
                                                <img src="<?=$user->getImage(); ?>" alt="" style="border-radius: 5px;" class ="img-fluid">
                                            </a>
                                        </div>
                                        <div class="text-center pt-2">
                                             <a href="/profiles/<?php echo $user->id ?>"><?=$user->first_name?></a>
                                        </div>
                                        <div class="text-center " style="font-size:12px;color: #a2a2a2;">
                                            <?=date('H:i:s',$user->last_visit) ?>
                                        </div>
                                    </div>
                                <?php endforeach ?>

                            </div>
                            <div style="padding-top: 10px; display: inline-block;">
                                <?= Html::a('Список', Url::to(['/profiles', 'param' => 'online' ]), ['class' => 'btn  waves-effect w-md btn-light', 'style' => ''])?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<?php echo Questionnaire::widget([
    'title' => 'Опросы',
    'col_size' => 4,
    'width' => '290',
]) ?>

</div>
