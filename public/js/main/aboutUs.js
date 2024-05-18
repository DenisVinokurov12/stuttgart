$(function() {
    var matchMedia = window.matchMedia('(max-width: 768px)');
    var serviceId = matchMedia.matches ? `#services_mobile` : `#services`;

    $('.about_us .direction a, .about_us_mobile .direction a').on('click', function(e) {
        e.stopPropagation();

        console.log(serviceId + (matchMedia.matches ? ` [data-groupname=${$(this).data('groupname')}]` : ''));

        $('html, body').animate({
            scrollTop: $(serviceId + (matchMedia.matches ? ` [data-groupname=${$(this).data('groupname')}]` : '')).offset().top - window.innerHeight * 0.1
        }, {
            duration: 1200,
            easing: "easeInOutCubic",
        });

        $(serviceId + ' [data-groupname=' + $(this).data('groupname') + ']').trigger('click');
    });
});
