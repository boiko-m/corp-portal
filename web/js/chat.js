$(document).ready(function() {
  if(/Android|windows phone|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(window).width() < 1200) {
    $('.dialog-panel').css('display', 'none')
    $('.list-user-panel').removeClass('col-md-3')
    $('.list-user-panel').addClass('col-md-12')
    $('.im-icon-arrow').css('display', 'inline-block')
    $('.dialog-panel').removeClass('col-md-9')
    $('.dialog-panel').addClass('col-md-12')
  }
});

$(".im-list-user-message-select").click(function() {
  if(/Android|windows phone|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(window).width() < 1200) {
    $('.list-user-panel').css('display', 'none')
    $('.dialog-panel').css('display', 'block')
  }
});

$(".im-icon-arrow").click(function() {
  if(/Android|windows phone|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || $(window).width() < 1200) {
    $('.dialog-panel').css('display', 'none')
    $('.list-user-panel').css('display', 'block')
  }
});

$('.im-dialog-message-input').on('input', function (event) {
  let input_length = $(".im-dialog-message-input").val()
  if (input_length.length > 0) {
    $('.im-icon-microphone').animate({
      fontSize: '-=30',
      marginLeft: '10px',
      marginTop: '10px'
    }, 300, function() {
      $('.im-icon-microphone').css({'font-size': '30px', 'margin-left': '0', 'margin-top': '0'})
      $('.im-icon-microphone').hide()
      $('.im-icon-paper').show()
    });
  } else {
    $('.im-icon-paper').animate({
      fontSize: "-=30",
      marginLeft: '10px',
      marginTop: '10px'
    }, 300, function() {
      $('.im-icon-paper').css({'font-size': '30px', 'margin-left': '0', 'margin-top': '0'})
      $('.im-icon-microphone').show()
      $('.im-icon-paper').hide()
    });
  }
});

$(".im-list-user-message-select").click(function() {
  if(!/Android|windows phone|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && !($(window).width() < 1200)) {
    $(".im-list-user-messages li").removeClass("im-list-user-message-choose")
    $(this).toggleClass("im-list-user-message-choose")
  }
});

$( ".im-user-input-search" ).focus(function() {
  console.log('focus');
  $('.im-icon-plus').css('transform', 'rotate(45deg)')
});

$( ".im-user-input-search" ).focusout(function() {
  console.log('blur');
  $('.im-icon-plus').css('transform', 'rotate(45deg)')
});

$(".im-dialog-message-select").click(function() {
  $(this).toggleClass("im-dialog-message-choose")
});

$('#slimmcroll-1').slimScroll({
  railColor:'#FAFAFA',
  height: 'auto',
  position: 'right',
  size: "6px",
  color: '#9ea5ab',
  alwaysVisible: true,
  railVisible: true,
  disableFadeOut: true
});

$('#slimmcroll-2').slimScroll({
  railColor:'#FAFAFA',
  height: 'auto',
  // position: 'right',
  distance: '15px',
  size: "6px",
  color: '#9ea5ab',
  alwaysVisible: true,
  railVisible: true,
  disableFadeOut: true
});