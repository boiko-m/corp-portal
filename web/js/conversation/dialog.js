$('body').delegate('.im-list-user-message-select', 'click', function() {
  $(".im-list-user-messages li").removeClass("im-list-user-message-choose")
  let thisElement = $(this)
  user_id = thisElement.attr('id')
  if (!checkDevice())
    thisElement.toggleClass("im-list-user-message-choose")
  $.ajax({
    url: '/im/dialog/choose-dialog',
    data: 'id=' + $(this).attr('id'),
    beforeSend: function() {
      $('.im-dialog-preview').show()
      $('.dialog-panel').hide()
      spinnerShow('.im-dialog-preview')
    },
    complete: function() {
      spinnerRemove()
    },
    success: function(data) {
      $('.im-dialog-preview').hide()
      $('.dialog-panel').show()
      $(this).children('.im-list-user-link').text()
      $('.im-dialog-header').children('a').attr('href', '/profiles/' + user_id)
      $('.im-dialog-panel-name').text(thisElement.children('div').children('span').text())
      $('.im-dialog-header-image').attr('src', thisElement.children('div').children('img').attr('src'))
      appendMessage(data)
      $("#slimmcroll-2").animate({ scrollTop: $('.im-dialog-list-messages').height() }, 10)
    },
    error: function(xhr, str){
      console.log('Возникла ошибка: ' + xhr.responseText)
    }
  });
});

$('#slimmcroll-2').slimScroll({
  railColor:'#FAFAFA',
  height: 'auto',
  position: 'right',
  distance: '15px',
  size: "6px",
  color: '#9ea5ab',
  start: 'bottom',
  alwaysVisible: false,
  railVisible: false,
  disableFadeOut: true
});

$('body').delegate('.im-icon-paper', 'click', function() {
  sendMessage()
});

$('.im-dialog-message-input').keypress(function() {
  if (event.which == 13) {
    event.preventDefault()
    sendMessage()
  }
  if (event.ctrlKey) {
    let txt = $('.im-dialog-message-input')
    txt.val(txt.val() + "\n")
  }
});


function checkDevice() {
  if(/Android|windows phone|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(window).width() < 1024)
    return true;
  else
    return false;
}

function spinnerShow(selector) {
  $(selector).show()
  $(selector).html('<div class="tajaxLoad tajax-vertigal-center"><div><div class="cssload-thecube"><div class="cssload-cube cssload-c1"></div><div class="cssload-cube cssload-c2 one"></div><div class="cssload-cube cssload-c4"></div><div class="cssload-cube cssload-c3"></div></div><div class="loadinfo">Загружается ...</div></div></div>');
}

function spinnerRemove() {
  $("div.tajaxLoad").remove()
}

function sendMessage() {
  let inputMessage = $('.im-dialog-message-input').val()
  $.ajax({
    url: '/im/dialog/send-message',
    data: 'id=' + user_id + '&message=' + inputMessage,
    success: function(data) {
      $('.im-dialog-message-input').val("")
    },
    error: function(xhr, str){
      console.log('Возникла ошибка: ' + xhr.responseText)
    }
  });
}

function appendMessage(data) {
  let result = $.parseJSON(data)
  $(".im-dialog-list-messages").empty()
  if (result != 0) {
    for(let i = 0; i < result.length; i++) {
      $('.im-dialog-list-messages').append('<li class="im-dialog-message-select" id-message=' +
       result[i].id + '><div class="im-dialog-message"><img src="http://portal.lbr.ru/img/user/thumbnail_' +
       result[i]['profileFrom'].img + '" alt="profilepicture" class="im-dialog-field-image"><a href=/profiles/' +
       result[i]['profileFrom'].id + ' target="_blank" class="im-message-user-link" style="color: #42648b; font-weight: 700;">' +
       result[i]['profileFrom'].first_name + '<span class="time" style="font-weight: 400;"> ' +
       moment.unix(result[i].create_at).format("HH:mm") + '</span></a><p class="message">' +
       result[i].message + '</p></div></li>')
    }
  } else {
    $('.im-dialog-list-messages').append('<li class="im-list-user-empty-search">Нет сообщений с данным сотрудником</li>')
  }
}