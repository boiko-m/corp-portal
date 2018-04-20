<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VideosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Обновление пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row">
	<div class="col-12">
		<?php if ($update): ?>
			<?php foreach ($update as $up) {
				if ($up['success']) {
					$user = explode(";", $up['success']);?>
					<div>
						<a href="/profiles/<?=$user['1']?>" target = "_blank"><?=$user['0']?></a> добавлен
					</div>
					<?php
				} else {?>
					<div style="color:red">
						<?=$up['error']?> ошибка
					</div>
				<?php } ?>
			<div>
				
			</div>
			<?php } ?>
		<?php endif ?>
		<?php if (!$update): ?>
			Все возможные пользователи подгружены!
		<?php endif ?>
	</div>
</div>