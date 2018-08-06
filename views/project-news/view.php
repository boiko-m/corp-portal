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
    <div class="card-box">
        <h5 class="card-title text-center">Видео</h5>
        <? if (count($attachmentVideo) != 0) : ?>
          <? foreach ($attachmentVideo as $key => $video) { ?>
            <a href="<?= $video->link ?>" target="_blank" style="margin: 0 10px 0 10px;">
              <i class="fa fa-video-camera" aria-hidden="true" title="<?= end(explode('/', $video->link)); ?>" style="font-size: 40px; margin: 15px 0 0"></i>
            </a>
          <? } ?>
        <? else : ?>
          <div class="col-xs-12 col-md-12 m-b-30 text-center">
            <i class="fa fa-rocket" aria-hidden="true" style="font-size: 40px; margin: 15px 0 0"></i>
            <p style="margin: 10px 0 -20px 0;">Видео на данный момент отсутствуют</p>
          </div>
        <? endif; ?>
    </div>

    <div class="card-box">
        <h5 class="card-title text-center">Файлы для просмотра</h5>
        <? if (count($attachmentDocument) != 0) : ?>
          <? foreach ($attachmentDocument as $key => $document) { ?>
            <a href="#" onclick="OpenDocumentContent('<?= $document->link ?>')" style="margin: 0 10px 0 10px;">
              <i class="fa fa-file-archive-o" aria-hidden="true" title="<?= end(explode('/', $document->link)); ?>" style="font-size: 40px; margin: 15px 0 0"></i>
            </a>
          <? } ?>
        <? else : ?>
          <div class="col-xs-12 col-md-12 m-b-30 text-center">
            <i class="fa fa-rocket" aria-hidden="true" style="font-size: 40px; margin: 15px 0 0"></i>
            <p style="margin: 10px 0 -20px 0;">Файлы на данный момент отсутствуют</p>
          </div>
        <? endif; ?>
    </div>
  </div>
</div>

<script>
  function OpenDocumentContent(content) {
    let newWin = open('', '',"width=" + screen.availWidth + ",height=" + screen.availHeight);
    newWin.document.write("<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://portal.lbr.ru" + content + "' width=100% height=90% scrolling='auto' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe>");
  }
</script>