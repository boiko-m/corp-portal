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

