var user_id;


// ------------- Mobile version -------------
$(document).ready(function() {
  if (checkDevice()) {
    $('.im-dialog-preview').hide()
    $('.list-user-panel').removeClass('col-md-3')
    $('.list-user-panel').addClass('col-md-12')
    $('.im-icon-arrow').show()
    $('.dialog-panel').removeClass('col-md-9')
    $('.dialog-panel').addClass('col-md-12')
  }
  getListDialogs();
});

$('body').delegate('.im-list-user-message-select', 'click',function() {
  if (checkDevice()) {
    $('.list-user-panel').css('display', 'none')
    $('.dialog-panel').css('display', 'block')
  }
});

$('body').delegate('.im-icon-arrow', 'click', function() {
  if (checkDevice()) {
    $('.dialog-panel').hide()
    $('.list-user-panel').show()
  }
});
// ------------- Mobile version -------------


// $('.im-dialog-message-input').on('input', function (event) {
//   let input_length = $(".im-dialog-message-input").val()
//   if (input_length.length > 0) {
//     $('.im-icon-microphone').animate({
//       fontSize: '-=30',
//       marginLeft: '10px',
//       marginTop: '10px'
//     }, 300, function() {
//       $('.im-icon-microphone').css({'font-size': '30px', 'margin-left': '0', 'margin-top': '0'})
//       $('.im-icon-microphone').hide()
//       $('.im-icon-paper').show()
//     });
//   } else {
//     $('.im-icon-paper').animate({
//       fontSize: "-=30",
//       marginLeft: '10px',
//       marginTop: '10px'
//     }, 300, function() {
//       $('.im-icon-paper').css({'font-size': '30px', 'margin-left': '0', 'margin-top': '0'})
//       $('.im-icon-microphone').show()
//       $('.im-icon-paper').hide()
//     });
//   }
// });

$(".im-list-user-message-select").on({
  mouseenter: function () {
    if (!$('.im-list-user-message-select').hasClass('.im-list-user-message-choose'))
      $(this).toggleClass("im-list-user-message-select-hover")
  },
  mouseleave: function () {
    if (!$('.im-list-user-message-select').hasClass('.im-list-user-message-choose'))
      $(this).toggleClass("im-list-user-message-select-hover")
  }
});


// ------------- Search icons clear -------------

$(".im-icon-plus").on('click', function() {
  if ($('.im-icon-plus').hasClass('rotate45')) {
    $('.im-user-input-search').val("")
    $(".im-list-user-messages").empty()
    getListDialogs()
    $(".im-icon-plus").addClass('rotate-45')
    setTimeout(function(){
      $(".im-icon-plus").removeClass('rotate45')
      $(".im-icon-plus").removeClass('rotate-45')
    }, 600);
  }
});

// ------------- Search icons clear -------------


// ------------- Rotate plus -------------

$( ".im-user-input-search" ).focus(function() {
  $(".im-icon-plus").addClass('rotate45')
});

$( ".im-user-input-search" ).focusout(function() {
  let inputValue = $('.im-user-input-search').val()
  if (inputValue.length == 0) {
    $(".im-list-user-messages").empty();
    $(".im-icon-plus").addClass('rotate-45')
    $(".im-icon-plus").removeAttr('rotate-45')
    setTimeout(function(){
      $(".im-icon-plus").removeClass('rotate45')
      $(".im-icon-plus").removeClass('rotate-45')
    }, 600);
  }
});

// ------------- Rotate plus -------------


$('body').delegate('.im-dialog-message-select', 'click', function() {
  $(this).toggleClass("im-dialog-message-choose")
});


// ------------- Scrolle -------------

$('#slimmcroll-1').slimScroll({
  railColor:'#FAFAFA',
  height: 'auto',
  position: 'right',
  size: "6px",
  color: '#9ea5ab',
  alwaysVisible: false,
  railVisible: false,
  disableFadeOut: true
});

// ------------- Scrolle -------------


// ------------- Ajax requests -------------

$('.im-user-input-search').on('input', function(){ 
  let inputValue = $('.im-user-input-search').val()
  if (inputValue.length > 2) {
    $.ajax({
      url: '/im/dialog/search-employees',
      data: 'text=' + inputValue,
      beforeSend: function() {
        spinnerShow('.im-list-user-messages')
      },
      complete: function() {
        spinnerRemove()
      },
      success: function(data) {
        appendListDialog(data)
      },
      error: function(xhr, str){
        console.log('Возникла ошибка: ' + xhr.responseText)
      }
    });
  } else if (inputValue.length == 0) {
    $(".im-list-user-messages").empty()
    getListDialogs()
  }
});


// ------------- Ajax requests -------------


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

function getListDialogs() {
  $.ajax({
    url: '/im/dialog/list-dialogs',
    beforeSend: function() {
      spinnerShow('.im-list-user-messages')
    },
    complete: function() {
      spinnerRemove()
    },
    success: function(data) {
      let result = $.parseJSON(data);
      $(".im-list-user-messages").empty()
      if (result.length != 0) {
        for(let i = 0; i < result.length; i++) {
          $('.im-list-user-messages').append('<li class="im-list-user-message-select" id="' + 
            result[i][0]['profile'].id + '"><div class="im-list-user-message"><img src="http://portal.lbr.ru/img/user/thumbnail_' +
            result[i][0]['profile'].img + '" alt="profilepicture" class="im-list-user-field-image"><span class="im-list-user-link">' +
            result[i][0]['profile'].first_name + ' ' + result[i][0]['profile'].last_name + '</span><p class="message-list-user">Нет сообщений</p></div></li>');
        }
      } else {
        $('.im-list-user-messages').append('<li class="im-list-user-empty-search">У вас нет диалогов</li>')
      }
    },
    error: function(xhr, str){
      console.log('Возникла ошибка: ' + xhr.responseText)
    }
  });
}

function appendListDialog(data) {
  let result = $.parseJSON(data)
  $(".im-list-user-messages").empty()
  if (result.length != 0) {
    for(let i = 0; i < result.length; i++) {
      $('.im-list-user-messages').append('<li class="im-list-user-message-select" id="' + 
        result[i].id + '"><div class="im-list-user-message"><img src="http://portal.lbr.ru/img/user/thumbnail_' +
        result[i].img + '" alt="profilepicture" class="im-list-user-field-image"><span class="im-list-user-link">' +
        result[i].first_name + ' ' + result[i].last_name + '</span><p class="message-list-user">Нет сообщений</p></div></li>');
    }
  } else {
    $('.im-list-user-messages').append('<li class="im-list-user-empty-search">Нет результатов поиска</li>')
  }
}