$(function() {
    let mainBlock = $('.main_block');
    mainBlock.find('.container').css('opacity', 0);

    $(window).scroll(function() {
        var windscroll = $(window).scrollTop();

        $('.prime_block').each(function (index, block) {
            if ($(block).position().top <= windscroll + window.innerHeight * 0.75) {
                $(block).find('.left_hidden').animate({
                    left: 0,
                }, 800);
                $(block).find('.right_hidden').animate({
                    right: 0,
                }, 800);
            }
        });

        mainBlock.each(function(index, block) {
            if ($(block).position().top <= windscroll + window.innerHeight * 0.4) {
                $(block).find('.container').animate({
                    opacity: 1,
                }, 350);
            }
        });
    }).scroll();
});
