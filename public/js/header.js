$(function () {
    var matchMedia = window.matchMedia('(max-width: 768px)');
    let mainPageNavigationButton = $('header .main_page_navigation_button');

    mainPageNavigationButton.on('click', function () {
        let currentPage = window.location.pathname;

        if (currentPage === '/' || $(this).data('blocklabel') === 'form') {
            scrollToBlock($(this).data('blocklabel'));
            return;
        }

        window.location.href = '/#' + $(this).data('blocklabel');
    });

    function scrollToBlock(blockId)
    {
        $('html, body').animate({
            scrollTop: $(`#${blockId}`).offset().top - window.innerHeight * 0.1
        }, {
            duration: 1500,
            easing: "easeInOutCubic",
        });
    }

    $(window).scroll(function() {
        var windscroll = $(window).scrollTop();

        $('nav a').removeClass('active');

        $('.desktop_block').each(function(index, block) {
            if ($(block).position().top <= windscroll + window.innerHeight * 0.2) {
                $('nav a').removeClass('active');
                $('nav a[data-blocklabel=' + $(block).attr('id') + ']').addClass('active');
            }
        });

    }).scroll();

    if (matchMedia.matches) {
        var navMenu = $('header .main_menu_mobile');

        navMenu.on('click', function() {
            navMenu.find('ul').toggle();
        });

        $(document).on('touchend', function(e) {

            if (navMenu.is(e.target) || navMenu.has(e.target).length !== 0)
            {
                return;
            }

            navMenu.find('ul').hide();
        })
    }
});
