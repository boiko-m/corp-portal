$('.search-create-group').on('input', function(){ 
  let inputValue = $('.search-create-group').val()
  if (inputValue.length > 2) {
    $.ajax({
      url: '/im/dialog/search-employees',
      data: 'text=' + inputValue,
      beforeSend: function() {
        spinnerShow('.inbox-widget')
      },
      complete: function() {
        spinnerRemove()
      },
      success: function(data) {
        appendListGroup(data)
      },
      error: function(xhr, str){
        console.log('Возникла ошибка: ' + xhr.responseText)
      }
    });
  } else if (inputValue.length == 0) {
    $(".inbox-widget").empty()
    $('.inbox-widget').append('<p class="info-create-group text-center">Здесь будут отображаться результаты поиска</p>');
  }
});

function appendListGroup(data) {
  let result = $.parseJSON(data)
  $(".inbox-widget").empty()
  if (result.length != 0) {
    for(let i = 0; i < result.length; i++) {
      $('.inbox-widget').append('<a href="' + 
        result[i].id  + '" id="employeer-group-search"><input type="checkbox" id="' +
        result[i].id + '" class="checkbox-create-group" name=""><div class="inbox-item"><div class="inbox-item-img"><img src="http://portal.lbr.ru/img/user/thumbnail_' +
        result[i].img + '" class="rounded-circle bx-shadow-lg" alt=""></div><p class="inbox-item-author">' +
        result[i].first_name + ' ' + result[i].last_name + '</p></div></a>');
    }
  } else {
    $('.inbox-widget').append('<p class="info-create-group text-center">Нет результатов поиска</p>');
  }
}

function spinnerShow(selector) {
  $(selector).show()
  $(selector).html('<div class="tajaxLoad tajax-vertigal-center"><div><div class="cssload-thecube"><div class="cssload-cube cssload-c1"></div><div class="cssload-cube cssload-c2 one"></div><div class="cssload-cube cssload-c4"></div><div class="cssload-cube cssload-c3"></div></div><div class="loadinfo">Загружается ...</div></div></div>');
}

function spinnerRemove() {
  $("div.tajaxLoad").remove()
}