$('.carousel').carousel({
  interval: 10000,
})

$('#carouselExampleControls').on('slide.bs.carousel', function () {
  clearInputs();
})

$('#form_answer').bind('submit', function (e) {
  let answer = $('#form_answer').serializeArray();
  let question = $('#question');
  answer.push({name: 'question', value: question.attr('id-question')});
  $.ajax({
    type: 'POST',
    url: '',
    data: answer,
  	dataTYpe: 'json',
    success: function(data) {
  		clearInputs();
  		$(question).fadeOut(1500, function() {
  			$('.thank-you').fadeIn(500, function() {
	  			setTimeout(function() {
					  $('.thank-you').hide();
	  				$(question).next().addClass('active');
						$(question).remove();
					}, 1500);
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