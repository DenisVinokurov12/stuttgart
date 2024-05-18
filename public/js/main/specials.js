$(function() {
    var specials = $('.specials');
    var slider = specials.find('.slider');
    var specialsAmount = specials.find('.slider .main_wrapper .slider_item').length ?? 0;
    var sliderWidth = $(slider.find('.slider_item').get(1)).position().left;
    var visibleWidth = specials.find('.slider .main_wrapper').width();
    var maxScrollWidth = slider.find('.slider_item:last-child').position().left + sliderWidth;

    var page = 0;

    function goNext() {
        if (page >= specialsAmount - Math.round(visibleWidth/sliderWidth)) {
            return;
        }

        page++;

        slider.find('.slider_item').css('transform', 'translateX(-' +  sliderWidth*page + 'px)');
    }

    function goBack() {
        if (page <= 0) {
            return;
        }

        page--;

        slider.find('.slider_item').css('transform', 'translateX(-' +  sliderWidth*page + 'px)');
    }

    slider.find('.prev').on('click', function () {
        goBack();
    });

    slider.find('.next').on('click', function () {
        goNext();
    });

    slider.find('.slider_item').tooltip({
        tooltipClass: "customizeTooltip",
        position: {
            my: "center bottom",
            at: "center top-25px"
        }
    });

    var x1;

    slider.on('touchstart', function (e) {
        x1 = Math.abs(slider.find('.slider_item:first-child').position().left) + e.originalEvent.touches[0].clientX;
    });

    slider.on('touchmove', function (e) {
        if (!x1) {
            return false;
        }

        var currentOffset = Number(x1 - e.originalEvent.touches[0].clientX);
        var widthLeft = maxScrollWidth - currentOffset;
        var widthOffsetLeft = widthLeft - slider.width();

        if (widthOffsetLeft < 0 || currentOffset < -2) {
            return false;
        }

        slider.find('.slider_item').css('transform', 'translateX(' +  -1 * currentOffset + 'px)');
    });
});