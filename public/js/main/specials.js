$(function() {
    var specials = $('.specials');
    var slider = specials.find('.slider');
    var specialsAmount = specials.find('.slider .main_wrapper .slider_item').length ?? 0;

    var page = 0;

    function goNext() {
        if (page >= specialsAmount - 4) {
            return;
        }

        page++;

        slider.find('.slider_item').css('transform', 'translate(-' + page*100 + '%)');
    }

    function goBack() {
        if (page <= 0) {
            return;
        }

        page--;

        slider.find('.slider_item').css('transform', 'translate(-' + page*100 + '%)');
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