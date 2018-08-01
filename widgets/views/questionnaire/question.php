<?php
	use yii\helpers\Url;
	use yii\widgets\Pjax;
	use yii\widgets\ListView;
	use app\models\Answers;

	$isFirst = true;
?>

<div class="col-md-12">
	<form method="POST" id="form_answer" action="javascript:void(null);">
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	  	<div class="carousel-inner">
				<?php foreach ($questions as $key => $question) { ?>
					<div class="carousel-item <?= $isFirst ? 'active' : null ?>" id="question" id-question="<?= $question->id ?>">
						<h5 class="text-center"><?= $question->name ?></h5>
						<p class="text-center"><?= $question->description ?></p>

						<?php $answers = Answers::find()->where(['id_question' => $question->id])->all(); ?>
						<?php foreach ($answers as $key => $answer) { ?>
							<? if (!$question->type) : ?>
								<p>
									<input type="radio" name="answer" value="<?= $answer->id ?>"><?= $answer->name ?>
								</p>
							<? else : ?>
								<p>
									<input type="checkbox" name="answer" value="<?= $answer->id ?>"><?= $answer->name ?>
								</p>
							<? endif; ?>
						<? } ?>
						<? $isFirst = !$isFirst; ?>
					</div>
				<? } ?>
			</div>
			<div class="text-center thank-you">
				<span>Спасибо за Ваш голос!</span>
			</div>
		</div>
		<? if (count($questions) > 1) : ?>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Назад</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Вперед</span>
		  </a>
		 <? endif; ?>
		<div class="center-button answer-button">
	  		<button class="btn waves-effect w-md btn-light" id="button-answer">Ответить</button>
		</div>
	</form>
</div>