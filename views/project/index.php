<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Проекты компании';
//$this->params['breadcrumbs'][] = $this->title;
?>


<style>
    .project {
        display: block;
        color:black;
        width: 100%;
        padding: 10px 5px !important;
        transition: 0.3s;
        border-bottom:1px solid #dfdfdf;
        border-radius: 5px;
        margin-top: 5px;
    }
    .project .card-title{
        font-size:18px;
    }
    .project:hover {
        background: #f3f3f3!important;
    }
    .project-item-menu {
        font-size: 13px;
        margin-right: 15px;
        font-weight: normal;
    }
    .project-item-menu a {
        display: inline-block;
        margin-right: 15px;
        color: #707070;
        transition: 0.3s;
    }
    .project-item-menu a:hover {
        color: black;
    }
    .search-project {
      color:#5d5d5d; 
      margin-bottom: 5px; 
      font-size: 15px;
    }
    .non-project {
      font-size: 17px; 
      text-align: center;
    }
    .description {
      display: block;
      height: 20px;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }
</style>
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

    </div>
  </div>
</div>