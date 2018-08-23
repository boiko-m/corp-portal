<?php
use app\models\Projects;
use app\models\ProjectNews;
use app\models\Comment;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $project->name;
$this->params['breadcrumbs'][] = $this->title; ?>

<div class="topics-view">
  <div class="card-box">
    <div class="col-md-12 col-margin">
      <?php foreach ($posts as $post):
        if ($post->model == 'project') : $meta = Projects::findOne($id)->name;
        elseif ($post->model == 'project-news') : $met = ProjectNews::findOne(['id' => $post->model_key, 'id_project' => $id]); $meta = $met->title;
        endif; ?>
        <div class="row each-hr">
          <div class="col-2 col-xl-1 col-lg-2 col-md-2 user_info_b px-0">
            <div class="row">
              <div class="col-12">
                <?=$post->user->getUsername()?>
              </div>
              <div class="col-12">
                <img src="<?=$post->user->getAvatar()?>">
              </div>
            </div>
          </div>
          <div class="col-10 col-xl-11 col-lg-10 col-md-10">
            <div class="row">
              <div class="col-3 small com_date"><?=date('d.m в h:m', strtotime($post->created_at))?></div>
              <div class="col-9 text-right small com_date"><?= $post->model == 'project' ? 'к проекту ' : 'к новости ', Html::a($meta, Url::to([str_replace("http://portal.lbr.ru", '', $post->url)]), ['class' => ''])?></div>
            </div>
            <div class="com_content"><?=$post->content?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
