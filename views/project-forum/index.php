<?php
  use yii\helpers\Html;
  use yii\helpers\Url;
  use yii\grid\GridView;
  use yii\widgets\Pjax;
  use app\widgets\LbrComments;
  use app\models\Profile;
  use app\models\User;
  use app\models\Projects;
  use app\models\ProjectNews;
  use app\models\Comment;
  use app\assets\CommentsAsset;

  CommentsAsset::register($this);

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

<?php
debug($last_msgs);
?>

<div class="projects-index">

  <div class="row">

    <div class="col-md-12 col-margin">
      <div class="card">
        <h5 class="text-center title-card">Проекты компании</h5>
        <ul class="topics_projects">

          <?php foreach ($projects as $project):
            $last_msg = Comment::find()->where(['model_key' => $ids[$project->id]])->orderBy('created_at ASC')->one();
            $user = Profile::findOne(['id' => $last_msg->created_by]); ?>

            <li><i class="fa fa-list-ul topic <?=$new_msgs[$project->id]['c_new'] ? 'new' : '' ?>"></i>
              <?= Html::a(
                  $project->name, [Url::toRoute(['project-forum/topic', 'id' => $project->id])]
              ) ?>
              <span class="forum_c-new-msgs">
                <i class="fa fa-comments"></i> <?=$new_msgs[$project->id]['c_all']?>
              </span>

              <? if ($new_msgs[$project->id]['c_new']) : ?>
              <span class="forum_c-new-msgs new-m">
              <b><?=$new_msgs[$project->id]['c_new']?></b> новых
              </span>
              <? endif; ?>

              <? if ($last_msg) : ?>
              <span class="forum_c-new-msgs no-border" style="float: right; line-height: 2;">
                <?=$user->first_name.' '.$user->last_name.' '.date('m.d в h:m', $last_msg->created_at)?>
              </span>
              <? endif; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

  </div>

</div>
