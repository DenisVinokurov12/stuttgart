$(function() {
    $('.category_services .sign_up .button').on('click', function () {
        let serviceName = $(this).data('service');

        $(`#form .form_controls .form_select .dropdown [data-name=${serviceName}]`).trigger('mousedown');

        $('html, body').animate({
            scrollTop: $(`#form`).offset().top - window.innerHeight * 0.1
        }, {
            duration: 1500,
            easing: "easeInOutCubic",
        });
    });
});
