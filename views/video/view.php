<?php
/* @var $this yii\web\View */

use ogheo\comments\widget\Comments;

$this->title = $data['name'];

$this->params['breadcrumbs'][] = ['label' => 'Видео материал', 'url' => ['index']];
/*$this->params['breadcrumbs'][] = ['label' => $faqtype->name, 'url' => "/training/type/" . $faqtype->id];*/
$this->params['breadcrumbs'][] = $this->title;


?>
<?php echo var_dump($data) ?>
<div class="row">
	<div class="col-12">
		<?php echo Comments::widget([
		    'model' => 'video',
		    'model_key' => $data['id']
		]); ?>
	</div>
</div>