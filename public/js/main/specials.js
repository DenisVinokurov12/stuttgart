$(function() {
    var specials = $('.specials');
    var slider = specials.find('.slider');
    var specialsAmount = specials.find('.slider .main_wrapper .slider_item').length ?? 0;
    var sliderWidth = $(slider.find('.slider_item').get(1)).position().left;

    var page = 0;

    function goNext() {
        if (page >= specialsAmount - 4) {
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

        slider.find('.slider_item').css('transform', 'translateX(' +  sliderWidth*page + 'px)');
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


});