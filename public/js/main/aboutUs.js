$(function() {
    $('.about_us .direction a, .about_us_mobile .direction a').on('click', function() {
        $('html, body').animate({
            scrollTop: $(`#services`).offset().top - window.innerHeight * 0.1
        }, {
            duration: 1200,
            easing: "easeInOutCubic",
        });

        $('#services [data-groupname=' + $(this).data('groupname') + ']').trigger('click');
    });
});
