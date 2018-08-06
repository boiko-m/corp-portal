<style>
    #sidebar-menu > ul > div > div > li > a {
        padding: 10px 10px;
    }
</style>

<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                
                <li class="menu-title p-0 ">
                    <div style="font-size:14px;color:#939393" class="pl-2">Меню</div>
                    <div>
                        <ul class="nav nav-tabs nav-justified nav-project tabs-bordered menu-me">
                            <li class="nav-item">
                                <a href="#menu-main" id-user-setting="1" style="touch-action: auto; pointer-events: auto;" data-toggle="tab" aria-expanded="false" class="nav-link <?= Yii::$app->setting->getValue('left-menu-tab-setting') == 1 ? 'active' : null ?> <?= Yii::$app->setting->getValue('left-menu-tab-setting') == null ? 'active' : null ?> trigger-left-menu-tab">
                                    Основное   
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#menu-work" id-user-setting="2" style="touch-action: auto; pointer-events: auto;" data-toggle="tab" aria-expanded="false" class="nav-link <?= Yii::$app->setting->getValue('left-menu-tab-setting') == 2 ? 'active' : null ?> trigger-left-menu-tab">
                                    Рабочее
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <div class="tab-content" style="padding: 0px;">
                    <div id = "menu-main" class="tab-pane <?= Yii::$app->setting->getValue('left-menu-tab-setting') == 1 ? 'fade active show' : null ?> <?= Yii::$app->setting->getValue('left-menu-tab-setting') == null ? 'fade active show' : null ?>">
                            <li>
                                <a href="/">
                                    <i class="fi-grid"></i> <span> Главная </span>
                                </a>
                            </li>

                            <li>
                                <a href="/profiles">
                                    <i class="dripicons-user-group"></i> <span> Сотрудники </span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="/project/"><i class="fi-share"></i> <span> Проекты компании </span></a>
                            </li>

                            <?if(\Yii::$app->user->can("viewScripts")):?>
                                <li>
                                    <a href="/broadcast"><i class="mdi mdi-access-point" style="color:<?=Yii::$app->setting->getValue('navbar-background-color')?>;font-weight: bold;font-size:24px"></i> <span> Трансляции </span></a>
                                </li>
                            <?endif;?>

                            <li> 
                                <a href="javascript: void(0);"><i class="fi-briefcase"></i> <span> Компания </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="https://www.lbr.ru/company/contacts/">Филиалы</a></li>
                                    <li><a href="/company/presentation">Презентация компании</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class=" dripicons-information"></i><span> База знаний </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="/knowledge/dictionary/">Словари и глоссарии</a></li>
                                    <li><a href="/training/">Обучающий материал</a></li>
                                    <li><a href="/video/">Видео материал</a></li>
                                    <li><a href="/knowledge/indebtedness/">Общение с клиентом по погашению просроченной задолжности</a></li>
                                </ul>
                            </li>


                            <li>
                                <a href="javascript: void(0);"><i class=" fi-help"></i><span> Помощь </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="/documents/it/">Часто задаваемые вопросы - Отдел ИТ</a></li>
                                    <li><a href="/help/">Инструкции от IT</a></li>
                                </ul>
                            </li>
                    </div>
                

                <div id = "menu-work" class="tab-pane <?= Yii::$app->setting->getValue('left-menu-tab-setting') == 2 ? 'fade active show' : null ?>">
                    <li>
                        <a href="/documents/catalog/">
                            <i class="dripicons-document"></i> <span> Каталоги </span>
                        </a>
                    </li>

                    <?if(\Yii::$app->user->can("viewOrdersClient")):?>
                        <li>
                            <a href="/ordersclient/">
                                <i class="dripicons-list"></i> <span> Заказ покупателя </span>
                            </a>
                        </li>
                    <?endif;?>

                    <?if(\Yii::$app->user->can("viewScripts")):?>
                        <li>
                            <a href="javascript: void(0);"><i class="dripicons-browser-upload"></i> <span> Рабочее место </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="/scripts/">Скрипты</a></li>
                            </ul>
                        </li>
                    <?endif;?>

                </div>

                </div>


            </ul>
        </div>
        <div class="clearfix"></div>
        
    </div>
</div>
