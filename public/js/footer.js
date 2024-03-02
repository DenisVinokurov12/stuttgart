$(function () {
    let mainPageNavigationButton = $('footer .main_page_navigation_button');

    mainPageNavigationButton.on('click', function () {
        let currentPage = window.location.pathname;

        if (currentPage === '/') {
            scrollToBlock($(this).data('blocklabel'))
        }
    });

    function scrollToBlock(blockId)
    {
        $('html, body').animate({
            scrollTop: $(`#${blockId}`).offset().top - window.innerHeight * 0.1
        }, {
            duration: 1000,
            easing: "swing",
        });
    }
});
