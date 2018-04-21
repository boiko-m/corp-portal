<?php
/* @var $this yii\web\View */
use app\models\Profile;
use app\models\VideoCategory;
use app\models\Videos;
?>

<div class="row">
	<div class="col-12">
		
            <?php foreach ($comments as $comment): ?>
            	<?php $profile = Profile::findOne($comment['created_by']); ?>
            	<?php $video = Videos::findOne($comment['model_key']); ?>
	            <div class="row active_forum">
	            	<div class="col-xl-1 col-xs-3 d-xl-block d-none">
	            		<img src="http://portal.lbr.ru/<?=$profile->getImage()?>" class="img-fluid rounded-circle d-xs-none" alt="" style = "cursor:pointer;width:100%;" onclick="window.open('/profiles/<?=$profile->id ?>')">
	            	</div>
	            	<div class="col-xl-10 col-xs-12 d-xl-block"  onclick="window.open('/video/id/<?=$comment['model_key'] ?>')" style ="cursor: pointer;">
	            		<div class="row" >
	            			<div class="col-12">
	            				<div class="notify-details"><?=$profile->first_name?> <?=$profile->last_name?> <small>от <?=date('d.m.Y H:i:s', $comment['created_at']) ?></small></div>
	            			</div>
	            			<div class="col-12" style="color: black;margin-left: 10px">
	            				<div class="user-msg font-13"> <i class="mdi mdi-youtube-play"></i><?=$video['name']?></div>
	            			</div>
	            			<div class="col-12" style="border-radius: 5px; background: #f0f0f0;margin: 5px;">
	            				<div class="user-msg"><?=$comment['content']?></div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            <?php endforeach ?>
            
        

	</div>
</div>
<style>	
	.active_forum {
		transition: 0.3s;
		padding: 10px!important;
	}
	.active_forum:hover {
		background:#f7f7f7;
		color: black;
	}
</style>