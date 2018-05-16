<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Videos */

$this->title = 'Добавить видео';
$this->params['breadcrumbs'][] = ['label' => 'Список видео', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
	.input-link {
		display: block;
		box-sizing: border-box;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		width: 100%;
		padding: 8px;
		border-radius: 6px;
		-webkit-border-radius:6px;
		-moz-border-radius:6px;
		border: 2px solid #fff;
	}

	.link {
		margin-top: 30px;
	}

	.title {
		text-align: center; 
	}

	.button-check-link {
		margin-top: 10px;
	}

	.form-check-button {
    text-align: center;
  }
</style>

<div class="videos-create">
  <h1 class="title"><?= Html::encode($this->title) ?></h1>

  <form method="POST" id="link" action="javascript:void(null);" class="link">
  	<label>Ссылка на видео</label>
    <input type="text" value ="" name="link_check" id="searchname" class="input-link">
    <div class="form-check-button">
   		<button type="submit" class="btn btn-outline-secondary button-check-link">Получить данные</button>
   	</div>
	</form>

	<div id="fields">
		<!-- <?= $this->render('_form', [
      'model' => $model,
  	]) ?> -->
	</div>
</div>

<script>
	$('#link').bind('submit', function (e) {
  	var link = $('#link').serialize();
    $.ajax({
      type: 'POST',
      url: 'create',
      data: link,
      success: function(data) {
      	$( "#link" ).hide();
      	$('#fields').html(data);
      },
      error: function(xhr, str){
        alert('Возникла ошибка: ' + xhr.responseCode);
      }
    });
  });
</script>