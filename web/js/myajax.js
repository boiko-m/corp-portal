
	function loadimage($attr, $text = null) {
        if (!$text) {$text = "Загрузка";};
        $($attr).html('<div style = "text-align:center;"><div class="cssload-thecube"><div class="cssload-cube cssload-c1"></div><div class="cssload-cube cssload-c2"></div><div class="cssload-cube cssload-c4"></div><div class="cssload-cube cssload-c3"></div></div><div class="loadinfo">' + $text + '</div></div>');
    }

     function ajax($action = null, $data = null, $ajax_container = "ajax-container", $text = null) {
        $ajax_container = "#" + $ajax_container;
        loadimage($ajax_container, $text);
        $.ajax({
            url: $action + '/',
            data: $data,
            success: function (data, status) { // вешаем свой обработчик на функцию success
                $($ajax_container).html(data);
            }
        });

     }

	 function showVideoCategory(data) {
		 $('.tab-pane').removeClass('active');
		 $('.nav-link').removeClass('active');

		 $('#allvideo').addClass('active show');
		 $('a[href="#allvideo"]').addClass('active');

		 ajax('/video/allvideo', data, 'allvideo');
	 }

     function ajaxappend($action = null, $data = null, $ajax_container = "ajax-container") {
     	$next_ajax = '.' + $ajax_container + "-next";
        $ajax_container = "#" + $ajax_container;

        $($next_ajax).html('<div style = "text-align:center;"><div class="cssload-thecube"><div class="cssload-cube cssload-c1"></div><div class="cssload-cube cssload-c2"></div><div class="cssload-cube cssload-c4"></div><div class="cssload-cube cssload-c3"></div></div></div>');
        $.ajax({
            url: $action + '/',
            data: $data,
            success: function (data, status) { // вешаем свой обработчик на функцию success
            	$($next_ajax).remove();
                $($ajax_container).append(data);
            }
        });
     }

     function cur ($container = null) {
        var $prefix;
        var $error = {};

        $count_id = $("#" + $container).length;
        $count_class = $("." + $container).length;

        if ($count_class) { $prefix = "."}
        if ($count_id) { $prefix = "#"}

        $data_ajax = $($prefix + $container).attr("data-ajax");

        if ($data_ajax) {
            return $data_ajax;
        }

        if (!$prefix) { console.log('func.cur - Не найден контейнер: (#,.) ' + $container); }
        return false;
     }


     /*****************

        tajax('info', {
            container: 'ajax-info',  - контейнер в который выгрузит результат
            data : "user=123", - дата для ajax
            append: true, - добавить в контейнер или же обновить
            load: false, - будет ли загрузка
            text: 'Идет обновление пользователей. Ожидайте...' - текст в загрузке
        })

    *****************/

     function tajax($action = 'view', $params = null) {
        
        var $thishtml;
        var $prefix;
        var $result;

        if (!$params) { $params = {} }
        if (!$params.container) { $params.container = $action; }

        ///*******************
        $count_id = $("#" + $params.container).length;
        $count_class = $("." + $params.container).length;

        if ($count_class) { $prefix = "."}
        if ($count_id) { $prefix = "#"}

        $params.container = $prefix + $params.container;
        ///*******************


        $thishtml = $($params.container).html()


        if (!$params.load) { $params.load = true}

        if (!$params.text) { $params.text = "Загрузка..." }
        if ($params.load) {
            if (!$params.append) {
                $($params.container).html('<div><div class="cssload-thecube"><div class="cssload-cube cssload-c1"></div><div class="cssload-cube cssload-c2"></div><div class="cssload-cube cssload-c4"></div><div class="cssload-cube cssload-c3"></div></div><div class="loadinfo">' + $params.text + '</div></div>');
            } else {
                $($params.container + "next").html('<div style = "text-align:center;"><div class="cssload-thecube"><div class="cssload-cube cssload-c1"></div><div class="cssload-cube cssload-c2"></div><div class="cssload-cube cssload-c4"></div><div class="cssload-cube cssload-c3"></div></div></div>');
            }
        }

        if ($params.load) {
            $.ajax({
                url: $action + '/',
                data: $params.data,
                success: function (data, status) { // вешаем свой обработчик на функцию success
                    $result = data;
                    if ($result) {
                        if (!$params.append) {
                            $($params.container).html($result);
                        } else {
                            $($params.container).append($result);
                        }
                    }
                }
            });
        }
     }







