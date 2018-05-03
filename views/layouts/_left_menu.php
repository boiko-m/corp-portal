<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">ЛБР-Агромаркет</li>
                <li>
                    <a href="/">
                        <i class="fi-grid"></i> <span> Главная </span>
                    </a>
                </li>

                <?if(\Yii::$app->user->can("viewOrdersClient")):?>
                    <li>
                        <a href="/ordersclient/">
                            <i class="dripicons-list"></i> <span> Мои заказы </span>
                        </a>
                    </li>
                <?endif;?>


                <?if(\Yii::$app->user->can("viewScripts")):?>
                    <li>
                        <a href="javascript: void(0);"><i class="dripicons-browser-upload"></i> <span> Рабочее место </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="/scripts/">Скрипты</a></li>
                        </ul>
                        <!-- <ul class="nav-second-level nav collapse" aria-expanded="false">
                            <li><a href="javascript: void(0);">Скрипты <span class="menu-arrow"></span></a>
                                <ul class="nav-third-level nav collapse" aria-expanded="false">
                                    <li><a href="javascript: void(0);">энергонасыщенные тракторы</a></li>
                                    <li><a href="javascript: void(0);">прикатывающие катки</a></li>
                                    <li><a href="javascript: void(0);">навесное оборудование к фронтальным погрузчикам</a></li>
                                    <li><a href="javascript: void(0);">косилки</a></li>
                                </ul>
                            </li>
                        </ul> -->
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
                    <a href="/profiles">
                        <i class="dripicons-user-group"></i> <span> Сотрудники </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fi-file"></i><span> Документы </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/documents/it/">Часто задаваемые вопросы - Отдел ИТ</a></li>
                        <li><a href="/documents/catalog/">Доступ к каталогам компании</a></li>
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
                    <a href="javascript:void(0);">
                        <i class="fi-help"></i> <span> Помощь сотруднику </span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
