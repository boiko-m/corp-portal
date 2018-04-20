<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Обучающий материал';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	
</div>
<div class="row card-box">
	<div class="col-xl-4">
		<?php foreach ($faqs as $faq): ?>
			<form action="/training/type/<?=$faq['id']?>">
				<button class="btn btn-light waves-effect waves-light btn-block" href="#src" style="text-align: left;"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i> <?=$faq['name']?></button>
			</form>
		<?php endforeach ?>
	</div>
</div>