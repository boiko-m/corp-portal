<?php
/* @var $this yii\web\View */
use app\models\Videos;

use app\components\VideoStream;
$this->title = "Тестирование";

/*$this->params['breadcrumbs'][] = ['label' => 'Обучающий материал', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $faqtype->name, 'url' => "/training/type/" . $faqtype->id];*/
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="row">
	<div class="col-12">
		<div class="card-box">
			<button onclick = "tajax('/stream/video', {
				container : 'update'
			})">
				Обработать
			</button>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card-box update">
			<iframe src="http://portal.test/stream/video/" frameborder="0"></iframe>
		</div>
	</div>
</div>
