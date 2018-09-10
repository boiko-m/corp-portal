<?php
  use yii\helpers\Html;
	use yii\helpers\Url;
  use yii\bootstrap\ActiveForm;
  use \app\widgets\LbrComments;
  use app\models\ProjectUserGroup;

  use app\assets\ProjectAsset;
  use app\assets\AppAsset;
  AppAsset::register($this);
  ProjectAsset::register($this);

  $this->title = $project->name;
  $this->params['breadcrumbs'][] = ['label' => 'Проекты компании', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $this->title;

  $userGroup = '';
?>

<div class="row">
  <div class="col-xs-12 col-md-9">
    <div class="card mb-3">
      <ul class="nav nav-tabs nav-justified nav-project tabs-bordered" >
        <li class="nav-item">
            <a href="#tab1" style="line-height: 1;" class="nav-link active" data-toggle="tab" aria-expanded="false">О проекте</a>
        </li>
        <? if(\Yii::$app->user->can("controlProject")): ?>
          <li class="nav-item">
            <a href="#tab2" style = "line-height: 1;" class="nav-link" data-toggle="tab" aria-expanded="false">Цели</a>
          </li>
        <? endif; ?>
      </ul>

      <div>
        <div class="tab-content pt-10">
          <div id="tab1" class="tab-pane active" style="padding: 0px 20px 10px;">
            <div style="font-size: 11px; background: whitesmoke; padding: 10px; border-radius: 5px;">
              <?php if (!empty($project->description) && $project->description_visible) : ?>
                <?= $project->description ?>
              <? else : ?>
                <center><b class="non-description">На данный момент описание проекта отсутствует</b></center>
              <? endif; ?>
            </div>
            <? if(\Yii::$app->user->can("controlProject")): ?>
            <div>
              <span title="Хочу принять участие" class="want-to-project d-inline-block pt-5" style="font-size: 20px !important;">
                  <i class=" mdi mdi-account-star"></i>
                    Принять участие в проекте
              </span>
            </div>
            <? endif; ?>
            <hr>

            <? if(count($project_news) != 0) : ?>
              <div id="news">
                <h5 class="h5-class">Движение по проекту:</h5>
              </div>
            <? else : ?>
              <div id="news">
                <h5 class="h5-class">Пока нет новостей</h5>
              </div>
            <? endif; ?>

            <?php foreach ($project_news as $key => $news) { ?>
              <div class="news-project-n">
                <div class="row">
                  <div class="col-md-2">
                    <img src="/img/project-news/<?= $news->avatar ?>" width="55">
                    <div class="project_date"><?= date("d.m.Y", $news->create_at); ?></div>
                  </div>
                  <div class="col-md-10">
                    <a href="/project-news/view/<?= $news->id ?>" target="_blank">
                      <?= $news->title ?>
                    </a>
                    <p><?= $news->short_description ?></p>
                  </div>
                </div>
              </div>
            <? } ?>

            <?php if(\Yii::$app->user->can("controlProject")): ?>
              <div class="news-project-n">
                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-12">
                    <a href="/admin/project-news/create">
                      <button class="btn waves-effect w-md btn-light" style="width: 50%">Добавить новость</button>
                    </a>
                  </div>
                </div>
              </div>
            <? endif; ?>

          </div>
					<div id="tab2" class="tab-pane">
						<ul class="nav nav-tabs nav-justified nav-project tabs-bordered">
							<li class="nav-item">
								<a href="#stage_project" style="line-height: 1; font-size: 14px;" class="nav-link active" data-toggle="tab" aria-expanded="false">Цель <br> проекта</a>
							</li>
							<? foreach($stages as $key => $stage) { ?>
								<li class="nav-item">
									<a href="#stage<?= $stage->id?>" class="nav-link" style="<?= time() >= $stage->date_begin && time() <= $stage->date_end ? 'opacity: 0.4' : null ?>; line-height: 1; font-size: 14px" data-toggle="tab" aria-expanded="false" onclick="tajax('/project/infostage', {
										container : 'projectinfostage',
										data: 'id=<?= $stage->id ?>'
									})"><?= $stage->name ?><br><small><?= date('d.m.Y', $stage->date_begin) ?> - <?= date('d.m.Y', $stage->date_end) ?></small></a>
								</li>
							<? } ?>
						</ul>
						<div  class="tab-content">
							<div id="stage_project" class="tab-pane show active" style="padding: 0px 10px 10px"></div>
							<div id="projectinfostage"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



    <div class="col-xs-12 col-md-3 mb-2">
      <div class="card pb-20" style="max-height: 500px; overflow: auto;">
        <h5 class="card-header h5-class">
					<span class="d-inline-block">Рабочая группа</span>
        </h5>
        <?php foreach ($project_group as $key => $group) { ?>
          <?php if ($userGroup != $group->id_project_user_group) : ?>
            <div class="work-group">
              <div class="work-group-title">
                <?= (ProjectUserGroup::find()->where(['id' => $group->id_project_user_group])->one())->name ?>
              </div>
          <? endif; ?>
          <div class="work-group-content">
            <div class="toolajax">
							<div class="row" style="padding: 4px">
								<div class="col-md-2">
									<? if (isset($group['profile']['img']) && strlen($group['profile']['img']) > 0) : ?>
										<img src="/img/user/thumbnail_<?= $group['profile']['img'] ?>" alt="user" class="rounded-circle ajax-tooltip-img">
									<? else : ?>
										<img src="/images/users/avatar-1.jpg" alt="user" class="rounded-circle ajax-tooltip-img">
									<? endif; ?>
								</div>
								<div class="col-md-9" style="margin-left: 20px">
									<div>
										<?= Html::a($group['profile']['first_name'] . '&nbsp;' . $group['profile']['last_name'], Url::to(['/profiles/' . $group['profile']['id']]),
										['class' => 'href-tooltip']) ?>
									</div>
									<div class="online-in-tooltip">
										<?= ' ' . $online ?>
									</div>
									<div class="text-in-tooltip">
										<?= $group['profile']['position']; ?>
									</div>
									<div class="text-in-tooltip">
										<?= $group['profile']['branch']; ?>
									</div>
								</div>
								<!-- <div class="col-md-12" style="text-align: center;">
									<button type="button" class="btn btn-light waves-effect w-md" style="font-size: 10px; margin-top: 10px">Написать сообщение</button>
								</div> -->
							</div>
						</div>
          </div>
          <?php if ($userGroup != $group->id_project_user_group) : ?>
            <?php $userGroup = $group->id_project_user_group ?>
            </div>
          <? endif; ?>
        <? } ?>

        <?php if (count($project_group) == 0) : ?>
          <center class="pt-15" style="font-size: 11px;">
            <b class="non-description">Рабочая группа не определена</b>
          </center>
        <? endif; ?>
      </div>
    </div>
	</div>



	<!-- <div id = "news">
		<h5 class="h5-class">
			Движение по проекту
		</h5>
	</div>

	<div class="row">
		<div class="col-xs-3 col-md-3">
			<div class = "card-box">
			<h6 style="text-align: center;">
					Подвели итоги 1-го этапа проекта
			</h6>
			<div>
				<small>
					20.02.2018
				</small>
			</div>
			<div style="text-align: justify!important;">
				<small style="">
					Составлен индивидуальный план рекламы (ИПР)  для  30 клиентов. Сформирован стандартный перечень должностей и их ролию. Приведен в порядок моб телефоны, емэйлы, найти контакты соц сетей. Посадочная страница для клиента - персонализировать данные для клиента.
				</small>
			</div>
			<div style="text-align: right">
				<a href="">Открыть новость</a>
			</div>
		</div>
	</div>

	<div class="col-xs-3 col-md-3">
		<div class = "card-box">
			<h6 style="text-align: center;">
				Начали работу  над 2-м этапом проекта
			</h6>
			<div>
				<small>
					20.01.2018
				</small>
			</div>
			<div style="text-align: justify!important;">
				<small style="">
					Разработан индивидуальный план рекламы для 7 клиентов. Выработана методику поиска контактов. Составить прототип посадочной страницы по запчастям - со всей инфой по клиенту. Индивидуальная ссылка для клиента, по которой он перейдет на индивид посадочную страницу по зч.
				</small>
			</div>
			<div style="text-align: right">
				<a href="">Открыть новость</a>
			</div>
		</div>
	</div>
