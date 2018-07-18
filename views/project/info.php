<?php
  use yii\helpers\Html;
  use yii\bootstrap\ActiveForm;
  use ogheo\comments\widget\Comments;
  use \app\widgets\LbrComments;
  use app\models\ProjectUserGroup;

  use app\assets\ProjectAsset;
  use app\assets\AppAsset;
  AppAsset::register($this);
  ProjectAsset::register($this);

  $this->title = $project->name;
  $this->params['breadcrumbs'][] = "Проекты компании";
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

      <div >
        <div class="tab-content" style="padding-top: 10px">
          <div id="tab1" class="tab-pane active" style="padding: 0px 20px 10px;">
            <div style="font-size: 11px;background: whitesmoke;padding: 10px;border-radius: 5px;">
              <?php if (!empty($project->description) && $project->description_visible) : ?>
                <?= $project->description ?>
              <? else : ?>
                <center><b class="non-description">На данный момент описание проекта отсутствует</b></center>
              <? endif; ?>
            </div>
            <? if(\Yii::$app->user->can("controlProject")): ?>
            <div>
              <span title="Хочу принять участие" class="want-to-project" style="display: inline-block; font-size: 20px !important; padding-top: 5px;">
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
                  <div class="col-md-2"><img src="/img/project-news/<?= $news->avatar ?>" width="55"></div>
                  <a href="/project-news/view/<?= $news->id ?>" target="_blank">
                    <div class="col-md-10"><?= $news->title ?></div>
                  </a>
                </div>
                <div class="row">
                  <div class="col-md-2"><?= date("d.m.Y", $news->create_at); ?></div>
                  <div class="col-md-10">
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
            <div id = "tab2" class="tab-pane">
              <ul class="nav nav-tabs nav-justified nav-project tabs-bordered" >
                <li class="nav-item">
                      <a href="#stage_project" style="line-height: 1;font-size:14px" class="nav-link" data-toggle="tab" aria-expanded="false">Цель <br> проекта</a>
                  </li>
                  <li class="nav-item">
                      <a href="#stage1" style = "opacity: 0.4;line-height: 1;font-size:14px" class="nav-link" data-toggle="tab" aria-expanded="false">Этап 1 <br><small>21.02.2018</small></a>
                  </li>
                 <li class="nav-item">
                      <a href="#stage2" style = "opacity: 0.4;line-height: 1;font-size:14px" class="nav-link" data-toggle="tab" aria-expanded="false">Этап 2<br><small>25.04.2018</small></a>
                  </li>
                   <li class="nav-item">
                      <a href="#stage3" class="nav-link " style = "opacity: 0.4;line-height: 1;font-size:14px" data-toggle="tab" aria-expanded="false">Этап 3<br><small>21.06.2018</small></a>
                  </li>
                   <li class="nav-item">
                      <a href="#stage4" class="nav-link active" style = "line-height: 1;font-size:14px" data-toggle="tab" aria-expanded="false">Этап 4 <br> <small style="color: blue">23.07.2018</small></a>
                  </li>
              </ul>
              <div  class="tab-content">
                <div id="stage_project" class="tab-pane" style="padding: 0px 10px 10px"></div>
                <div id="stage1" class="tab-pane">
                  <div style="padding: 0px 10px 10px;">Цели этапа:</div>
                  <div class="stage-goal">
                    <div class="row">
                      <div class="col-xs-12 col-md-6">
                        Посадочная страница для клиента - персонализировать данные для клиента. При переходе по ссылке клиент попадает на страницу с предложениями специально для него.
                      </div>
                      <div class="col-xs-12 col-md-6">
                        <b>Итог: <span class="colororange">Корректировка цели</span></b> <br>
                        Перенос на следующий этап
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-12 col-md-6">
                        Составить индивидуальный план рекламы (ИПР)  для  30 клиентов.Выбираем 3-4 филиала, на них взять по несколько клиентов, на ком тренируемся составлять ИПР - ставим по клиенту товарные цели на базе потенциала, чем занимается клиент. Определяем, что можем предложить, в какой срок, по каким каналам связи.
                      </div>
                      <div class="col-xs-12 col-md-6">
                        <b>Итог: <span class="colororange">Корректировка цели</span></b> <br>
                        Перенос на следующий этап
                      </div>
                    </div>

                    <div class="row success-border">
                      <div class="col-xs-12 col-md-6">
                        Сформировать стандартный перечень должностей и их роли.
                      </div>
                      <div class="col-xs-12 col-md-6 ">
                        <b>Итог: <span class="colorgreen">Выполнено</span></b> <br>
                        Должности приведены к одному стандарту. Теперь в 1с контакты заносятся с выбором из перечня должностей
                      </div>
                    </div>
                  </div>
                </div>
                <div id="stage2" class="tab-pane ">
                  <div style="padding: 0px 10px 10px;">Цели этапа:</div>
                    <div class="stage-goal">     
                      <div class="row">
                        <div class="col-xs-12 col-md-6">
                          На последней неделе этапа  - 400 писем рекламных  электронных  по зч в новом формате. Индивидуальная ссылка для клиента, по которой он перейдет на индивид посадочную страницу по зч. Продумать, чем кроме почты можно доставить ссылку
                        </div>
                        <div class="col-xs-12 col-md-6">
                          <b>Итог: <span class="colororange">Корректировка цели</span></b> <br>
                          Перенос на следующий этап
                        </div>
                      </div>

                      <div class="row success-border">
                        <div class="col-xs-12 col-md-6">
                          Разработать индивидуальный план рекламы для 7 клиентов (разных по размеру хоз-ва) - отработать ИПР с конкретными задачами: куда впишутся задачи, кем будут взяты, когда/кому отправляем (Фермеры, небольшой холдинг). Определить механизм подбора товаров
                        </div>
                        <div class="col-xs-12 col-md-6 ">
                          <b>Итог: <span class="colorgreen">Выполнено</span></b> <br>
                          Определили ИПР для 2 клиентов. Разработать алгоритм по технике оказалось нереальным. Решили начать стого, что сможем подобрать под клиента с бОльшей вероятность - с посадочной страницы по запчастям
                        </div>
                      </div>

                      <div class="row success-border">
                        <div class="col-xs-12 col-md-6">
                          Выработать методику поиска контактов(хватает ли нужных людей, если не хватает, то каких и как получить, действует ли предприятие, есть ли контакты руководящего состава, в завис от размера хоз-ва, есть ли весь состав, ФИО, должности, роли, контакты….) 
                        </div>
                        <div class="col-xs-12 col-md-6 ">
                          <b>Итог: <span class="colorgreen">Выполнено</span></b> <br>
                          Выведен отдельный человек в отдел рекламы, который занимается поиском всей необходимой информации по контрагенту . Теперь есть возможность делать запрос в отдел маркетинга
                        </div>
                      </div>


                      <div class="row success-border">
                        <div class="col-xs-12 col-md-6">
                          Составить прототип посадочной страницы по запчастям - со всей инфой по клиенту (с топ товарами, какая есть скидка, какая доставка..)
                        </div>
                        <div class="col-xs-12 col-md-6 ">
                          <b>Итог: <span class="colorgreen">Выполнено</span></b> <br>
                          Первый макет посадочной страницы
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="stage3" class="tab-pane  ">
                    <div style="padding: 0px 10px 10px;">Цели этапа:</div>
                    <div class="stage-goal">
                      <div class="row success-border">
                        <div class="col-xs-12 col-md-6">
                            Первая массовая рассылка на посадочную страницу по зч
                            Выбрать топ-10 - топ-30 техники, по которым продаем в основном запчасти и сделать рассылку на целевых клиентов по данному виду техники
                          </div>
                          <div class="col-xs-12 col-md-6 ">
                            <b>Итог: <span class="colorgreen">Выполнено</span></b> <br>
                            Сделали рассылку. Отправка ушла почти на 3 тыс клиентов. Результатом стало всего 4 ВО и 127 переходов по ссылке на посадочную страницу (по данным на 05.07.18)
                          </div>
                       </div>
                    </div>
                    </div>
                    <div id="stage4" class="tab-pane  show active ">
                      <div style="padding: 0px 10px 10px;">Цели этапа:</div>
                      <div class = "project-target-items" style = "background: #f5f5f5">
                        <div class="project-target-item">
                          Размещения счета по запчастям на посадочной странице. Отправка таким образом 20 счетов по запчастям.
                        </div>
                        <div class="text-right">
                          <small>Выполнение 5/20</small>
                        </div>

                        <div class="progress" style="height: 5px;margin:0px;border:1px solid #3ec39685;">
                          <div class="progress-bar progress-lg bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width:25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class = "project-target-items" style = "background: #f5f5f5">
                        <div class="project-target-item">
                          Проработка вопроса безопастности посадочной страницы (создание личного кабинета, исключение утечки информации по клиенту сторонним лицам)
                        </div>
                      </div>

                      <div class = "project-target-items" style = "background: #f5f5f5">
                        <div class="project-target-item">
                            Проработка вопроса рассылки ссылки на посадочную страницу через мессенджеры
                        </div>
                      </div>


                            
