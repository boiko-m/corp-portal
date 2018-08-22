$( "#link_video" ).on( "click", "button", function() {
  let link_video = $('#link_video').serialize();
  $.ajax({
    type: 'POST',
    url: 'create',
    data: link_video,
    success: function(data) {},
    error: function(xhr, str){
      console.log('Возникла ошибка: ' + xhr.responseText)
    }
  });
});


$( "#link_file" ).on( "click", "button", function() {
  let link_file = $('#link_file').serialize();
  $.ajax({
    type: 'POST',
    url: 'create',
    data: link_file,
    success: function(data) {},
    error: function(xhr, str){
      console.log('Возникла ошибка: ' + xhr.responseText)
    }
  });
});

