$(document).ready(function() {
    // Удаление кнопки для ресайза фото
    setTimeout(function() {
        if($("div.resize-cropbox").length > 0) {
            $("div.resize-cropbox").hide();
        }
    }, 1);

    $(document).on("submit", "form.crop-form", function(e) {
        if($(".cropped-images-cropbox img").length == 0) {
            e.preventDefault();
            alert('Необходимо выбрать и обезать изображение.');
        }
    });


});
