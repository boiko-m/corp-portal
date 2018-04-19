
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
