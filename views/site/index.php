<?php
    use app\models\Profile;
    use app\models\ProjectNews;
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
        font-weight: bold;
        opacity: 0.9;
        transition: 0.3s;
    }

    .news-container a:hover {
        opacity: 1.5;
    }

    .news-container small a {
        font-weight: normal;
        color: black;
        opacity: 0.9;
        transition: 0.3s;
    }

    .news-container small a:hover {
        text-decoration: underline;
        color: black;
    }

    .news-container i {
        color: #bfbfbf;
    }

    .btn-outline-danger {
        color: #e50f0f;
        border-color: #e50f0f;
    }

    .btn-outline-danger:hover {
        color: #fff;
        background: #e50f0f;
        opacity: 1;
    }

    .warning * {
        line-height: 1;
    }
</style>

<?php if ($live): ?>
    <div class="row warning">
        <div class="col-12 mb-4 w-100 ml-3" >
            <div class="row">
                <a  href="/broadcast/<?=$live->id?>" target="_blank" class="btn btn-outline-danger waves-light waves-effect w-md col-xs-12 col-md-6 ">
                    <div class="row align-items-center">
                        <div class="col-1">
                            <i class="mdi mdi-access-point icon-left-menu-broadcast icon-broadcast-flicker" style="font-weight: bold; font-size: 30px"></i>
                        </div>
                        <div class="col-9 text-left" style="word-wrap:break-word">
                            <b>Подключайтесь!</b> <br>
                            <small>Сейчас проходит трансляция!</small> <br>
                            <b>Тема:</b> <?=$live->name?>
                        </div>
                    </div>
                </a>
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
                    </ul>
                </div>
            </div>

            <div class="row ">
                <div class="col-12">
                    <div class="tab-content pt-0">
                        <div>
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <?php foreach ($news as $item): ?>
                                            <? if (empty($item->link_project_news) || (ProjectNews::findOne(end(explode('/', $item->link_project_news))))->visible) : ?>
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
                                                        <a href="/news/<?= $item["id"] ?>" class="news-title" style="<?= ($visit) ? 'opacity: 0.5' : null ?>">
                                                            <?= $item['title'] ?>
                                                        </a>
                                                    </div>
                                                    <div>
                                                         <small>Категория: <a href="news-category/<?= $item['newsCategory']['id'] ?>" target="_blank"><b><?= $item['newsCategory']['name'] ?></b></a> от <?= date("d.m.Y", $item['date']) ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <? endif; ?>
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

        <div class="card-box pt-0 pr-0 pl-0">

            <div class="tabs employees">
                <ul class="nav nav-tabs tabs-bordered nav-justified">
                    <li class="nav-item">
                        <a href="#v-birthday" class="nav-link active" data-toggle="tab" aria-expanded="true" style="font-weight:500;">Дни Рождения</a>
                    </li>
                    <li class="nav-item">
                        <a href="#v-new" class="nav-link " data-toggle="tab" aria-expanded="false" style="font-weight:500;">Новые</a>
                    </li>
                    <li class="nav-item">
                        <a href="#v-online" class="nav-link" data-toggle="tab" aria-expanded="false" style="font-weight:500;">Онлайн <span class="badge badge-primary" style="background: <?=\Yii::$app->setting->getValue('navbar-background-color')?>"><?= $online_count ?></span></a>
                    </li>
                </ul>

                <div class="tab-content" style="width: 100%;">

                    <div class="tab-pane active" id="v-birthday">
                      <? if (!count($birthdays)) : ?>
                      <div class='text-center' style='color:#999'>
                        <p>Сегодня никто не празднует день рождения</p>
                      </div>
                      <? else : foreach ($birthdays as $user): ?>
                        <div class="row px-4 each-hr">
                          <div class="col-sm-2 col-md-2 col-xl-1 align-self-center text-right">
                            <div title = "<?=$user->first_name.' '.$user->last_name ?>">
                              <a href="/profiles/<?php echo $user->id ?>">
                                <img src="<?=$user->getImage()?>" alt="" style="border-radius: 50%;" class ="img-fluid">
                              </a>
                            </div>
                          </div>
                          <div class="col-sm-10 col-md-10 col-xl-11">
                            <div class="align-self-center">
                               <a class="news-title" href="/profiles/<?php echo $user->id ?>"><?=$user->last_name.' '.$user->first_name?></a>
                            </div>
                            <div class="desc" title="<?=$user->branch ?>"><?=($user->position) ? $user->position.' - '.$user->department.'<br>' : ""?>
                              <span class="branch"><?=$user->branch?></span>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; endif; ?>
                      <div class="pl-3 pr-3">
                        <?= Html::a('Открыть ближайшие', Url::to(['/profiles/birthday']), ['class' => 'btn btn-block waves-effect w-md btn-light', 'style' => ';'])?>
                      </div>
                    </div>

                    <div class="tab-pane " id="v-new">
                      <?php foreach ($user_new as $user): ?>
                        <div class="row px-4 each-hr">
                          <div class="col-sm-2 col-md-2 col-xl-1 align-self-center text-right">
                            <div title = "<?php echo $user->first_name ?> <?php echo $user->last_name ?>">
                              <a href="/profiles/<?php echo $user->id ?>">
                                <img src="<?=$user->getImage()?>" alt="" style="border-radius: 50%;" class ="img-fluid">
                              </a>
                            </div>
                          </div>
                          <div class="col-sm-10 col-md-10 col-xl-11">
                            <div class="align-self-center">
                               <a class="news-title" href="/profiles/<?php echo $user->id ?>"><?=$user->last_name.' '.$user->first_name?></a>
                               <span class="date_job">
                                  · принят <?=date('d.m', strtotime($user->date_job))?>
                               </span>
                            </div>
                            <div class="desc" title="<?=$user->branch ?>"><?=($user->position) ? $user->position.' - '.$user->department.'<br>' : ""?>
                              <span class="branch"><?=$user->branch?></span>
                            </div>

                          </div>
                        </div>
                      <?php endforeach ?>
                      <div class="pl-3 pr-3">
                        <?= Html::a('Показать ещё', Url::to(['/profiles', 'param' => 'new' ]), ['class' => 'btn btn-block waves-effect w-md btn-light', 'style' => ''])?>
                      </div>
                    </div>

                    <div class="tab-pane" id="v-online">
                      <?php foreach ($online as $user):?>
                        <div class="row px-4 each-hr">
                          <div class="col-sm-2 col-md-2 col-xl-1 align-self-center text-right">
                            <div title = "<?=$user->first_name ?> <?= $user->last_name ?>">
                              <a href="/profiles/<?=$user->id ?>">
                                <img src="<?=$user->getImage()?>" alt="" style="border-radius: 50%;" class ="img-fluid">
                              </a>
                            </div>
                          </div>
                          <div class="col-sm-10 col-md-10 col-xl-11">
                            <div class="align-self-center">
                               <a class="news-title" href="/profiles/<?php echo $user->id ?>"><?=$user->last_name.' '.$user->first_name?></a>
                               <span class="date_job">
                                  · был <?=date('H:i',$user->last_visit) ?>
                               </span>
                            </div>
                            <div class="desc" title="<?=$user->branch ?>"><?=($user->position) ? $user->position.' - '.$user->department.'<br>' : ""?>
                              <span class="branch"><?=$user->branch?></span>
                            </div>
                          </div>
                        </div>
                      <?php endforeach ?>
                      <div class="pl-3 pr-3">
                        <?= Html::a('Список', Url::to(['/profiles', 'param' => 'online' ]), ['class' => 'btn btn-block waves-effect w-md btn-light', 'style' => ''])?>
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
