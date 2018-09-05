<div class="row">
  <div class="col-xs-12 col-md-12">
    <div style="padding: 0px 10px 10px;">Цели этапа:</div>
			<div class="stage-goal">
				<? foreach($objects as $key => $object) { ?>
					<div class="row <?= $object->complete ? 'success-border' : null ?>">
						<div class="col-xs-12 col-md-6">
							<?= $object->description ?>
						</div>
						<div class="col-xs-12 col-md-6">
							<b>Итог: <span class="colororange">Корректировка цели</span></b> <br>
							Перенос на следующий этап
						</div>
					</div>
				<? } ?>
			</div>
  </div>
</div>