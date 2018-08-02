$( document ).ready(function() {
    if ($('#question').length == 0) {
      $('.qiestion-controle').hide();
      $('.wait-more').show();
    }
});

$('.carousel').carousel({
  interval: 20000,
})

$('#carouselExampleControls').on('slide.bs.carousel', function () {
  clearInputs();
})

$('#form_answer').bind('submit', function (e) {
  let answer = $('#form_answer').serializeArray();
  let question = $('#question.active');
  $.ajax({
    type: 'POST',
    url: '/questionnaire/user-answer',
    data: answer,
  	dataTYpe: 'json',
    success: function(data) {
  		clearInputs();

      $('#button-answer').attr('disabled', 'disabled');

  		$(question).fadeOut(1000, function() {
  			$('.thank-you').fadeIn(500, function() {
	  			setTimeout(function() {
            isExistNextOrPrev(question);
					}, 1000);
  			})
			});
    },
    error: function(xhr, str){
      alert('Возникла ошибка: ' + xhr.responseCode);
    }
  });
});

function clearInputs() {
	$("input[name='answer']").each(function(){
	  $(this).prop("checked", false);
 	});
}

function isExistNextOrPrev(question) {
  $('.thank-you').hide();
            
  if ($(question).next('#question').length) {
    $(question).next().addClass('active');
  } else if ($(question).prev('#question').length){
    $(question).prev().addClass('active');
  } else {
    $('.qiestion-controle').hide();
    $('.wait-more').show();
  }

  $(question).remove();
  $('#button-answer').removeAttr('disabled');
}