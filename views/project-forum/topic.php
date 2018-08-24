<?php
use app\models\Projects;
use app\models\ProjectNews;
use app\models\Comment;
use yii\helpers\Html;
use yii\helpers\Url;
use \app\widgets\LbrForum;

$this->title = $project->name;
$this->params['breadcrumbs'][] = $this->title; ?>

<div class="topics-view">
  <div class="card-box">
    <div class="col-md-12 col-margin madia-forum">
      <?php echo LbrForum::widget([
        'model' => ['project-news', 'project-forum', 'project'],
        'model_key' => $module_keys,
        'project_id' => $id
      ]) ?>
    </div>
  </div>
</div>
