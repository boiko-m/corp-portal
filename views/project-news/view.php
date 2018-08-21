<?php
  use yii\helpers\Html;
  use yii\widgets\Pjax;
  use yii\widgets\Date;
  use \app\widgets\LbrComments;

  $this->title = 'Новости проектов';
  $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
?>

<div class="row">
  <div class="col-xs-12 <?= count($attachmentDocument) == 0 && count($attachmentVideo) == 0 ? 'col-md-12' : 'col-md-9' ?> m-b-30">
    <div class="card-box">
      <h5 class="card-title"><?= $news['title'] ?></h5>
      <div style="margin-bottom: 10px;">
        <a href="/project/info/<?= $news['id_project'] ?>" style="font-size: 15px; padding: 5px;" class="card-title"><?= $news['project']['name'] ?></a>
      </div>
      <p style="font-size: 12px; padding: 5px;"><?= $news['short_description'] ?></p>
      <p class="card-text"><?= htmlspecialchars_decode($news['content']) ?></p>

      <hr>
      <p class="card-text">
          <small class="text-muted">от <?php echo date("d.m.Y h:s:m", $news['create_at']) ?></small>
      </p>
    </div>
  </div>

  <div class="col-xs-12 col-md-3 m-b-30">
    <? if (count($attachmentVideo) != 0) : ?>
    <div class="card-box">
      <h5 class="card-title text-center">Видео</h5>
        <? foreach ($attachmentVideo as $key => $video) { ?>
          <a href="<?= $video->link ?>" target="_blank" style="margin: 0 10px 0 10px;">
            <i class="fa fa-video-camera" aria-hidden="true" title="<?= end(explode('/', $video->link)); ?>" style="font-size: 40px; margin: 15px 0 0"></i>
          </a>
        <? } ?>
    </div>
  <? endif; ?>

    <? if (count($attachmentDocument) != 0) : ?>
    <div class="card-box">
      <h5 class="card-title text-center">Файлы для просмотра</h5>
        <? foreach ($attachmentDocument as $key => $document) { ?>
          <a href="/view-attachment/view/<?= $document->id ?>" target="_blank" title="<?= $document->name ?>">
            <img src="/img/icon/office/<?= end(explode('.', $document->link)) ?>.png" style="width: 50px; margin: 15px 0 0">
          </a>
        <? } ?>
    </div>
    <? endif; ?>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <?php echo LbrComments::widget([
      'model' => 'project-news',
      'model_key' => $news['id'],
      'name_widget' => 'Комментарии:',
    ]) ?>
  </div>
</div>