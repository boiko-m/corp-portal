//Обработка клика на стрелку вправо
$(document).on('click', ".carousel-button-right",function(){ 
	var carusel = $(this).parents('.carousel');
	right_carusel(carusel);
	return false;
});
//Обработка клика на стрелку влево
$(document).on('click',".carousel-button-left",function(){ 
	var carusel = $(this).parents('.carousel');
	left_carusel(carusel);
	return false;
});
function left_carusel(carusel){
   var block_width = $(carusel).find('.carousel-block').outerWidth();
   $(carusel).find(".carousel-items .carousel-block").eq(-1).clone().prependTo($(carusel).find(".carousel-items")); 
   $(carusel).find(".carousel-items").css({"left":"-"+block_width+"px"});
   $(carusel).find(".carousel-items .carousel-block").eq(-1).remove();    
   $(carusel).find(".carousel-items").animate({left: "0px"}, 200); 
   
}
function right_carusel(carusel){
   var block_width = $(carusel).find('.carousel-block').outerWidth();
   $(carusel).find(".carousel-items").animate({left: "-"+ block_width +"px"}, 200, function(){
	  $(carusel).find(".carousel-items .carousel-block").eq(0).clone().appendTo($(carusel).find(".carousel-items")); 
      $(carusel).find(".carousel-items .carousel-block").eq(0).remove(); 
      $(carusel).find(".carousel-items").css({"left":"0px"}); 
   }); 
}

$(function() {
//Раскомментируйте строку ниже, чтобы включить автоматическую прокрутку карусели
//	auto_right('.carousel:first');
})

// Автоматическая прокрутка
function auto_right(carusel){
	setInterval(function(){
		if (!$(carusel).is('.hover'))
			right_carusel(carusel);
	}, 1000)
}
// Навели курсор на карусель
$(document).on('mouseenter', '.carousel', function(){$(this).addClass('hover')})
//Убрали курсор с карусели
$(document).on('mouseleave', '.carousel', function(){$(this).removeClass('hover')})

$(document).on("click", ".canСhoose", function(e) {
    var atr = $(this).attr('id');
    var src =  $(this).attr('src');
    var img ='<img src="'+src+'" class="gift-to-send" style = "border-radius: 5px; height: 80px; width: 80px; align: center;">';
    var atr1 = $(this).attr('data-coin');
    $('.canСhoose').removeClass('shadow');
    $("#"+atr ).addClass('shadow');
    $('.choosenGift').html(img);
    $('#form-for-gift').removeClass('hidden');
    $('#giftuser-id_gift').val(atr);
    $('#giftuser-costcoin').val(atr1);
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



$(function(){
    $('#slimmcroll').slimScroll({
        height: '400px',
        railVisible: true,
    });
});
