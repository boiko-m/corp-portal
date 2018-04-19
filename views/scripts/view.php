<?php 
use app\models\Scripts;
?>

<?php if (!$reset) {?>
	
	<?php if ($answers) { ?>
	<div class="row">
		<div class="col">
			<div>
				<button class = "btn btn-light waves-effect waves-light " onclick="ajax('update', 'reset=true&id=0', 'scripts')" style = "text-align: left;font-size: 10px"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i> Вернуться к скриптам</button>
			</div>
			<div class="m-b-30" style="text-align: center;font-weight: bold;">
					<?=$data['content']?>
				</div>
			<div class="row">

				<?php foreach ($answers as $answer) { if (!$answer['redir']) $answer['redir'] = $answer['id']; ?>
					<div class="col d-xs-block" style="text-align: center;">
						<button type="button" class="btn btn-light waves-effect w-lg btn-block " style="padding: 10px 40px;" onclick = "ajax('update', 'id=<?=$answer['redir']?>', 'scripts')"><?=$answer['answer']?></button>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php if ($data['id_fk_scripts']): ?>
			<div class="col-xl-1 d-none d-xl-flex">
				<?php $top = Scripts::getScriptTop($data['id']); ?>
				<button title = "В начало" onclick = "ajax('update', 'id=<?=$top['id']?>', 'scripts')" type="button" class="btn btn-light waves-effect" style="border:none;"><i class="mdi mdi-arrow-up-bold-hexagon-outline" style="font-size: 26px"></i></button>
			</div>
		<?php endif ?>
	</div>

	<div class="row d-none d-xl-flex" style="padding-top:10px;border-top: 1px solid #ecedee;margin-top:10px;font-size: 14px!important;">
		<?php foreach ($answers as $answer) { if (!$answer['redir']) $answer['redir'] = $answer['id']; ?>
			<div class="col" style="text-align: center;">
				<div style="font-weight: bold;min-height: 60px;padding-top: 10px;padding-bottom: 10px">
					<?php if ($answer['content']) { ?>
						<div style="color: black;font-weight: bold">
							<?=$answer['content'] ?>
						</div>
					<?php } else { ?>
						Другой скрипт  <br>
						<i class="mdi mdi-arrow-collapse-down" style="color: black"></i>
					<?php } ?>

				</div>
				<?php $answers_other = Scripts::getScript($answer['id']); ?>
				<?php if ($answers_other): ?>
					<div class="row">
						<?php foreach ($answers_other as $answer_other):
							if (!$answer_other['redir']) $answer_other['redir'] = $answer_other['id'];
						 ?>
							<div class="col">
								<button type="button" class="btn btn-light waves-effect w-lg btn-block" style="white-space: normal;padding: 10px 40px;font-size: 12px;min-height: 60px" onclick="ajax('update', 'id=<?=$answer_other['id'] ?>', 'scripts')"><?=$answer_other['answer'] ?></button>

								<div class="row" style="white-space: normal;padding-bottom:10px;padding-top: 10px;font-size: 10px;border-top: 1px solid #ecedee;margin-top: 10px">
									<div class="col">
										<div class="row">
											<?php if ($answer_other['content']) { ?>
												<div class="col">
													<div style="color: black;font-weight: bold">
														<?=$answer_other['content'] ?>
													</div>
													<div>
														<?php $answers_other_two = Scripts::getScript($answer_other['id']); ?>
														<?php if ($answers_other_two) { ?>
															<div class="row">
																<div class="col">
																	<?php foreach ($answers_other_two as $answer_two): ?>
																		<button type="button" class="btn btn-light waves-effect w-lg btn-block" style="white-space: normal;margin:5px auto;padding: 3px 10px;font-size: 10px;" onclick="ajax('update', 'id=<?=$answer_two['id'] ?>', 'scripts')"><?=$answer_two['answer'] ?></button>
																	<?php endforeach ?>
																</div>
																
															</div>
														<?php } ?>
													</div>
												</div>
											<?php } else { ?>
												<div class="col">
													Другой скрипт  <br>
													<i class="mdi mdi-arrow-collapse-down" style="color: black"></i>
												</div>
											<?php } ?>
										</div>
										
									</div>
								</div>

								<div class="row">
									<div class="col">
										
									</div>
								</div>
							</div>
							
							
						<?php endforeach ?>

					</div>
				<?php endif ?>
				
			</div>
		<?php } ?>
	</div>

	<?php } else {?>
		<div style="padding-bottom: 10px">
			<button class = "btn btn-light waves-effect waves-light d-xs-block" onclick="ajax('update', 'reset=true&id=0', 'scripts')" style = "text-align: left;font-size: 10px"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i> Вернуться к скриптам</button>
		</div>
		<div class="row">
			<div class="col">
				<h4><?=$data['content']?></h4>
			</div>
		</div>
		<div style="font-size: 10px">
			Скрипт завершен!
		</div>
	<?php } ?>

<?php } else { ?>
		<div class="row">
			<div class="col-xl-4">
				<?php foreach ($scripts as $script): ?>
					<button class = "btn btn-light waves-effect waves-light btn-block" href="#src" onclick = "ajax('update', 'id=<?=$script['id']?>', 'scripts')" style = "text-align: left;"><i class="mdi mdi-arrow-right-bold-hexagon-outline"></i> <?=$script['answer']?></button>
				<?php endforeach ?>
			</div>
		</div>
	<?php } ?>

