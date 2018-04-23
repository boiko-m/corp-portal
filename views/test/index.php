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
		<button onclick = "tajax('info', {container: 'info'})">Подгрузка</button>
		<div id="info" >
			<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, doloribus.</div>
			<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, velit non illum dolor accusamus aliquid quam, praesentium! Quaerat omnis, dolore.</div>
			<div>Veritatis quis accusamus ratione quas, ipsa provident ullam consectetur labore voluptates recusandae ea. Soluta deleniti ab quisquam temporibus, laboriosam maxime.</div>
			<div>Laudantium repellat dolor ipsa facere velit enim, porro, harum officia eveniet consequuntur aspernatur. Nulla dolores repellat recusandae libero repellendus voluptatibus!</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
</script>