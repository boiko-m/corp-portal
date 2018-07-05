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
                console.log('Ошибка. Данные не отправлены.');
            }
        });
        return false;
    }
);



jQuery(function($){
    $(document).mouseup(function (e){ // событие клика по веб-документу
        var width = $('#for-search').outerWidth();
        var width1 = $('#text-search').outerWidth();
        var div = $("#text-search");
        var div1 = $("#for-search");
        if ( div1.is(e.target) )  { //если клик был  по нашему блоку
            $('#text-search').css('width', width);
            $('#text-search').addClass('text-search-focus');
          /*  $('.close-search').css('right', width1);*/
        }
        else if(!div.is(e.target) && !div1.is(e.target) && div1.has(e.target).length === 0) {
            $('#text-search').css('width', '200px');
            $('#hidden-search-close').hide(1);
            $('#submitSearch').show();
            $('#text-search').removeClass('text-search-focus');
            div1.hide();
        }
    });
});



/*$(document).on('click', '#text-search',function(){*/
    $('#text-search').focus(function(){
    var width = $('#for-search').outerWidth();
    var width1 = $('#text-search').outerWidth();
    $('#text-search').addClass('text-search-focus');
    $('#text-search').css('width', width);
    $('#submitSearch').hide(1);
    if(width1 != width ){
        $('.close-search').css('right', width1 - width);
    }

    $('#hidden-search-close').show(100);// скрываем отображение лупы при клике

});


$('.full-search').css('left',20 + $('#full-search').width() );

$(document).on('click', '.close-search', function () {
    $('#text-search').val('');
});



$(document).ready(function(){
     $('.gift-in-view ').tooltip({ trigger: "click"});
});


$(document).on('mouseenter', '.ajax-user', function () {
    var id = $(this).attr('data-default');
    if($("#ajax_"+id).next().is('.toolajax')){
      /*  $('.toolajax').show();*/
        $("#ajax_"+id).next().show();
           }
    else{
        $.ajax({
            url: '/site/tooltip',
            type: "POST", //метод отправки
            data: {'data': id},
            success: function (response) {
                //Данные отправлены успешно
                $("#ajax_"+id).after(response);
            },
            error: function (response) { // Данные не отправлены
                alert('Ошибка. Данные не отправлены.');
            }
        });
    }
});
    $(document).on('mouseleave', '.tooltipuser', function () {
            $('.toolajax').hide();
        });

$(document).ready(function() {
    $('.ajax-user').each(function () {
        var id = $(this).attr('data-default');

        $.ajax({
            url: '/site/data',
            type: "post", //метод отправки
            data: {'data': id, _csrf: yii.getCsrfToken()},
            success: function (response) {
                $("#ajax_"+id).html(response);
            },
            error: function (response) { // Данные не отправлены
                console.log(response);
            }
        });
    });
});
$('.vote-toggle').click(function () {
    $('.glyphicon-heart').removeClass('active-like');
});