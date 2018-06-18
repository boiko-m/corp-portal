
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

    $('#MainForm').on('submit',

        function(){

            $.ajax({
                url:    '/search/',
                type:     "POST", //метод отправки
                data:  $(this).serialize(),
                beforeSend: function(){
                   var left = $('#text-search').offset().left;
                    $("#for-search").css('left', 15+left);
                    if ($("#text-search").val().length <= 1)
                    { $("#for-search").show();
                        $('#for-search').html('<div>Введите 2 и более символов</div>');
                        return false;
                    }
                   else if (document.getElementById("text-search").value == '')

                    { $("#for-search").show();
                        $('#for-search').html('<div>поле не может быть пустым</div>');
                        return false;
                    }
                    else {
                        $("#for-search").show();
                        $('#for-search').html('<div class = " tajaxLoad"><div><div class=" cssload-thecube"><div class=" cssload-cube cssload-c1"></div><div class="cssload-cube cssload-c2 one "></div><div class="cssload-cube cssload-c4"></div><div class="cssload-cube cssload-c3"></div></div><div class="loadinfo">Загружается ...</div></div></div>');

                    }

                },
                complete: function() {

                    $("div.tajaxLoad").remove();

                },
                success: function(response) {
                    //Данные отправлены успешно
                    $("#for-search").html(response);

                   },
                error: function(response) { // Данные не отправлены
                    alert('Ошибка. Данные не отправлены.');
                }
            });
            return false;
        }
    );
// закрытие поиска при клике вне блока
    jQuery(function($){
        $(document).mouseup(function (e){ // событие клика по веб-документу
            var div = $("#for-search");
            var div1 = $("#text-search");// тут указываем ID элемента
            if (!div.is(e.target) && !div1.is(e.target)  // если клик был не по нашему блоку
                && div.has(e.target).length === 0  && div1.has(e.target).length === 0) { // и не по его дочерним элементам
                div.hide(); // скрываем его
            }
        });
    });

    jQuery(function($){
        $(document).mouseup(function (e){ // событие клика по веб-документу
            var div = $("#for-search");
            var div1 = $("#text-search");// тут указываем ID элемента
            if (!div.is(e.target) // если клик был не по нашему блоку
                && div.has(e.target).length === 0 && !div1.is(e.target)) { // и не по его дочерним элементам
                div.hide(); // скрываем его
            }
        });
    });

    jQuery(function($){
        $(document).mouseup(function (e){ // событие клика по веб-документу
            var width = $('#for-search').outerWidth();
            var div = $("#text-search");
            var div1 = $("#for-search");
            if ( div1.is(e.target) )  { //если клик был не по нашему блоку и не по его дочерним элементам
                $('#text-search').css('width', width);
            }
            else if( div.is(e.target) )  { //если клик был не по нашему блоку и не по его дочерним элементам
                $('#text-search').css('width', width);
            }
            else if(!div.is(e.target) && !div1.is(e.target) && div1.has(e.target).length === 0) {

                     $('#text-search').css('width', '200px');
                $('#hidden-search-close').hide(1);
                $('#submitSearch').show();
            }

        });
    });
  /*  $("#text-search").focusout(function () {
        var div1 = $("#for-search"); // тут указываем ID элемента
        if (!div1.is(e.target) // если клик был не по нашему блоку
            && div1.has(e.target).length === 0) { // и не по его дочерним элементам
            $('#submitSearch').show();
            $('#hidden-search-close').hide();
        }
    });
*/

    $("#text-search").focusout(function () {

       /* */
    });

    $('#text-search').focus(function(){
        var width = $('#for-search').outerWidth();
        if( $(window).width() <= '1100' ){
            width = '200px';
        }
        else if($("body").is('.enlarged') && $(window).width() <= '1100' ){
            width = '200px';
        }
        $('#text-search').css('width', width);
        if( $(window).width() >= '1100' ) {
            $('.close').css('right', 210 - width);
        }

        $('#submitSearch').hide(1);
        $('.close').css('right', 210 - width);
        $('#hidden-search-close').show(500);// скрываем отображение лупы при клике


    });

    //для лайка убирает цвет из базы если был клик
    $('.vote-toggle').click(function () {
        $('.glyphicon-heart').removeClass('active-like');
    });







