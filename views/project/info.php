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
</style>

<div class="row">
    <div class="col-xs-12 col-md-7 ">
        <div class="card">

            <h5 class="card-header" id = "information">
                Индивидуальный план рекламы (ИПР)
            </h5>
            <div style="padding: 20px;">
                <h5>
                   О проекте
                </h5>
                <div class="" style="padding-left: 15px">
                    Индивидуальный план рекламы (ИПР) – проект, направленный на индивидуальный подход к каждому клиенту.
    Благодаря проекту, каждый клиент будет получать именно ту рекламу, которая для него интересна, по тем каналам связи, которые ему удобны. Это облегчит работу менеджеров, сократит трудозатраты на бесполезные рассылки КП и повысит результативность рекламы.
    Основным продуктом на первых этапах проекта станет посадочная страница, перейдя по ссылке на которую, клиент увидит перечень предложений, специально под его парк техники и возможности.
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
    </div>

    <div class="col-xs-12 col-md-5">

        <div class="card">
            <h5 class="card-header">
                <span style="display: inline-block;">Рабочая группа</span> <a href=""><i class="mdi mdi-settings" style="display: inline-block;"></i></a>
            </h5>
            <div style="font-size: 20px;" >

        </div>
        <div class="work-group">
            <div class="work-group-title">
                Руководитель проекта
            </div>
            <div class="work-group-content">
                <a href="">Масюк Е.</a>
            </div>
        </div>

        <div class="work-group">
            <div class="work-group-title">
                Команда
            </div>
            <div class="work-group-content">
                <a href="">Власов С. <small>c 2.12.2018</small></a>
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
                <a href="">Бондарев С.</a>
            </div>
        </div>

        <div class="work-group">
            <div class="work-group-title">
                Скрам мастер
            </div>
            <div class="work-group-content">
                <a href="">Чиж А.</a> <br>
            </div>
        </div>


        </div>
    </div>
</div>



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

</div>

<div class="row">
	<div class="col-12">
		<?php echo Comments::widget([
		    'model' => 'project_news',
		    'model_key' => $data['id']
		]); ?>
	</div>
</div>
