var colorsStatus = { 'Завершен': 'grey', 'В работе': 'green' };

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

// Search for projects
$('#search_project').on('input', function() { 
  let inputValue = $('#search_project').val()
  if (inputValue.length > 2) {
    $.ajax({
      type: 'POST',
      url: '/project/find-project',
      data: 'text=' + inputValue,
      success: function(data) {
        let result = $.parseJSON(data);
        $('.project-table').empty();
        if (result.length != 0) {
          for(let i = 0; i < result.length; i++) {
            let project = '<div class="row project"><div class="col-md-10 project-name border-right-none"><span class="d-none d-lg-inline-block pr-0 icon-project"><i class="fa fa-share-alt"></i></span>';
            if (result[i]['active'])
              project += '<a href="/project/info/' + result[i]["id"] + '" style="display: inline-block; height: 20px; margin-left: 5px;"><h5 class="card-title">' + result[i]["name"] + '</h5></a>';
            else
              project += '<span style="display: inline-block; height: 20px;"><h5 class="card-title" style="color: gray; margin-left: 5px;">' + result[i]["name"] + '</h5></span>';
            if (result[i]["description_visible"])
              project += '<div class="project-addition-none project-list-addition"><div><small class="description">' + result[i]["description"] + '</small></div></div>';
            project += '</div><div class="col-md-2 text-center project-status" style="color: ' +
              colorsStatus[result[i]["status"]] + '"><span>' +
              result[i]["status"] + '</span></div></div>';
            $('.project-table').append(project);   
          }
        } 
      },
      error: function(xhr, str){
        console.log('Возникла ошибка: ' + xhr.responseText)
      }
    });
  } else
      getProjects();
});

function getProjects() {
  $.ajax({
      type: 'GET',
      url: '/project/get-all-projects',
      success: function(data) {
        let result = $.parseJSON(data);
        $('.project-table').empty();
        for(let i = 0; i < result.length; i++) {
          let project = '<div class="row project"><div class="col-md-10 project-name border-right-none"><span class="d-none d-lg-inline-block pr-0 icon-project"><i class="fa fa-share-alt"></i></span>';
          if (result[i]['active'])
            project += '<a href="/project/info/' + result[i]["id"] + '" style="display: inline-block; height: 20px; margin-left: 5px;"><h5 class="card-title">' + result[i]["name"] + '</h5></a>';
          else
            project += '<span style="display: inline-block; height: 20px;"><h5 class="card-title" style="color: gray; margin-left: 5px;">' + result[i]["name"] + '</h5></span>';
          if (result[i]["description_visible"])
            project += '<div class="project-addition-none project-list-addition"><div><small class="description">' + result[i]["description"] + '</small></div></div>';
          project += '</div><div class="col-md-2 text-center project-status" style="color: ' +
            colorsStatus[result[i]["status"]] + '"><span>' +
            result[i]["status"] + '</span></div></div>';
          $('.project-table').append(project);   
        }
      },
      error: function(xhr, str){
        console.log('Возникла ошибка: ' + xhr.responseText)
      }
    });
}