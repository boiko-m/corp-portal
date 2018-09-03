<?php
  use yii\helpers\Html;
  use yii\bootstrap\ActiveForm;

  use app\assets\ProjectAsset;
  use app\assets\AppAsset;
  AppAsset::register($this);
  ProjectAsset::register($this);
?>

<div class="row">
  <div class="col-xs-12 col-md-12">

			<div class="tab-content" style="padding-top: 5px">
				<div class="tab-pane active" style="padding: 0px 10px 10px;">
				
					<?php if (!empty($project->description) && $project->description_visible) : ?>
						<div style="font-size: 11px; background: whitesmoke; padding: 10px; border-radius: 5px;">
							<h4>Описание: </h4>
								<?= $project->description ?>
						</div>
					<? endif; ?>
					
					<?php if (!empty($project->goal)) : ?>
						<div style="font-size: 11px; background: whitesmoke; padding: 10px; border-radius: 5px; margin-top: 10px;">
							<h4>Цель: </h4>
								<?= $project->goal ?>
						</div>
					<? endif; ?>
					
					<? if(\Yii::$app->user->can("controlProject")): ?>
						<div>
							<span title="Хочу принять участие" class="want-to-project" style="display: inline-block; font-size: 20px !important; padding-top: 5px;">
									<i class=" mdi mdi-account-star"></i>
										Принять участие в проекте
							</span>
						</div>
					<? endif; ?>
				</div>
			</div>
			
	</div>
</div>