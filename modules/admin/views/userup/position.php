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
		<?php if ($positions) { ?>
			<?php foreach ($positions as $position): ?>
				<div>
					Добавлена новая должность: <b><?=$position?></b> <br>
				</div>
			<?php endforeach ?>
		<?php } else { ?>
			Все должность синхронизированы!
		<?php } ?>
	</div>
</div>