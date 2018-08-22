<?php
  use yii\helpers\Html;
  use yii\grid\GridView;
  use yii\widgets\Pjax;
  use app\widgets\LbrComments;
  use app\models\Profile;
  use app\models\Projects;
  use app\models\ProjectNews;

  $this->title = 'Форум проектов';
  $this->params['breadcrumbs'][] = $this->title;
?>

<style>
  .col-margin {
    margin-top: 10px;
  }

  .card {
    padding: 0 15px 0 15px
  }

  .title-card {
    padding-top: 25px;
  }

  .active_forum {
    transition: 0.3s;
    padding: 15px 10px 5px 10px;
  }

  .notify-details {
    font-weight: 600;
  }

  .user-msg {
    margin: 0;
    padding: 5px;
  }

  .fa-share-alt:before {
    margin-right: 5px;
  }

  .cursor-pointer {
    cursor: pointer;
  }

  .each-hr:last-child .active_forum {
    padding-bottom: 20px;
  }

  .each-hr:last-child hr {
    display:none;
  }
</style>

<div class="projects-index">

  <div class="row">

    <div class="col-md-12 col-margin">
      <div class="card">
        <h5 class="text-center title-card">Проекты компании</h5>
        <ul class="topics_projects">
          <?php foreach ($projects as $project): ?>
            <li><i class="fa fa-list-ul"></i> <a href="/project-forum/topic/<?=$project->id?>"><?=$project->name?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <div class="col-md-6 col-margin">
      <div class="card">
        <h5 class="text-center title-card"><b>Последнии 10 комментариев проектов</b></h5>
        <? if (count($commentProjects) < 1) : ?>
          <div class="text-center">
            <i class="fa fa-frown-o fa-3x"></i>
            <p>На данный момент не комментарий</p>
          </div>
        <? endif; ?>
        <?php foreach ($commentProjects as $project): ?>
          <?php $profile = Profile::findOne($project['created_by']); ?>
          <?php $projectOnly = Projects::findOne($project['model_key']); ?>
          <div class="each-hr">
            <div class="row active_forum">
              <div class="col-xl-1 col-xs-3 d-xl-block d-none">
                <img src="http://portal.lbr.ru/<?= $profile->getImage() ?>" class="img-fluid rounded-circle d-xs-none cursor-pointer" alt="" onclick="window.open('/profiles/<?= $profile->id ?>')">
              </div>
              <div class="col-xl-10 col-xs-12 d-xl-block cursor-pointer" onclick="window.open('/project/info/<?= $project['model_key'] ?>')">
                <div class="row" >
                  <div class="col-12">
                    <div class="notify-details"><?= $profile->first_name ?> <?= $profile->last_name ?> <small>от <?= date('d.m.Y H:i:s', $project['created_at']) ?></small></div>
                  </div>
                  <div class="col-12" style="color: black; margin-left: 10px">
                    <div class="user-msg font-13"><i class="fa fa-share-alt"></i><?= $projectOnly['name'] ?></div>
                  </div>
                  <div class="col-12" style="border-radius: 5px; background: #f0f0f0;">
                    <div class="user-msg"><?= $project['content'] ?></div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          </div>
        <?php endforeach ?>
      </div>
    </div>

    <div class="col-md-6 col-margin">
      <div class="card">
        <h5 class="text-center title-card"><b>Последние 10 комментарий новостей</b></h5>
        <? if (count($commentNews) < 1) : ?>
          <div class="text-center">
            <i class="fa fa-frown-o fa-3x"></i>
            <p>На данный момент не комментарий</p>
          </div>
        <? endif; ?>
        <?php foreach ($commentNews as $news): ?>
          <?php $profile = Profile::findOne($news['created_by']); ?>
          <?php $projectNews = ProjectNews::findOne($news['model_key']); ?>
          <div class="each-hr">
            <div class="row active_forum">
              <div class="col-xl-1 col-xs-3 d-xl-block d-none">
                <img src="http://portal.lbr.ru/<?= $profile->getImage() ?>" class="img-fluid rounded-circle d-xs-none cursor-pointer" alt="" onclick="window.open('/profiles/<?=$profile->id ?>')">
              </div>
              <div class="col-xl-10 col-xs-12 d-xl-block cursor-pointer" onclick="window.open('/project-news/<?= $news['model_key'] ?>')">
                <div class="row" >
                  <div class="col-12">
                    <div class="notify-details"><?= $profile->first_name ?> <?= $profile->last_name ?> <small>от <?= date('d.m.Y H:i:s', $news['created_at']) ?></small></div>
                  </div>
                  <div class="col-12" style="color: black; margin-left: 10px">
                    <div class="user-msg font-13"><i class="fa fa-share-alt"></i><?= $projectNews['title'] ?></div>
                  </div>
                  <div class="col-12" style="border-radius: 5px; background: #f0f0f0;">
                    <div class="user-msg"><?= $news['content'] ?></div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          </div>
        <?php endforeach ?>
      </div>
    </div>

  </div>

</div>
