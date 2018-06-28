
$(function() {
    $(document).on('click', '.showModalButton', function (e){
        e.preventDefault();
        var data = $(this).attr('data');
        $.ajax({
            url: '/profiles/modal/',
            type: "POST", //метод отправки
            data: {'data':data},
            success: function (response) {
                var a = $.parseJSON(response);
                $('#modalHeader').addClass('card-header');
                $('#modalHeader').html('Отправить подарок <div class="box_x_button" aria-label="Закрыть" data-dismiss="modal" tabindex="0" role="button"></div>');
                $('.modal-dialog').addClass('modal-lg');
                $('.modal-dialog').removeClass('modal-gift');
                $('#modalContent').html(a[0]);
                $('#main-modal').addClass('show');
                $('#main-modal').modal('show');
                $('#main-modal').show();

                /*$('#main-modal').css({'display': 'block'});*/


            },
            error: function () { // Данные не отправлены
                alert('Ошибка. Данные не отправлены.');
            }
        });
        return false;
    })
});



    /*  {*/
    $(document).on('click', '.gift-button-view', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/profiles/giftmodal/',
            type: "POST", //метод отправки
            data: {'data':id},
            beforeSend(){
                $('#main-modal').hide();
                $('#modalContent').html('');
            },
            success: function (response) {
              /*  $('gift-button-view').attr({'data-toggle':'modal'});*/
                $('.modal-dialog').addClass('modal-gift');
                var a = $.parseJSON(response);
             $('#modalHeader').addClass('card-header');
                $('.modal-body').addClass('padding');
                $('#modalHeader').html(a[0]);
                 $('#modalContent').html(a[1]);
                $('#main-modal').addClass('show');
                $('#main-modal').modal('show');
                $('#main-modal').show();
            },
            error: function () {
                alert('Ошибка. Данные не отправлены.');
            }
        });
        return false;
    });

//крытие кнопки влево слайдера
var i = 0;
var col = [];
while (i < 6) {
    col[i] = 0;
    i++;
}
function functCalc(id, type) {
    if(type == 'right'){
        col[id] ++;
    }
    if(type == 'left'){
        col[id] --;
    }
    if(col[id] == 0){
        $('.left'+id).addClass('hidden');
    }

    else {
        $('.left'+id).removeClass('hidden');
    }

}


$(document).on("click", ".canСhoose", function(e) {//добавление подорка при клике в левую колонку
    var atr = $(this).attr('id');
    var src =  $(this).attr('src');
    var sumcoin = $(this).attr('data-sumcoin');
    var atr1 = $(this).attr('data-coin');
   /* var img ='<div class="row"> <div class=".col-xs-6"><img src="'+src+'" class=""' +
        ' style = "border-radius: 5px; height: 80px; width: 80px;"></div>' +
        '<div class=".col-xs-6 cost" style="line-height: 70px; padding: 10px">'+sumcoin+'</div></div>';*/
    $('.img-to-send').attr('src', src);
    $('.canСhoose').removeClass('shadow');
    $('.sum-coin').html(sumcoin);
    $("#"+atr ).addClass('shadow');
    //$('.choosenGift').html(img);
    $('#form-for-gift').removeClass('hidden');
    $('#giftuser-id_gift').val(atr);//в скрытые поля вставляем значения
    $('#giftuser-costcoin').val(atr1);
});
