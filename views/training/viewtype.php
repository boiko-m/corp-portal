<?php
/* @var $this yii\web\View */

$this->title = $faqtype->name;

$this->params['breadcrumbs'][] = ['label' => 'Обучающий материал', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	
</div>

<div class="row card-box">
	<div class="col-12">
		<?=$faqtype->description?>
	</div>
	<div class="col-xl-4">
		<?php foreach ($faqs as $faq): ?>
			<form action="/training/<?=$faq['id']?>">
				<button class="btn btn-light waves-effect waves-light btn-block" href="#src" style="text-align: left;margin-top: 10px;white-space: normal;"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i> <?=$faq['name']?></button>
			</form>
		<?php endforeach ?>
	</div>
</div>