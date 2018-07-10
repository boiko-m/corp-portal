<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use ogheo\comments\widget\Comments;

$this->title = 'Проект "Индивидуальный план рекламы (ИПР)"';
$this->params['breadcrumbs'][] = "Проекты компании";
$this->params['breadcrumbs'][] = $this->title;
?>


<style>
    .work-group-title {
      padding: 10px 20px;
    }
    .work-group-content {
      margin-left: 40px;
    }
    .work-group-content a {
      display: block
    }
    .work-group-content small {
      color: black
    }
    h5 {
      font-size:20px!important;
    }
</style>

<style>
  .news-project-n div {
    padding: 0px;
  }
  .news-project-n {
    padding-top: 10px;
  }
  .news-project-n > div > div:nth-child(1) {
    color: grey;
    padding-right: 10px;
    margin-top: 5px;
    text-align: center;
    max-width: 12.66666%;
  }
  .news-project-n > div > div:nth-child(2) {
    font-size: 17px;
  }
  .news-project-n > div > div:nth-child(2) > input {
    width: 100%;
    margin-bottom: 5px;
  }
  .news-project-n > div:nth-child(2) > div:nth-child(1) {
    text-align: center;
    font-size: 12px;
  }
  .news-project-n > div:nth-child(2) > div:nth-child(2) {
    font-size: 13px;
    margin-top: -30px;
  }
  .news-project-n > div:nth-child(2) > div:nth-child(2) > textarea {
    width: 100%;
    margin-top: 10px;
  }
  .news-project-n > div:nth-child(3) > div:nth-child(2) > button {
    display: block;
    margin: 0 auto;
    margin-top: 5px;
  }
</style>

<style>
  .project-news-title {
    font-size: 14px;
    padding-left: 10px;
    padding-top: 3px;
  }
  .project-news-title a {
    font-size: 14px;
    color: #979797;
    transition: 0.3s;

  }
  .project-news-title a:hover {
    color: black;
  }
  .project-news-content {
    padding: 5px;
  }
  .project .btn-group {
    margin-top: 5px;
  }
  .work-group-view-content .btn-group {
    margin-top: 5px;
  }
  .work-group-view-content .btn {
    padding-top: 2px;
    padding-bottom: 2px;
  }
  .project-target-items {
    margin: 10px;
  }
  .project-target-items{
    padding: 10px;
    background: #f5f5f5;
    margin-top: 10px;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8!important;
  }
  .success-border {
    border: 1px solid #43c499!important;
  }
  .stage-goal > div {
    margin:10px;
    background: #f5f5f5;
    box-shadow: 0 1px 0 0 #d7d8db, 0 0 0 1px #e3e4e8!important;
  }

  .stage-goal > div > div {
    padding: 10px;
    font-size: 12px;
  }

  .stage-goal > div > div:nth-child(1) {
    border-right:1px solid #dbdbdb;
  }
  .colorgreen {
    color: #109d10
  }
  .colororange {
    color: #ff8f00;
  }
</style>

