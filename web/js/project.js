$( "#link_video" ).on( "click", "button", function() {
  let link_video = $('#link_video').serialize();
  $.ajax({
    type: 'POST',
    url: 'create',
    data: link_video,
    // beforeSend: function() {
    //   $('.im-dialog-preview').show()
    //   $('.dialog-panel').hide()
    //   spinnerShow('.im-dialog-preview')
    // },
    // complete: function() {
    //   spinnerRemove()
    // },
    success: function(data) {
      console.log(data);
    },
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
    // beforeSend: function() {
    //   $('.im-dialog-preview').show()
    //   $('.dialog-panel').hide()
    //   spinnerShow('.im-dialog-preview')
    // },
    // complete: function() {
    //   spinnerRemove()
    // },
    success: function(data) {
      
    },
    error: function(xhr, str){
      console.log('Возникла ошибка: ' + xhr.responseText)
    }
  });
});