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
              <div class = "tab-content">
                
              
                <div id = "tab1" class="tab-pane active" style="padding: 0px 20px 10px;">
                    <div style="font-size: 11px;background: whitesmoke;padding: 10px;border-radius: 5px;">
                        <b>Индивидуальный план рекламы (ИПР)</b> – проект, направленный на индивидуальный подход к каждому клиенту.
                      Благодаря проекту, каждый клиент будет получать именно ту рекламу, которая для него интересна, по тем каналам связи, которые ему удобны. Это облегчит работу менеджеров, сократит трудозатраты на бесполезные рассылки КП и повысит результативность рекламы.
                      Основным продуктом на первых этапах проекта станет посадочная страница, перейдя по ссылке на которую, клиент увидит перечень предложений, специально под его парк техники и возможности.
                    </div>
 <hr> <br>
<div id = "news">
    <h5>
        Движение по проекту:
    </h5>
</div>


<div style="padding: 10px;">

  <div style="font-size: 17px">Начали работу  над 2-м этапом проекта</div>
    <div><small style="color:grey;font-size:10px">20.02.2018</small></div>
  <div>
    Составлен индивидуальный план рекламы (ИПР)  для  30 клиентов. Сформирован стандартный перечень должностей и их ролию. Приведен в порядок моб телефоны, емэйлы, найти контакты соц сетей. Посадочная страница для клиента - персонализировать данные для клиента.
  </div>

  <hr>

  <div style="font-size: 17px">Подвели итоги 1-го этапа проекта</div>
  <div><small style="color:grey;font-size:10px">20.01.2018</small></div>
  <div>
    Разработан индивидуальный план рекламы для 7 клиентов. Выработана методику поиска контактов. Составить прототип посадочной страницы по запчастям - со всей инфой по клиенту. Индивидуальная ссылка для клиента, по которой он перейдет на индивид посадочную страницу по зч.
  </div>

    
</div>
                </div>

                <div id = "tab2" class="tab-pane">
                    <ul class="nav nav-tabs nav-justified nav-project tabs-bordered" >
                      <li class="nav-item">
                            <a href="#stage_project" style="line-height: 1;" class="nav-link" data-toggle="tab" aria-expanded="false">Цель <br> проекта</a>
                        </li>
                        <li class="nav-item">
                            <a href="#stage1" style = "opacity: 0.4;line-height: 1;" class="nav-link" data-toggle="tab" aria-expanded="false">Этап 1 <br><small>21.02.2018</small></a>
                        </li>
                       <li class="nav-item">
                            <a href="#stage2" style = "opacity: 0.4;line-height: 1;" class="nav-link" data-toggle="tab" aria-expanded="false">Этап 2<br><small>25.04.2018</small></a>
                        </li>
                         <li class="nav-item">
                            <a href="#stage3" class="nav-link " style = "opacity: 0.4;line-height: 1;" data-toggle="tab" aria-expanded="false">Этап 3<br><small>21.06.2018</small></a>
                        </li>
                         <li class="nav-item">
                            <a href="#stage4" class="nav-link active" style = "line-height: 1;" data-toggle="tab" aria-expanded="false">Этап 4 <br> <small style="color: blue">23.07.2018</small></a>
                        </li>
                    </ul>
                    <div  class="tab-content">
                      <div id="stage_project" class="tab-pane   ">
                            stage_project
                        </div>
                        <div id="stage1" class="tab-pane   ">
                            stage1
                        </div>
                        <div id="stage2" class="tab-pane   ">
                            stage2
                        </div>
                        <div id="stage3" class="tab-pane  ">
                            stage3
                        </div>
                        <div id="stage4" class="tab-pane  show active ">
                            stage4
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
		<?php echo Comments::widget([
		    'model' => 'project_news',
		    'model_key' => $data['id']
		]); ?>
	</div>
</div>
