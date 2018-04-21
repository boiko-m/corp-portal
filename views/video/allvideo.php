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
					<img src="http://portal.lbr.ru/img/videos/<?=$video['img'] ?>" alt="" style="width: 100%">
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
	</div>
</div>