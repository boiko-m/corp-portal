$(document).ready(function() {
    $(document).on('pjax:send', function(e) {
        if($(".preloader").length > 0)
            $(".preloader").show();
    });

    $(document).on('pjax:complete', function(e) {
        if($(".preloader").length > 0)
            $(".preloader").hide();
    });
})
