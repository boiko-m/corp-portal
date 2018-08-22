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

      <div>
        <div class="search-project">Поиск по проектам:</div>
        <input class="form-control" id="search_project" type="search" name="search_project">
      </div>

      <div class="row text-center d-none d-lg-flex header-list-project">
        <div class="col-md-10 header-column-project"><h5>Проект</h5></div>
        <div class="col-md-2 header-column-status"><h5>Статус</h5></div>
      </div>

      <div class="project-table">
        <?php foreach ($projects as $key => $project) { ?>
          <div class="row project">
            <div class="col-md-10 project-name border-right-none">
              <span class="d-none d-lg-inline-block pr-0 icon-project">
                  <i class="fa fa-share-alt"></i>
              </span>
              <?php if ($project->active): ?>
                <a href="/project/info/<?= $project->id ?>" style="display: inline-block; height: 20px;">
                  <h5 class="card-title"><?= $project->name ?></h5>
                </a>
              <? else : ?>
                <span style="display: inline-block; height: 20px;">
                  <h5 class="card-title" style="color: gray;"><?= $project->name ?></h5>
                </span>
              <? endif; ?>
              <?php if (\Yii::$app->user->can("controlProject")) : ?>
                <a href="/admin/projects/update?id=<?= $project->id ?>" class="d-none d-lg-inline-block" style="color: #555555">
                  <i class="mdi mdi-settings"></i>
                </a>
              <? endif; ?>
              <div class="project-addition-none project-list-addition">
                <div>
                  <?php if (!empty($project->description) && $project->description_visible) : ?>
                    <small class="description"><?= $project->description ?></small>
                  <? endif; ?>
                </div>
              </div>
            </div>
            <div class="col-md-2 text-center project-status" style="color: <?= $colorsStatus[$project->status] ?>">
              <span><?= $project->status ?></span>
            </div>
          </div>
        <? } ?>
      </div>

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