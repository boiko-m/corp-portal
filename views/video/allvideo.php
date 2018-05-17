<?php
/* @var $this yii\web\View */
$videos = $data;

?>

<div class="row">
	<div class="col-12">
		<div class="row">
			<?php foreach ($videos as $video): ?>
			<div class="col-xl-3 col-xs-12 videos_link" onclick="window.open('/video/id/<?=$video['id'] ?>')" style = "cursor: pointer; padding-bottom: 20px">
				<div>
					<img src="http://portal.lbr.ru/<?=$video['img'] ?>" alt="" style="width: 100%">
				</div>
				<div class="text-left" style="font-size: 10px">
					<?=date('d.m.Y',$video['date']) ?>
				</div>
				<div class="text-center" style="padding: 5px">
					<?=$video['name'] ?>
				</div>
			</div>
		<?php endforeach ?>
		</div>
		<?
		$queryID = \Yii::$app->request->get('id');
		if(isset($queryID) && intval($queryID) > 0):?>
			<a class="btn waves-effect w-md btn-light" href="javascript:void(0);" onclick ="ajax('/video/allvideo', '', 'allvideo')">
				Ко всем видео
			</a>
		<?endif;?>
	</div>
</div>