<div class="row">
  <div class="col-xs-12 col-md-9">
    <div class="card mb-3">
      <ul class="nav nav-tabs nav-justified nav-project tabs-bordered" >
        <li class="nav-item">
          <a href="#tab1" style="line-height: 1;" class="nav-link active" data-toggle="tab" aria-expanded="false">О проекте</a>
        </li>
        <li class="nav-item">
          <a href="#tab2" style = "line-height: 1;" class="nav-link" data-toggle="tab" aria-expanded="false">Цели</a>
        </li>
      </ul>

      <!-- <h5 class="card-header" id = "information">
          О проекте
      </h5> -->
      <div >
        <div class = "tab-content" style="padding-top: 10px">
          <div id = "tab1" class="tab-pane active" style="padding: 0px 20px 10px;">
            <div style="font-size: 11px;background: whitesmoke;padding: 10px;border-radius: 5px;">
              <b>Индивидуальный план рекламы (ИПР)</b> – проект, направленный на индивидуальный подход к каждому клиенту.
                Благодаря проекту, каждый клиент будет получать именно ту рекламу, которая для него интересна, по тем каналам связи, которые ему удобны. Это облегчит работу менеджеров, сократит трудозатраты на бесполезные рассылки КП и повысит результативность рекламы.
                Основным продуктом на первых этапах проекта станет посадочная страница, перейдя по ссылке на которую, клиент увидит перечень предложений, специально под его парк техники и возможности.
            </div>
            <hr>

            <div id="news">
              <h5>
                Движение по проекту:
              </h5>
            </div>

            <div class="news-project-n">
              <div class="row">
                <div class="col-md-2"><img src="/img/current-events-512.png" width="55"></div>
                <div class="col-md-10">Начали работу  над 2-м этапом проекта</div>
              </div>
              <div class="row">
                <div class="col-md-2">20.02.18</div>
                <div class="col-md-10">
                  <p>
                    Составлен индивидуальный план рекламы (ИПР)  для  30 клиентов. Сформирован стандартный перечень должностей и их ролию. Приведен в порядок моб телефоны, емэйлы, найти контакты соц сетей. Посадочная страница для клиента - персонализировать данные для клиента.
                  </p>
                  <p>
                    Составлен индивидуальный план рекламы (ИПР)  для  30 клиентов. Сформирован стандартный перечень должностей и их ролию. Приведен в порядок моб телефоны, емэйлы, найти контакты соц сетей. Посадочная страница для клиента - персонализировать данные для клиента.
                  </p>
                </div>
              </div>
            </div>

            <div class="news-project-n">
              <div class="row">
                <div class="col-md-2"><img src="/img/current-events-512.png" width="55"></div>
                <div class="col-md-10">Начали работу  над 1-м этапом проекта</div>
              </div>
              <div class="row">
                <div class="col-md-2">20.01.18</div>
                <div class="col-md-10">
                  <p>
                    Разработан индивидуальный план рекламы для 7 клиентов. Выработана методику поиска контактов. Составить прототип посадочной страницы по запчастям - со всей инфой по клиенту. Индивидуальная ссылка для клиента, по которой он перейдет на индивид посадочную страницу по зч.
                  </p>
                </div>
              </div>
            </div>

            <?php if(\Yii::$app->user->can("controlProject")): ?>
            <div class="news-project-n">
              <div class="row">
                <div class="col-md-2">
                  <img src="/img/current-events-512.png" width="55">
                </div>
                <div class="col-md-10">
                 <input type="text" name="" placeholder="Заголовок">
                </div>
              </div>
              <div class="row">
                <div class="col-md-2"><?= date('d.m.y', time()) ?></div>
                <div class="col-md-10">
                  <textarea placeholder="Содержание новости"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                  <button class="btn  waves-effect w-md btn-light" style="width: 50%">Опубликовать</button>
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
                      <div id="stage_project" class="tab-pane   " style="padding: 0px 10px 10px">

                        </div>
                        <div id="stage1" class="tab-pane   ">

                           <div style="padding: 0px 10px 10px;">
                              Цели этапа:
                            </div>
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



                          <div style="padding: 0px 10px 10px;">
                              Цели этапа:
                            </div>
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
                            <div style="padding: 0px 10px 10px;">
                              Цели этапа:
                            </div>
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
                            <div style="padding: 0px 10px 10px;">
                              Цели этапа:
                            </div>
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
                <h5>
                    Цель проекта:
                </h5>
                <div  style="padding-left: 15px">
                    Увеличить выручку по зпч на 100млн р (20 млн р дохода) за счет доставки этих зпч клиентам , которые с нами не работают или работают мало, не всего потенциала  из-за отсутствия доставки
                </div> -->
                <!-- <h5>
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
        <div class="card">
            <h3 class="card-header">
                <span style="display: inline-block;">Рабочая группа</span>
            </h3>

          <div class="work-group">
              <div class="work-group-title">
                  Руководитель проекта
              </div>
              <div class="work-group-content">
                <span class="tooltipuser">
                   <span data-default="3844" id="ajax_3844" class="ajax-user"></span>
              </span>
              </div>
          </div>

          <div class="work-group">
              <div class="work-group-title">
                  Скрам-мастер
              </div>
              <div class="work-group-content">
                  <a href="">Чиж А.</a> 
              </div>
          </div>

          <div class="work-group">
              <div class="work-group-title">
                  Команда
              </div>
              <div class="work-group-content">
                  <a href="">Власов С.</a>
                  <a href="">Гавриленко А.</a>
                  <a href="">Горустович Ю.</a>
                  <a href="">Савченко А.</a>
                  <a href="">Солтан Д.</a>
              </div>
          </div>

          <div class="work-group">
              <div class="work-group-title">
                  Привлеченный состав:
              </div>
              <div class="work-group-content">
                  <a href="">Жуковский Ю.</a>
                  <a href="">Дубовик С.</a>
                  <a href="">Бондарев С.</a><br>
              </div>
          </div>

          
        </div>
    </div>
</div>


<!-- 
<div id = "news">
    <h5>
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
    <?php echo \app\widgets\LbrComments::widget([
      'model' => 'video',
        'model_key' => $data['id'],
        'name_widget' => 'Форум',
    ]) ?>
  </div>
</div>
