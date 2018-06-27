// ------------- Mobile version -------------
$(document).ready(function() {
  if(/Android|windows phone|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(window).width() < 1024) {
    $('.im-dialog-preview').css('display', 'none')
    $('.list-user-panel').removeClass('col-md-3')
    $('.list-user-panel').addClass('col-md-12')
    $('.im-icon-arrow').css('display', 'inline-block')
    $('.dialog-panel').removeClass('col-md-9')
    $('.dialog-panel').addClass('col-md-12')
  }
});

$('body').delegate('.im-list-user-message-select','click',function() {
  if(/Android|windows phone|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(window).width() < 1024) {
    $('.list-user-panel').css('display', 'none')
    $('.dialog-panel').css('display', 'block')
  }
});

$('body').delegate('.im-icon-arrow','click',function() {
  if(/Android|windows phone|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(window).width() < 1024) {
    $('.dialog-panel').css('display', 'none')
    $('.list-user-panel').css('display', 'block')
  }
});

$('body').delegate('.im-list-user-message-select','click',function() {
  if(!/Android|windows phone|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && !($(window).width() < 1024)) {
    $(".im-list-user-messages li").removeClass("im-list-user-message-choose")
    $(this).toggleClass("im-list-user-message-choose")
    $('.im-dialog-preview').css('display', 'none')
    $('.dialog-panel').css('display', 'inline-block')
  }
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

dropZone.ondrop = function(e) {
  e.preventDefault()
  this.className = 'upload-drop-zone'
  $('.im-dialog-field').css('display', 'block')
  $('.upload-drop-zone').css('display', 'none')

  startUpload(e.dataTransfer.files)
}

dropDialog.ondragover = function() {
  $('.im-dialog-field').css('display', 'none')
  $('.upload-drop-zone').css('display', 'block')
  return false;
}

dropZone.ondragover = function() {
  this.className = 'upload-drop-zone drop'
  return false;
}

dropZone.ondragleave = function() {
  $('.im-dialog-field').css('display', 'block')
  $('.upload-drop-zone').css('display', 'none')
  this.className = 'upload-drop-zone'
  return false;
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
    $(".im-list-user-messages").empty();
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
  $(".im-icon-plus").addClass('rotate-45')
  setTimeout(function(){
    $(".im-icon-plus").removeClass('rotate45')
    $(".im-icon-plus").removeClass('rotate-45')
  }, 600);
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
  // distance: '15px',
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


function bytesToSize(bytes) {
 var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
 if (bytes == 0) return '0 Byte';
 var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
 return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
};


// ------------- Ajax requests -------------

$('.im-user-input-search').on('input', function(){ 
  let inputValue = $('.im-user-input-search').val();
  if (inputValue.length > 3) {
    $.ajax({
      url: '/im/dialog/search-employees',
      data: 'text=' + inputValue,
      success: function(data) {
        $(".im-list-user-messages").empty();
        var result = $.parseJSON(data);
        for(var i = 0; i < result.length; i++){
          $('.im-list-user-messages').append('<li class="im-list-user-message-select" id="' + 
            result[i].id + '"><div class="im-list-user-message"><img src="http://portal.lbr.ru/img/user/thumbnail_' +
            result[i].img + '" alt="profilepicture" class="im-list-user-field-image"><span class="im-list-user-link">' +
            result[i].first_name + ' ' + result[i].last_name + '</span><p class="message-list-user">Нет сообщений</p></div></li>');
        }
      },
      error: function(xhr, str){
        console.log('Возникла ошибка: ' + xhr.responseText);
      }
    });
  }
});

// ------------- Ajax requests -------------