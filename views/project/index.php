<?php
  use yii\helpers\Html;
  use yii\bootstrap\ActiveForm;
  use yii\widgets\LinkPager;

  use app\assets\ProjectAsset;
  use app\assets\AppAsset;
  AppAsset::register($this);
  ProjectAsset::register($this);

  $this->title = 'Проекты компании';
?>

<div class="row">
  <div class="col-xs-12 col-md-12">
    <div class="card-box">

      <?php if(count($projects) != 0) : ?>
        <div>
          <div class="search-project">
            Поиск по проектам:
          </div>
          <input class="form-control" type="search" name="search_project">
        </div>
      <? else : ?>
        <div>
          <div class="non-project">
            На данный момент нет проектов
          </div>
        </div>
      <? endif; ?>

        <?php foreach ($projects as $key => $project) { ?>
            <div class="project">
              <span title="Я участвую!" class="icon-project" style="display: inline-block; color: #f7931d; font-size:20px !important">
                  <i class="fa fa-cube"></i>
              </span>
                <?php if (\Yii::$app->user->can("controlProject") && !$project->active): ?>
                  <a href="/project/info/<?= $project->id ?>" style="display: inline-block;">
                    <h5 class="card-title"><?= $project->name ?></h5>
                  </a>
                  <span style="font-size: 18px;">(В разработке)</span>
                <?  elseif (\Yii::$app->user->can("controlProject")) : ?>
                  <a href="/project/info/<?= $project->id ?>" style="display: inline-block;">
                    <h5 class="card-title"><?= $project->name ?></h5>
                  </a>
                <?  elseif ($project->active) : ?>
                  <a href="/project/info/<?= $project->id ?>" style="display: inline-block;">
                    <h5 class="card-title"><?= $project->name ?></h5>
                  </a>
                <? else : ?>
                  <span href="" style="display: inline-block;">
                    <h5 class="card-title"><?= $project->name ?> (В разработке)</h5>
                  </span>
                <? endif; ?>
                <?php if (\Yii::$app->user->can("controlProject")) : ?>
                  <a href="/admin/projects/update?id=<?= $project->id ?>" style="margin-left:10px; display: inline-block; color: #555555">
                    <i class="mdi mdi-settings"></i>
                  </a>
                <? endif; ?>
                <div style="padding-left: 20px">
                  <!-- <div class="project-item-menu"> 
                      <a href="/project/info/<?= $project->id ?>#information">Информация</a>
                      <a href="/project/info/1#work_group">Рабочая группа</a>
                      <a href="/project/info/1#news">Движение по проекту</a>
                  </div> -->
                  <div>
                    <small class="description"><?= $project->description ?></small>
                  </div>
                </div>
            </div>
        <? } ?>

        <div class="paddination-main">
          <?php echo LinkPager::widget([
              'pagination' => $pages,
              'options'=>['class' => 'pagination float-right'],

              'activePageCssClass' => 'p-active',
              'linkOptions' => ['class' => 'page-link'],
              'maxButtonCount' => 5,

              'disabledPageCssClass' => 'disabled',

              'prevPageCssClass' => 'prev-page',
              'nextPageCssClass' => 'next-page',
          ]); ?>
        </div>

    </div>
  </div>
</div>