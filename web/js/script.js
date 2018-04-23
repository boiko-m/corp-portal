$(document).ready(function() {
    // Удаление кнопки для ресайза фото
    setTimeout(function() {
        if($("div.resize-cropbox").length > 0) {
            $("div.resize-cropbox").hide();
        }
    }, 1);
});
