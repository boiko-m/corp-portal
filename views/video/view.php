<?php
	/* @var $this yii\web\View */

	use ogheo\comments\widget\Comments;

	$this->title = $data['name'];

	$this->params['breadcrumbs'][] = ['label' => 'Видео материал', 'url' => ['index']];
	/*$this->params['breadcrumbs'][] = ['label' => $faqtype->name, 'url' => "/training/type/" . $faqtype->id];*/
	$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
	<div class="col-12 card-box ">
		<iframe  width = "500" height = "500" src="<?=$data['link']?>" frameborder="0" class="col-12"></iframe>
	</div>

</div>
<div class="row">
	<div class="col-12">
		<?php echo \app\widgets\LbrComments::widget([
			'model' => 'video',
		    'model_key' => $data['id']
		]) ?>
		
	</div>
</div>