<!-- 
                            <div class = "project-target-items" style = "background: #f5f5f5">
                                <div class="project-target-item">
                                    Размещения счета по запчастям на посадочной странице. Отправка таким образом 20 счетов по запчастям.
                                </div>
                               <div style="padding-left: 20px;">
                                   <small> Цель скорректирована:
                                   <b>Причина:</b> Перенос на следующий этап.
                                   </small>
                               </div>
                                <div class="text-right">
                                    <small>Решено 5/20</small>
                                </div>


                                <div class="progress" style="height: 5px;margin:0px;border:1px solid #3ec39685;">
                                    <div class="progress-bar progress-lg bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width:25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </div>

                            <div class = "project-target-items" style = "background: #f5f5f5">
                                <div class="project-target-item">
                                    Проработка вопроса безопастности посадочной страницы (создание личного кабинета, исключение утечки информации по клиенту сторонним лицам) 
                                </div>
                            </div> -->

                        </div>
                    </div>
                </div>
              </div>

                <!--<hr>
                <h5 class="h5-class">
                    Цель проекта:
                </h5>
                <div  style="padding-left: 15px">
                    Увеличить выручку по зпч на 100млн р (20 млн р дохода) за счет доставки этих зпч клиентам , которые с нами не работают или работают мало, не всего потенциала  из-за отсутствия доставки
                </div> -->
                <!-- <h5 class="h5-class">
                    Итоги проекта:
                </h5>
                <div  style="padding-left: 15px">
                    Увеличина выручка по зпч на 200млн р (20 млн р дохода) за счет доставки этих зпч клиентам , которые с нами не работают или работают мало, не всего потенциала  из-за отсутствия доставки
                </div> -->
            </div>
        </div>

       <div class="card mb-3">
              
        </div>



       

    </div>

    <div class="col-xs-12 col-md-3 mb-2">
      <div class="card" style="padding-bottom: 20px;">
        <h5 class="card-header h5-class">
            <span style="display: inline-block;">Рабочая группа</span>
        </h5>
        <?php foreach ($project_group as $key => $group) { ?>
          <?php if ($userGroup != $group->id_project_user_group) : ?>
            <div class="work-group">
              <div class="work-group-title">
                <?= (ProjectUserGroup::find()->where(['id' => $group->id_project_user_group])->one())->name ?>
              </div>
          <? endif; ?>
          <div class="work-group-content">
            <span class="tooltipuser">
            <span data-default="<?= $group->id_user ?>" id="ajax_<?= $group->id_user ?>" class="ajax-user"></span>
            </span>
          </div>
          <?php if ($userGroup != $group->id_project_user_group) : ?>
            <?php $userGroup = $group->id_project_user_group ?>
            </div>
          <? endif; ?>
        <? } ?>

        <?php if (count($project_group) == 0) : ?>
          <center style="font-size: 11px; padding-top: 15px;"><b class="non-description">Рабочая группа не определена</b></center>
        <? endif; ?>
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
      'model' => 'video',
        'model_key' => $data['id'],
        'name_widget' => 'Форум',
    ]) ?>
  </div>
</div>
