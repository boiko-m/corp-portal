<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Скрипты';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php //  echo var_dump($scripts) ?>

<div class="row" >
	<div class="col-xs-12 col-xl-8 card-box container-fluid" id = "scripts">
		<?php foreach ($scripts as $script): ?>
			<a href="#src" onclick = "ajax('update', 'id=<?=$script['id']?>', 'scripts')"><?=$script['answer']?></a> <br>
		<?php endforeach ?>
	</div>
</div> 


