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


function bytesToSize(bytes) {
 var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB']
 if (bytes == 0) return '0 Byte'
 var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)))
 return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i]
};