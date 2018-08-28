<?php
  use yii\helpers\Html;
  use yii\bootstrap\ActiveForm;
  use app\models\ProjectUserGroup;

  use app\assets\ProjectAsset;
  use app\assets\AppAsset;
  AppAsset::register($this);
  ProjectAsset::register($this);

  $this->title = $project->name;
  $this->params['breadcrumbs'][] = "Проекты компании";
  $this->params['breadcrumbs'][] = $this->title;

  $userGroup = '';
?>

<div class="row">
  <div class="col-xs-9 col-md-9">
    <div class="card">
      <ul class="nav nav-tabs nav-justified nav-project" style="margin: 10px;">
        <li class="nav-item">
            <a href="#spr1" class="nav-link active" title="Дата проведения: 01.01.2018 - 21.02.2018" data-toggle="tab" aria-expanded="false" onclick="tajax('/project/all', {
              container : 'projectall',
              data: 'id=1'
            })">1 этап
            <? if (Yii::$app->user->can('Scrum-master')) : ?>
              <i class="fa fa-minus delete-element" aria-hidden="true" title="Удалить этап" onclick="alert('Удалить этап');" style="float: right"></i>
            <? endif; ?>
          </a>
        </li>
        <li class="nav-item col-xs-3 col-md-3">
          <a href="#target1" class="nav-link" data-toggle="tab" aria-expanded="false" onclick="tajax('/project/infoajax', {
            container : 'projectall',
            data: 'id=1'
          })">Проект</a>
        </li>
        <? if (Yii::$app->user->can('Scrum-master')) : ?>
          <li class="nav-item col-xs-3 col-md-3">
            <a href="#" class="nav-link" title="Добавить этап" onclick="alert('Добавить этап');"><i class="fa fa-plus" aria-hidden="true"></i></a>
          </li>
        <? endif; ?>
      </ul>

      <div>
          <div id="projectall"></div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-md-3 right-menu-project">
    <div class="card">
      <ul class="nav nav-tabs tabs-bordered nav-justified nav-project ">
        <!-- <li class="nav-item col-xs-12">
          <a href="#right1" class="nav-link " data-toggle="tab" aria-expanded="false"><i class=" dripicons-view-list"></i></a>
        </li> -->
        <li class="nav-item col-xs-12">
          <a href="#right2" class="nav-link active" data-toggle="tab" aria-expanded="false"><i class="dripicons-user-group"></i></a>
        </li>
        <!-- <li class="nav-item col-xs-12">
          <a href="#right3" class="nav-link " data-toggle="tab" aria-expanded="false"><i class="dripicons-toggles"></i></a>
        </li> -->
      </ul>

      <div class="tab-content" style="padding: 0px 10px; padding-bottom: 10px">
        <!-- <div id="right1" class="tab-pane show">

          <div class="dropdown mt-3">
            <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Бэклог
            </button>
            <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
              <a class="dropdown-item" href="#">Добавить</a>
              <a class="dropdown-item" href="#">Добавить со временем</a>
            </div>

            <button type="button" class="btn btn-light waves-effect w-md">Старт</button>
          </div>
          <div class="backlog">
            <div class="backlog-block">
              <div class="backlog-block-title">
                запись от 20.10 15:25
              </div>
              <div class="backlog-block-content">
                Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности позволяет оценить значение системы обучения кадров, соответствует насущным потребностям. Идейные соображения высшего порядка?
              </div>
              <div class="backlog-block-content" style="text-align: right;">
                <div class="dropdown mt-3">
                  <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding-top: 3px;padding-bottom: 3px;">
                    Отправить в работу
                  </button>

                  <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                      <a class="dropdown-item" href="#">Прикрепить к задаче</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="backlog-block">
              <div class="backlog-block-title">
                запись от 20.10 15:25
              </div>
              <div class="backlog-block-content">
                Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности позволяет оценить значение системы?
              </div>
              <div class="backlog-block-content" style="text-align: right;">
                <div class="dropdown mt-3">
                  <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding-top: 3px;padding-bottom: 3px;">
                    Отправить в работу
                  </button>

                  <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item" href="#">Прикрепить к задаче</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="backlog-block">
              <div class="backlog-block-title">
                запись от 20.10 15:25
              </div>
              <div class="backlog-block-content">
                Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности позволяет оценить значение системы?
              </div>
              <div class="backlog-block-content" style="text-align: right;">
                <div class="dropdown mt-3">
                  <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="padding-top: 3px;padding-bottom: 3px;">
                    Отправить в работу
                  </button>

                  <div class="dropdown-menu dropdown-menu-animated" aria-labelledby="" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                    <a class="dropdown-item" href="#">Прикрепить к задаче</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->

        <div id="right2" class="tab-pane show active">
          <? foreach ($project_group as $key => $group) { ?>
            <div class="work-group-view">
              <?php if ($userGroup != $group->id_project_user_group): ?>
                <div class="work-group-view-title">
                  <?= (ProjectUserGroup::find()->where(['id' => $group->id_project_user_group])->one())->name ?>
                </div>
              <? endif; ?>
              <div class="work-group-view-content">
                <div class="btn-group m-b-10">
                  <button type="button" class="btn btn-light" onclick="window.open('/profiles/<?= $group['profile']['id'] ?>', '');"><?= $group['profile']['first_name'] . ' ' . $group['profile']['last_name'] ?></button>
                  <? if (Yii::$app->user->can('Scrum-master')): ?>
                    <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu text-center" x-placement="bottom-start" style="position: absolute; transform: translate3d(95px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                      <a class="dropdown-item" href="#">Добавить задачу</a>
                      <div class="dropdown-divider"></div>
                      <small>Принят: <?= date('d.m.Y', $group->create_at) ?></small>
                    </div>
                  <? endif; ?>
                </div>
              </div>
            </div>
            <?php if ($userGroup != $group->id_project_user_group) : ?>
              <?php $userGroup = $group->id_project_user_group ?>
            <? endif; ?>
          <? } ?>
        </div>

        <!-- <div id="right3" class="tab-pane show ">
          <div style="font-size: 12px; padding-top: 10px; font-weight: bold">
            Управление
          </div>

          <a href="javascript:void(0);" class="dropdown-item">
            группой
          </a>

          <a href="javascript:void(0);" class="dropdown-item">
            <div>
              проектом
            </div>
          </a>

          <a href="javascript:void(0);" class="dropdown-item">
            <div>
              новостями
            </div>
          </a>
                            
          <div style="font-size: 12px;padding-top: 10px; font-weight: bold">
            Отчет
          </div>

          <a href="javascript:void(0);" class="dropdown-item">
            <div>
              по проекту
            </div>
          </a>

          <a href="javascript:void(0);" class="dropdown-item">
            <div>
              по этапу
            </div>
          </a>

          <a href="javascript:void(0);" class="dropdown-item">
            <div>
              по спринту
            </div>
          </a>

        </div>  -->          
      </div>

    </div>

    <div class="project-news" style="padding: 10px 0px;">
      Новости проекта
    </div>
    <div class="card">
      <?php foreach ($project_news as $news) { ?>
        <div class="project-news-title">
          <small><?= date('d.m.Y', $news->create_at) ?></small> <a href=""><?= $news->title ?></a> 
        </div>
      <? } ?>
      <? if (count($project_news) == 0) : ?>
        <p class="text-center" style="margin-top: 15px;">На данный момент нет новостей</p>
      <? endif; ?>
    </div>

  </div>
</div>


<script>
  $(document).ready(function() {
    tajax('/project/all', {
      container : 'projectall',
      data: 'id=3'
    })
  });
</script>
