<?php

/* @var $this yii\web\View */

use yii\helpers\Html;


$this->title = 'Скрипты';
$this->params['breadcrumbs'][] = $this->title;
?>



<?php //  echo var_dump($scripts) ?>

<div class="row hidden-xs" style="color: black!important;" >
	<div class="col-12 card-box" id = "scripts">
		<div class="row">
			<div class="col-xl-4">
				<?php foreach ($scripts as $script): ?>
					<button class = "btn btn-light waves-effect waves-light btn-block" href="#src" onclick = "ajax('update', 'id=<?=$script['id']?>', 'scripts')" style = "text-align: left;"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i> <?=$script['answer']?></button>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div> 


