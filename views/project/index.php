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

      <div class="search_block">
        <input class="form-control" id="search_project" placeholder="Поиск по проектам" type="search" name="search_project">
      </div>

      <div class="project-table">
        <?php foreach ($projects as $key => $project) { ?>
          <div class="row project <?= $colorsStatus[$project->status] ?>">
            <div class="col-md-9 pr-0 pl-0 project-name border-right-none">
              <?php if ($project->active): ?>
                <a href="/project/info/<?= $project->id ?>">
              <? endif; ?>
              <div class="link">
                <span class="d-none d-lg-inline-block pr-0 icon-project">
                    <i class="fa fa-share-alt mr-2"></i>
                </span>
                <span>
                  <span><?= $project->name ?></span>
                </span>
                <div class="project-addition-none project-list-addition">
                  <div>
                    <?php if (!empty($project->description) && $project->description_visible) : ?>
                      <small class="description"><?= $project->description ?></small>
                    <? endif; ?>
                  </div>
                </div>
              </div>
              <?php if ($project->active): ?>
                </a>
              <? endif; ?>
            </div>
            <div class="col-md-1 text-right project-settings">
              <?php if (\Yii::$app->user->can("controlProject")) : ?>
                <a href="/admin/projects/update?id=<?= $project->id ?>" class="project_set-btn" style="color: #555555">
                  <i class="fa fa-gear"></i>
                </a>
              <? endif; ?>
            </div>
            <div class="col-md-2 text-center">
              <div class="project-status">
                <div class="<?= $colorsStatus[$project->status] ?>"><?= $project->status ?></div>
              </div>
            </div>
          </div>
        <? } ?>
      </div>

      <div class="paddination-main">
        <?php //echo LinkPager::widget([
          //'pagination' => $pages,
          //'options'=>['class' => 'pagination float-right'],

          //'activePageCssClass' => 'p-active',
          //'linkOptions' => ['class' => 'page-link'],
          //'maxButtonCount' => 5,

          //'disabledPageCssClass' => 'disabled',

          //'prevPageCssClass' => 'prev-page',
          //'nextPageCssClass' => 'next-page',
        //]); ?>
      </div>

    </div>
  </div>
</div>
