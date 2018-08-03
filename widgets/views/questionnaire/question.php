<?php
	use yii\helpers\Url;
	use yii\widgets\Pjax;
	use yii\widgets\ListView;
	use app\models\Answers;
	use app\models\AnswersUser;

	$isFirst = true;
?>

<div class="col-xs-12 col-md-<?= $col_size ?> m-b-30">
  <div class="card">
    <div class="card-header"><?= $title ?></div>
		<div class="col-md-12">
			<form method="POST" id="form_answer" action="javascript:void(null);">
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="max-height: <?= $width ?>px !important;">
			  		<div class="carousel-inner">
						<?php foreach ($questions as $key => $question) { ?>

							<? if (!AnswersUser::find()->where(['id_question' => $question->id, 'id_user' => Yii::$app->user->id])->one()) : ?>
							<div class="carousel-item <?= $isFirst ? 'active' : null ?>" id="question">
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
											<input type="checkbox" name="answer-<?= $answer->id ?>" value="<?= $answer->id ?>"><?= $answer->name ?>
										</p>
									<? endif; ?>
								<? } ?>
								<? $isFirst = !$isFirst; ?>

							</div>
						<? endif; ?>

						<? } ?>
					</div>
					<div class="text-center thank-you">
						<span>Спасибо за Ваш голос!</span>
					</div>
					<div class="text-center wait-more">
						<span>Благодарим за участие в голосовании</span>
					</div>
				</div>
				<div class="qiestion-controle">
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
				</div>
			</form>
		</div>
	</div>
</div>