var user_id;

// ------------- Mobile version -------------
$(document).ready(function() {
  if(/Android|windows phone|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(window).width() < 1024) {
    $('.im-dialog-preview').hide()
    $('.list-user-panel').removeClass('col-md-3')
    $('.list-user-panel').addClass('col-md-12')
    $('.im-icon-arrow').show()
    $('.dialog-panel').removeClass('col-md-9')
    $('.dialog-panel').addClass('col-md-12')
  }
  getListDialogs();
});

$('body').delegate('.im-list-user-message-select','click',function() {
  if(/Android|windows phone|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(window).width() < 1024) {
    $('.list-user-panel').css('display', 'none')
    $('.dialog-panel').css('display', 'block')
  }
});

$('body').delegate('.im-icon-arrow','click',function() {
  if(/Android|windows phone|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(window).width() < 1024) {
    $('.dialog-panel').hide()
    $('.list-user-panel').show()
  }
});

$('body').delegate('.im-list-user-message-select','click',function() {
    $(".im-list-user-messages li").removeClass("im-list-user-message-choose")
    let thisElement = $(this)
    user_id = thisElement.attr('id')
    $(this).toggleClass("im-list-user-message-choose")
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
      },
      error: function(xhr, str){
        console.log('Возникла ошибка: ' + xhr.responseText)
      }
    });
});

// ------------- Mobile version -------------


// ------------- DropZone -------------
var dropDialog = document.getElementById('slimmcroll-2');
var dropZone = document.getElementById('drop-zone');
var dropFIles = [];
var countAttachments = 0;
var startUpload = function(files) {
  dropFIles.push(files)
  countAttachments += 1;
  $('.im-dialog-field').css('height', '315px')
  if (countAttachments <= 3) {
    $('.im-dialog-footer-attachments')
      .append('<div class="col-sm attachment"><i class="fa fa-file im-icon"></i><span>' 
        + files[0].name + '</span><p class="file-size">' 
        + bytesToSize(files[0].size) +'</p></div>')
  }
  console.log(dropFIles)
}

if (dropZone !== null) {
  dropZone.ondrop = function(e) {
    e.preventDefault()
    this.className = 'upload-drop-zone'
    $('.im-dialog-field').show()
    $('.upload-drop-zone').hide()

    startUpload(e.dataTransfer.files)
  }

  dropDialog.ondragover = function() {
    $('.im-dialog-field').hide()
    $('.upload-drop-zone').show()
    return false;
  }

  dropZone.ondragover = function() {
    this.className = 'upload-drop-zone drop'
    return false;
  }

  dropZone.ondragleave = function() {
    $('.im-dialog-field').show()
    $('.upload-drop-zone').hide()
    this.className = 'upload-drop-zone'
    return false;
  }
}

// ------------- DropZone -------------


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
  } else {
    alert('Open modal dialog')
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
    setTimeout(function(){
      $(".im-icon-plus").removeClass('rotate45')
      $(".im-icon-plus").removeClass('rotate-45')
    }, 600);
  }
});

// ------------- Rotate plus -------------


$('body').delegate('.im-dialog-message-select','click',function() {
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

$('#slimmcroll-2').slimScroll({
  railColor:'#FAFAFA',
  height: 'auto',
  position: 'right',
  distance: '15px',
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
  } else {
    $(".im-list-user-messages").empty()
    getListDialogs()
  }
});


$('body').delegate('.im-icon-paper','click',function() {
  let inputMessage = $('.im-dialog-message-input').val()
  $.ajax({
    url: '/im/dialog/send-message',
    data: 'id=' + user_id + '&message=' + inputMessage,
    success: function(data) {
      $('.im-dialog-list-messages').append('<li class="im-dialog-message-select"><div class="im-dialog-message"><img src="http://portal.lbr.ru/img/user/thumbnail_' +
       user_id + '.png" alt="profilepicture" class="im-dialog-field-image"><a href=' +
       user_id + ' class="im-message-user-link" style="color: #42648b; font-weight: 700;">' +
       'Имя отправителя' + '<span class="time" style="font-weight: 400;">' +
       ' 24:00' + '</span></a><p class="message">' +
       inputMessage + '</p></div></li>')
      $('.im-dialog-message-input').val("")
    },
    error: function(xhr, str){
      console.log('Возникла ошибка: ' + xhr.responseText)
    }
  });
});

// ------------- Ajax requests -------------



function bytesToSize(bytes) {
 var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB']
 if (bytes == 0) return '0 Byte'
 var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)))
 return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i]
};

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