</div>


<!--
<div id = "news">
    <h5 class="h5-class">
        Движение по проекту
    </h5>
</div>

<div class="row">

             <div class="col-xs-3 col-md-3">
                <div class = "card-box">
                    <h6 style="text-align: center;">
                        Подвели итоги 1-го этапа проекта
                    </h6>
                    <div>
                        <small>
                            20.02.2018
                        </small>
                    </div>
                    <div style="text-align: justify!important;">
                        <small style="">
                            Составлен индивидуальный план рекламы (ИПР)  для  30 клиентов. Сформирован стандартный перечень должностей и их ролию. Приведен в порядок моб телефоны, емэйлы, найти контакты соц сетей. Посадочная страница для клиента - персонализировать данные для клиента.
                        </small>
                    </div>
                    <div style="text-align: right">
                        <a href="">Открыть новость</a>
                    </div>
                </div>
            </div>

             <div class="col-xs-3 col-md-3">
                <div class = "card-box">
                    <h6 style="text-align: center;">
                        Начали работу  над 2-м этапом проекта
                    </h6>
                    <div>
                        <small>
                            20.01.2018
                        </small>
                    </div>
                    <div style="text-align: justify!important;">
                        <small style="">
                            Разработан индивидуальный план рекламы для 7 клиентов. Выработана методику поиска контактов. Составить прототип посадочной страницы по запчастям - со всей инфой по клиенту. Индивидуальная ссылка для клиента, по которой он перейдет на индивид посадочную страницу по зч.
                        </small>
                    </div>
                    <div style="text-align: right">
                        <a href="">Открыть новость</a>
                    </div>
                </div>
            </div>

</div> -->

<div class="row">
  <div class="col-12">
    <?php echo LbrComments::widget([
      'model' => ['project', 'project-forum', 'project-news'],
      'model_key' => $project['id'],
      'name_widget' => 'Форум',
    ]) ?>
  </div>
</div>
