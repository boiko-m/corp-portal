<?php
/* @var $this yii\web\View */

$this->title = $faq->name;
$this->params['breadcrumbs'][] = ['label' => 'Обучающий материал', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $faqtype->name, 'url' => "/training/type/" . $faqtype->id];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	
</div>
<div class="row card-box">
	<div class="col-xl-12 m-b-30">
		<h4><?=$faq->name ?></h4>
	</div>
	<div class="col-xl-12">
		<?=$faq->content ?>
	</div>
</div>