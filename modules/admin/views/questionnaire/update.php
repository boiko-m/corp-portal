<?php
	use yii\helpers\Html;
	use app\models\Filials;

	$this->title = 'Редактирование опроса';
	$this->params['breadcrumbs'][] = ['label' => 'Опросы', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Редактирование';
?>

<style>
    .answer-zone-title {
      margin-top: 30px;
      margin-left: -10px;
    }

    .video-n-file-project-news-place {
      border: 1px solid #918e8e;
      border-radius: 3px;
    }

    .video-input-link {
      display: block;
      box-sizing: border-box;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      width: 100%;
      border-radius: 4px;
      -webkit-border-radius: 4px;
      -moz-border-radius: 4px;
      border: 2px solid #fff;
    }

    .center-button {
      text-align: center;
    }

    .project-news-buttons {
      margin-top: 10px;
    }

    .answer-zone-list {
    	text-indent: 10px;
    	margin-top: 10px;
    }

    .answer-zone-item {
    	border: 1px solid black;
    	padding: 5px;
    	display: inline-block;
    }

    .answer-zone-item:hover {
    	background-color: #dddddd;
    }

    .filial-zone-item {
    	border: 1px solid black;
    	padding: 5px;
    }

    .answer-zone-icon {
    	float: right;
    	margin-top: 4px;
    	cursor: pointer;
    }

    .filial-zone-icon {
    	float: right;
    	margin-top: 4px;
    	cursor: pointer;
    }
</style>

<div class="questionnaire-update">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <h3 class="answer-zone-title">Область ответов</h3>
    <div class="row video-n-file-project-news-place">
      <div class="col-md-12 answer-zone-list" id="fields_answer">
        <? foreach ($answers as $answer) { ?>
          <p class="answer-zone-item"><?= $answer->name ?> <i class="fa fa-times answer-zone-icon" id="<?= $answer->id ?>"></i></p>
        <? } ?>
      </div>
      <div class="col-md-12" style="padding: 10px;">
        <form method="POST" id="form_variant_answer" action="javascript:void(null);">
        	<label for="add_answer_variant">Вариант ответа</label>
        	<input type="text" name="add_answer_variant" id="add_answer_variant" class="video-input-link">
        	<div class="center-button">
          	<button class="btn waves-effect w-md btn-light center-button project-news-buttons">Добавить вариант ответа</button>
        	</div>
        </form>
      </div>
    </div>

    <!-- <h3 class="answer-zone-title">Область филиалов</h3>
    <div class="row video-n-file-project-news-place">
      <div class="col-md-12 answer-zone-list" id="fields_filial">
        <? foreach ($question_filials as $qustion_filial) { ?>
          <p class="answer-zone-item"><?= (Filials::findOne($qustion_filial->id_filials))->name ?> <i class="fa fa-times filial-zone-icon" id="<?= $qustion_filial->id ?>"></i></p>
        <? } ?>
      </div>
      <div class="col-md-12" style="padding: 10px;">
        <form method="POST" id="form_filial" action="javascript:void(null);">
        	<label for="add_filial">Филиал</label>
        	<br>
        	<select class="filial-zone-item" name="add_filial" id="add_filial" style="width: 100%;">
        		<? foreach ($filials as $filial) { ?>
	            <option id="<?= $filial->id ?>"><?= $filial->name ?></option>
	          <? } ?>
        	</select>
        	<div class="center-button">
          	<button class="btn waves-effect w-md btn-light center-button project-news-buttons">Добавить филиал</button>
        	</div>
        </form>
      </div>
    </div> -->

</div>

<script>
  $('#form_variant_answer').bind('submit', function (e) {
    var answer = $('#form_variant_answer').serialize();
    $.ajax({
      type: 'POST',
      url: 'update?id=<?= $model->id ?>',
      data: answer,
      success: function(data) {
      	let result = $.parseJSON(data);
        $('#fields_answer').append('<p class="answer-zone-item" style="margin-left: 5px;">' + result.name + ' <i class="fa fa-times answer-zone-icon" id="' + result.id + '"></i></p>');
        $('#add_answer_variant').val('');
      },
      error: function(xhr, str){
        alert('Возникла ошибка: ' + xhr.responseCode);
      }
    });
  });

	$('body').delegate('.answer-zone-icon','click',function() {
  	element = $(this);
    $.ajax({
      type: 'GET',
      url: 'update?id=<?= $model->id ?>&delete_answer=' + element.attr('id'),
      success: function(data) {
        element.closest('p').remove();
      },
      error: function(xhr, str){
        alert('Возникла ошибка: ' + xhr.responseCode);
      }
    });
  });

  //-------------- FILIAL ------------------

 //  $('#form_filial').bind('submit', function (e) {
 //    var answer = $('#form_filial').serialize();
 //    $.ajax({
 //      type: 'POST',
 //      url: 'update?id=<?= $model->id ?>',
 //      data: answer,
 //      success: function(data) {
 //      	let result = $.parseJSON(data);
 //        $('#fields_filial').append('<p class="answer-zone-item" style="margin-left: 5px;">' + result.id_filials + ' <i class="fa fa-times answer-zone-icon" id="' + result.id + '"></i></p>');
 //        $('#add_filial').val('');
 //      },
 //      error: function(xhr, str){
 //        alert('Возникла ошибка: ' + xhr.responseCode);
 //      }
 //    });
 //  });

	// $('body').delegate('.filial-zone-icon','click',function() {
 //  	element = $(this);
 //    $.ajax({
 //      type: 'GET',
 //      url: 'update?id=<?= $model->id ?>&delete_filial=' + element.attr('id'),
 //      success: function(data) {
 //        element.closest('p').remove();
 //      },
 //      error: function(xhr, str){
 //        alert('Возникла ошибка: ' + xhr.responseCode);
 //      }
 //    });
 //  });
</script>