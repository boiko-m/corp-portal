<?php

use yii\helpers\Html;
use yii\helpers\Url;
use ogheo\comments\helpers\CommentsHelper;
use app\models\Projects;
use app\models\ProjectNews;
use app\models\Comments;
use app\models\User;

/** @var $model */
/** @var $nestedLevel */
/** @var $maxNestedLevel */
/** @var $widget */

if ($model->model == 'project') : $meta = Projects::findOne($project_id)->name;
elseif ($model->model == 'project-news') : $met = ProjectNews::findOne(['id' => $model->model_key, 'id_project' => $project_id]); $meta = $met->title;
endif;
$p_comment = Comments::findOne($model->parent_id);
$p_user = User::findOne($p_comment->created_by);
if ($model->model == 'project-news' && !$meta)
  return true;
?>

<div class="media-container">
    <div class="media-left media-left-forum">
        <?= $model->getAuthorUrl() === null ? (
        $model->getAuthorAvatar() === null ?
            Html::tag(
                'span', '', ['class' => 'media-object without-image']
            ) : Html::img(
                $model->getAuthorAvatar(),
                [
                    'class' => 'media-object img-rounded',
                    'alt' => $model->getAuthorName()
                ]
            )
        ) : Html::a(
            $model->getAuthorAvatar() === null ?
                Html::tag(
                    'span', '', ['class' => 'media-object without-image']
                ) : Html::img(
                    $model->getAuthorAvatar(), [
                        'class' => 'media-object img-rounded',
                        'alt' => $model->getAuthorName()
                    ]
                ), [$model->getAuthorUrl()]
        ) ?>
    </div>
    <div class="media-body">
        <div class="media-info">
            <h6 class="media-heading">
                <span class="link-author">
                <?= $model->getAuthorUrl() === null ? $model->getAuthorName() : Html::a(
                    $model->getAuthorName(), [$model->getAuthorUrl()]
                ) ?>
                </span>
                <small class="com_date"><?= date('d.m.y в H:m', $model->created_at) ?></small>
                <span class="text-right small com_date">
                  <?php if ($model->model == 'project') echo ' | к проекту '; elseif ($model->model == 'project-news') echo ' | к новости '; ?>
                  <a href="<?=$model->url?>"><?=$meta?></a>
                </span>
            </h6>
            <?php if ($model->parent_id) : ?>
            <div class="comment-quote"><div class="p_username"><?=$p_user->getUsername()?>:</div><?= Html::encode($p_comment->content) ?></div>
            <?php endif; ?>
            <?= Html::encode($model->content); ?>

            <div class="row nospace">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="comment-info">
                        <?php if ($nestedLevel < $maxNestedLevel): ?>
                            <div class="comment-reply" data-action="reply">
                                <a href="#">Ответить</a>
                            </div>
                        <?php endif; ?>
                        <div class="comment-rating text-right">
                            <span class="score">
                                <?php $ratingCounter = $model->getRatingCounter() ?>
                                <span id="score" class="<?= $ratingCounter < 0 ? 'bad' : 'good' ?>">
                                    <?= $ratingCounter ?>
                                </span>
                            </span>
                            <span class="thumbs-up <?= CommentsHelper::isUprated($model->id) ? 'rated' : null ?>" data-action="uprate">
                                <a href="#">
                                    <i class="glyphicon glyphicon-thumbs-up"></i>
                                </a>
                            </span>
                            <span class="thumbs-down <?= CommentsHelper::isDownrated($model->id) ? 'rated' : null ?>" data-action="downrate">
                                <a href="#">
                                    <i class="glyphicon glyphicon-thumbs-down"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($nestedLevel < $maxNestedLevel): ?>
            <?php if ($model->hasChildren()) : ?>
                <?php $nestedLevel++; ?>
                <?php foreach ($model->getChildren() as $children) : ?>
                    <div class="media ml-0" data-key="<?php echo CommentsHelper::encodeId($children->id); ?>">
                        <?= $this->render('_post', [
                            'model' => $children,
                            'nestedLevel' => $nestedLevel,
                            'maxNestedLevel' => $maxNestedLevel,
                            'widget' => $widget
                        ]) ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</div>
