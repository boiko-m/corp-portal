<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Проект "Доставки запчастей до двери клиента"';
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
        <div class="card-box">

            <h5 class="card-title" id = "information">
                О проекте
            </h5>
            <div class="small">
                Доставка запчастей до двери клиента в оговоренные с ним сроки и по рыночным ценам позволит нам быть конкурентноспособными на рынке,   удержать старых и привлечь новых клиентов,   и  за счет этого   увеличить доход от продажи запчастей . Для того,  чтобы  такая доставка стала доступной в оперативном режиме, следует разработать и внедрить механизм автоматического расчета стоимости и сроков доставки .  В результате чего должны получить понятную  и удобную систему работы:  для продавцов запчастей   (расчет стоимости и сроков доставки в заказе покупателя) , для  логистов (своевременная и точная информация  для заказа транспорта и доставки); для Клиентов - оперативную информацию по ценам с доставкой и срокам доставки (счет на оплату). Внедрение разработанного механизма , применение его на практике и соблюдение озвученных условий перед клиентом , поможет получить довольного клиента.  
            </div>
            <br>
            <h5>
                Цель проекта:
            </h5>
            <div class="small">
                Увеличить выручку по зпч на 100млн р (20 млн р дохода) за счет доставки этих зпч клиентам , которые с нами не работают или работают мало, не всего потенциала  из-за отсутствия доставки
            </div>
            <br>
            <h5>
                Итоги проекта:
            </h5>
            <div class="small">
                Увеличина выручка по зпч на 200млн р (20 млн р дохода) за счет доставки этих зпч клиентам , которые с нами не работают или работают мало, не всего потенциала  из-за отсутствия доставки
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-5 card-box">
        <div style="font-size: 20px;" >
            <span style="display: inline-block;">Рабочая группа</span> <a href=""><i class="mdi mdi-settings" style="display: inline-block;"></i></a>
        </div>
        <div class="work-group">
            <div class="work-group-title">
                Руководитель проекта
            </div>
            <div class="work-group-content">
                <a href="">Савченко А. Е.</a>
            </div>
        </div>

        <div class="work-group">
            <div class="work-group-title">
                Команда
            </div>
            <div class="work-group-content">
                <a href="">Червяков Д. В. <small>c 2.12.2018</small></a> 
                <a href="">Тищенко А. В.</a>
                <a href="">Сасько А. С.</a>
                <a href="">Ничипор О.</a>
            </div>
        </div>

        <div class="work-group">
            <div class="work-group-title">
                Скрам мастер
            </div>
            <div class="work-group-content">
                <a href="">Михлай И. К.</a>
            </div>
        </div>

        <div class="work-group">
            <div class="work-group-title">
                * Дополнительная группа <br> <small>(доступно только автору)</small>
            </div>
            <div class="work-group-content">
                <a href="">Абметка И.В.</a>
            </div>
        </div>


    </div>

</div>



<div id = "news">
    <h5>
                Новости проекта
            </h5>
</div>
<div class="row">
            <div class="col-xs-3 col-md-3">
                <div class = "card-box">
                    <h6 style="text-align: center;">
                        Начата работа над 1-м этапом проекта
                    </h6>
                    <div>
                        <small>
                            20.04.2018
                        </small>
                    </div>
                    <div style="text-align: justify!important;">
                        <small style="">
                            Для того , чтобы  привлечь клиентов на первом этапе ,  рассылаем КП с предложением доставки бесплатной для клиента. 
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
                        Начинаем первые отгрузки в рамках проекта:
                    </h6>
                    <div>
                        <small>
                            20.03.2018
                        </small>
                    </div>
                    <div style="text-align: justify!important;">
                        <small style="">
                            Отгрузить зпч с доставкой 20 клиентам, с которыми не работали более 1 года 
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
                        Подвели итоги 1-го этапа проекта
                    </h6>
                    <div>
                        <small>
                            20.02.2018
                        </small>
                    </div>
                    <div style="text-align: justify!important;">
                        <small style="">
                            Врамках этого  этапа  выполнили   первые доставки  запчастей , в т.ч бесплатные ,  клиенту.    Но  количество доставок получилось меньше, чем мы планировали , также не понятно не подвели ли мы клиентов со сроками поставки,   поэтому этап закрыли с оценкой Удовлетворительно (желтая зона).
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
                            В планах внедрение и отработка системы на практике , получение обратной связи. Работа над улучшением качества и соблюдением сроков доставки .  Также разбираемся с экономикой  - доходность заказов с доставкой (от алгоритма расчета и соответствующих изменений в учете  до выработки  и автоматизации условий,  при которых возможна бесплатная доставка)
                        </small>
                    </div>
                    <div style="text-align: right">
                        <a href="">Открыть новость</a>
                    </div>
                </div>
            </div>

</div>
