<?php
/* @var $this yii\web\View */
use app\models\Videos;


$this->title = "Тестирование";

/*$this->params['breadcrumbs'][] = ['label' => 'Обучающий материал', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $faqtype->name, 'url' => "/training/type/" . $faqtype->id];*/
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
	<div class="col card-box">
		<button onclick = "tajax('info', {container: 'info2'})">Подгрузка</button>
		<div id="info" >
			<pre class="info2"></pre>
		</div>
	</div>
</div>
<script type="text/javascript">
	
</script>