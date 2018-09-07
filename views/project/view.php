<?php
  use yii\helpers\Html;
  use yii\bootstrap\ActiveForm;
  use app\models\ProjectUserGroup;
	use yii\widgets\LinkPager;

  use app\assets\ProjectAsset;
  use app\assets\AppAsset;
  AppAsset::register($this);
  ProjectAsset::register($this);

  $this->title = $project->name;
  $this->params['breadcrumbs'][] = "Проекты компании";
  $this->params['breadcrumbs'][] = $this->title;

  $userGroup = '';
?>

<style>
	body {
		min-height: 100px !important;
	}
</style>

<div class="row">
  <div class="col-xs-9 col-md-9">
    <div class="card">
      <ul class="nav nav-tabs nav-justified nav-project" style="margin: 10px;">
      	<li class="nav-item col-xs-3 col-md-3">
          <a href="#target1" class="nav-link active" data-toggle="tab" aria-expanded="false" onclick="tajax('/project/infoajax', {
            container : 'projectall',
            data: 'id=<?= $project->id ?>'
          })">Проект</a>
        </li>
      	<? foreach ($stages as $key => $stage) { ?>
					<li class="nav-item">
							<a href="#stage<?= $stage->id ?>" class="nav-link" title="Дата проведения: <?= date('d.m.Y', $stage->date_begin) ?> - <?= date('d.m.Y', $stage->date_end) ?>" data-toggle="tab" aria-expanded="false" onclick="tajax('/project/all', {
								container : 'projectall',
								data: 'id=<?= $stage->id ?>'
							})"><?= $stage->name ?>
						</a>
					</li>
        <? } ?>
        <? if (Yii::$app->user->can('Scrum-master')) : ?>
          <li class="nav-item col-xs-3 col-md-3">
            <a href="#add-stage" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="10" data-overlayColor="#36404a" class="nav-link" title="Добавить этап"><i class="fa fa-plus" aria-hidden="true"></i></a>
          </li>
        <? endif; ?>
      </ul>

      <div>
          <div id="projectall"></div>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-md-3 right-menu-project">
    <div class="card">
      <ul class="nav nav-tabs tabs-bordered nav-justified nav-project">
        <? if (Yii::$app->user->can('Scrum-master')): ?>
					<li class="nav-item col-xs-12">
          	<a href="#right1" class="nav-link" title="Бэклог" data-toggle="tab" aria-expanded="false"><i class=" dripicons-view-list"></i></a>
        	</li> 
         <? endif; ?>
        <li class="nav-item col-xs-12">
          <a href="#right2" class="nav-link active" title="Рабочая группа" data-toggle="tab" aria-expanded="false"><i class="dripicons-user-group"></i></a>
        </li>
        <!-- <li class="nav-item col-xs-12">
          <a href="#right3" class="nav-link " data-toggle="tab" aria-expanded="false"><i class="dripicons-toggles"></i></a>
        </li> -->
      </ul>

      <div class="tab-content" style="padding: 0px 10px 10px 10px;">
				<div id="right1" class="tab-pane show">
					<div class="backlog-control mt-3">
						<!-- <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Бэклог
            	</button>
            	<div class="dropdown-menu dropdown-menu-animated" aria-labelledby="" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
              	<a class="dropdown-item" href="#">Добавить</a>
              	<a class="dropdown-item" href="#">Добавить со временем</a> 
            	</div> -->
            
            	<button type="button" class="btn btn-light waves-effect w-md d-inline-block" title="Начало бэклога (не работает)"><i class="fa fa-play" aria-hidden="true"></i></button>
            	
            	<div class="add-target d-inline-block float-right"> <!-- Add class float-right then uncomment buttons -->
								<button type="button" title="Создание итога" href="#add-result" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="10" data-overlayColor="#36404a" class="btn btn-light add-target-button">
									<i class="fa fa-object-group" aria-hidden="true"></i>
									<i class="fa fa-plus icon-object-plus" aria-hidden="true"></i>
								</button>
						 	</div>
            
            	<div class="add-target d-inline-block float-right"> <!-- Add class float-right then uncomment buttons -->
								<button type="button" title="Создание цели" href="#add-object" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="10" data-overlayColor="#36404a" class="btn btn-light add-target-button">
									<i class="fa fa-tasks" aria-hidden="true"></i>
									<i class="fa fa-plus icon-object-plus" aria-hidden="true"></i>
								</button>
						 	</div>
						</div>
          
          	<div class="backlog">
							<? foreach($objects as $key => $object) { ?>
							<div class="backlog-block">
								<div class="backlog-block-title">
								 <?= $object['stage']['name'] ?>
									цель от <?= date('d.m.Y', $object->create_at) ?>
									<hr class="hr-object-control">
								</div>
								<div class="backlog-block-content">
									<?= $object->description ?>
								</div>
								<div class="backlog-block-content text-right" style="margin-top: -12px;">
									<div class="dropdown mt-3">
										<button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											Управление целью
										</button>

										<div class="dropdown-menu">
											<!-- <a class="dropdown-item" href="#">Прикрепить к задаче</a> -->
											<a class="dropdown-item object-console-item" href="#">Промежуточные итоги</a>
										</div>
									</div>
								</div>
							</div>
							<? } ?>

							<div class="paddination-main">
								<?php echo LinkPager::widget([
									'pagination' => $objectPages,
									'options'=>['class' => 'pagination float-right'],

									'activePageCssClass' => 'p-active',
									'linkOptions' => ['class' => 'page-link'],
									'maxButtonCount' => 3,

									'disabledPageCssClass' => 'disabled',

									'prevPageCssClass' => 'prev-page',
									'nextPageCssClass' => 'next-page',
								]); ?>
							</div>

						</div>
					</div> 

        <div id="right2" class="tab-pane show active">
          <? foreach ($project_group as $key => $group) { ?>
            <div class="work-group-view">
              <?php if ($userGroup != $group->id_project_user_group): ?>
                <div class="work-group-view-title">
                  <?= (ProjectUserGroup::find()->where(['id' => $group->id_project_user_group])->one())->name ?>
                </div>
              <? endif; ?>
              <div class="work-group-view-content">
                <div class="btn-group m-b-10">
                  <button type="button" class="btn btn-light" onclick="window.open('/profiles/<?= $group['profile']['id'] ?>', '');"><?= $group['profile']['first_name'] . ' ' . $group['profile']['last_name'] ?></button>
                  <? // if (Yii::$app->user->can('Scrum-master')): ?>
<!--
                    <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu text-center" x-placement="bottom-start" style="position: absolute; transform: translate3d(95px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                      <a class="dropdown-item" href="#">Добавить задачу</a>
                      <div class="dropdown-divider"></div>
                      <small>Принят: <?= date('d.m.Y', $group->create_at) ?></small>
                    </div>
-->
                  <? // endif; ?>
                </div>
              </div>
            </div>
            <?php if ($userGroup != $group->id_project_user_group) : ?>
              <?php $userGroup = $group->id_project_user_group ?>
            <? endif; ?>
          <? } ?>
        </div>

        <!-- <div id="right3" class="tab-pane show ">
          <div style="font-size: 12px; padding-top: 10px; font-weight: bold">
            Управление
          </div>

          <a href="javascript:void(0);" class="dropdown-item">
            группой
          </a>

          <a href="javascript:void(0);" class="dropdown-item">
            <div>
              проектом
            </div>
          </a>

          <a href="javascript:void(0);" class="dropdown-item">
            <div>
              новостями
            </div>
          </a>
                            
          <div style="font-size: 12px;padding-top: 10px; font-weight: bold">
            Отчет
          </div>

          <a href="javascript:void(0);" class="dropdown-item">
            <div>
              по проекту
            </div>
          </a>

          <a href="javascript:void(0);" class="dropdown-item">
            <div>
              по этапу
            </div>
          </a>

          <a href="javascript:void(0);" class="dropdown-item">
            <div>
              по спринту
            </div>
          </a>

        </div>  -->          
      </div>

    </div>

   	<? if (count($project_news) > 0): ?>
			<div class="project-news" style="padding: 10px 0px;">
				Новости проекта
			</div>
			<div class="card">
				<?php foreach ($project_news as $news) { ?>
					<div class="project-news-title">
						<small><?= date('d.m.Y', $news->create_at) ?></small> <a href="/project-news/<?= $news->id ?>" target="_blank"><?= $news->title ?></a> 
					</div>
				<? } ?>
			</div>
		<? endif; ?>

  </div>
</div>


<!-- ---------- Models ----------- -->

<div id="add-stage" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Закрыть</span>
  </button>
  <h4 class="custom-modal-title">Создание этапа</h4>
  <div class="custom-modal-text">
    <form id="add-stage-form">
      <div class="form-group">
        <label for="stageBegin">Дата начало этапа</label>
        <input type="date" class="form-control" name="stage-begin" id="stageBegin">
      </div>
      <div class="form-group">
        <label for="stageEnd">Дата окончания этапа</label>
        <input type="date" class="form-control" name="stage-end" id="stageEnd">
      </div>
    </form>
    <button id="add-button-stage" class="btn btn-secondary crate-dialog-group-button">Создать этап</button>
  </div>
</div>

<div id="add-object" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Закрыть</span>
  </button>
  <h4 class="custom-modal-title">Создание цели</h4>
  <div class="custom-modal-text">
    <form id="add-object-form">
      <div class="form-group">
        <label for="objectStage">Этап</label>
        <select class="form-control" name="object-stage" id="objectStage">
        	<? foreach($stages as $key => $stage) { ?>
        	<option value="<?= $stage->id ?>"><?= $stage->name ?></option>
        	<? } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="objectDescription">Описание</label>
				<textarea type="text" class="form-control" name="object-description" id="objectDescription"></textarea>
      </div>
      <div class="form-group">
        <label for="objectFinalValue">Финальное значение</label>
        <input type="number" min="0" class="form-control" name="object-final-value" id="objectFinalValue" value="0">
        <p class="text-left" style="font-size: 13px; opacity: 0.5">Может имень значение 0</p>
      </div>
    </form>
    <button id="add-button-object" class="btn btn-secondary crate-dialog-group-button">Создать цели</button>
  </div>
</div>

<div id="add-result" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Закрыть</span>
  </button>
  <h4 class="custom-modal-title">Создание итога</h4>
  <div class="custom-modal-text">
    <form id="add-result-form">
      <div class="form-group">
        <label for="resultStage">Этап</label>
        <select class="form-control" name="result-stage" id="resultStage">
        	<? foreach($stages as $key => $stage) { ?>
        	<option value="<?= $stage->id ?>"><?= $stage->name ?></option>
        	<? } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="stageResultDescription">Описание</label>
				<textarea type="text" class="form-control" name="stage-result-description" id="stageResultDescription"></textarea>
      </div>
    </form>
    <button id="add-button-result" class="btn btn-secondary crate-dialog-group-button">Создать итога</button>
  </div>
</div>

<!-- ---------- Models ----------- -->


<script>
  $(document).ready(function() {
    tajax('/project/infoajax', {
      container : 'projectall',
			data: 'id=<?= $project->id ?>'
    })
  });
	
	$("#add-button-stage").click(function() {
		var stage = $('#add-stage-form').serializeArray();
		stage.push({name: "id-project", value: "<?= $project->id ?>"});
			$.ajax({
				type: 'POST',
				url: '/project/add-stage',
				data: stage,
				success: function(data) {
					location.reload();
				},
				error: function(xhr, str){
					console.log('Возникла ошибка: ' + xhr.responseText)
				}
			});
	});
	
	$("#add-button-object").click(function() {
		var object = $('#add-object-form').serializeArray();
			$.ajax({
				type: 'POST',
				url: '/project/add-object',
				data: object,
				success: function(data) {
					location.reload();
				},
				error: function(xhr, str){
					console.log('Возникла ошибка: ' + xhr.responseText)
				}
			});
	})
	$("#add-button-result").click(function() {
		var object = $('#add-result-form').serializeArray();
			$.ajax({
				type: 'POST',
				url: '/project/add-result',
				data: object,
				success: function(data) {
					location.reload();
				},
				error: function(xhr, str){
					console.log('Возникла ошибка: ' + xhr.responseText)
				}
			});
	})
</script>
