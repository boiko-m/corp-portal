<?php
  use yii\helpers\html;
  use yii\widgets\Pjax;
  use yii\widgets\Date;
  use hauntd\vote\widgets\Like;

  $this->title = 'Новости проектов';
  $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index']];
?>

<div class="row">
  <div class="col-xs-12 col-md-9 m-b-30">
    <div class="card-box">
      <h5 class="card-title"><?= $news['title'] ?></h5>
      <p style="font-size: 12px; padding: 5px;"><?= $news['short_description'] ?></p>
      <p class="card-text"><?= htmlspecialchars_decode($news['content']) ?></p>

      <hr>
      <p class="card-text">
          <small class="text-muted">от <?php echo date("d.m.Y h:s:m", $news['create_at']) ?></small>
      </p>
    </div>
  </div>

  <div class="col-xs-12 col-md-3 m-b-30">
    <div class="card-box">
        <h5 class="card-title text-center">Видео вложения</h5>
        <? if (count($attachmentVideo) != 0) : ?>
          <? foreach ($attachmentVideo as $key => $video) { ?>
            <a href="<?= $video->link ?>" target="_blank" style="margin: 0 10px 0 10px;">
              <i class="fa fa-video-camera" aria-hidden="true" title="<?= $video->link ?>" style="font-size: 40px; margin: 15px 0 0"></i>
            </a>
          <? } ?>
        <? else : ?>
          <div class="col-xs-12 col-md-12 m-b-30 text-center">
            <i class="fa fa-rocket" aria-hidden="true" style="font-size: 40px; margin: 15px 0 0"></i>
            <p style="margin: 10px 0 -20px 0;">Видео вложения уже в пути</p>
          </div>
        <? endif; ?>
    </div>

    <div class="card-box">
        <h5 class="card-title text-center">Вложение документов</h5>
        <? if (count($attachmentDocument) != 0) : ?>
          <? foreach ($attachmentDocument as $key => $document) { ?>
            <a href="<?= $document->link ?>" target="_blank" style="margin: 0 10px 0 10px;">
              <i class="fa fa-file-archive-o" aria-hidden="true" title="<?= $document->link ?>" style="font-size: 40px; margin: 15px 0 0"></i>
            </a>
          <? } ?>
        <? else : ?>
          <div class="col-xs-12 col-md-12 m-b-30 text-center">
            <i class="fa fa-rocket" aria-hidden="true" style="font-size: 40px; margin: 15px 0 0"></i>
            <p style="margin: 10px 0 -20px 0;">Вложения уже в пути</p>
          </div>
        <? endif; ?>
    </div>
  </div>
</div>