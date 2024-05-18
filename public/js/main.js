$(function() {
    var matchMedia = window.matchMedia('(max-width: 768px)');
    let mainBlock = $('.main_block');
    mainBlock.find('.container').css('opacity', 0);

    var primeBlockScaleIndex = 0.75;
    var mainBlockScaleIndex = 0.4;

    if (matchMedia.matches) {
        primeBlockScaleIndex = 0.75;
        mainBlockScaleIndex = 0.7;
    }

    $(window).scroll(function() {
        var windscroll = $(window).scrollTop();

        $('.prime_block').each(function (index, block) {
            if ($(block).position().top <= windscroll + window.screen.availHeight * primeBlockScaleIndex) {
                $(block).find('.left_hidden').animate({
                    left: 0,
                }, 800);
                $(block).find('.right_hidden').animate({
                    right: 0,
                }, 800);
            }
        });

        mainBlock.each(function(index, block) {
            if ($(block).position().top <= windscroll + window.screen.availHeight * mainBlockScaleIndex) {
                $(block).find('.container').animate({
                    opacity: 1,
                }, 350);
            }
        });
    }).scroll();

    Fancybox.bind("[data-fancybox]");
});
