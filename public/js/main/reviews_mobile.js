$(function() {
    var reviews = $('.reviews_mobile');
    var totalReviews = reviews.find('.review_box').length ?? 0;
    var isRunning = false;

    function updateReviews(newCurrentReview) {
        if (newCurrentReview < 0 || newCurrentReview >= totalReviews || isRunning) {
            return;
        }

        isRunning = true;

        reviews.data('currentreview', newCurrentReview);
        reviews.find('.slider_counter .review_counter').removeClass('active');

        reviews.find('.review_box').fadeOut(300).promise().done(function() {
            $(reviews.find('.review_box').get(newCurrentReview)).fadeIn(300);
            reviews.find('.slider_counter .review_counter[data-currentreview=' + newCurrentReview + ']').addClass('active');
            isRunning = false;
        });
    }

    updateReviews(0);

    var x1;

    reviews.find('.review_box').on('touchstart', function (e) {
        x1 = e.originalEvent.touches[0].clientX;
    });

    reviews.find('.review_box').on('touchmove', function (e) {
        if (!x1) {
            return false;
        }

        var diff = Math.abs(Number(x1 - e.originalEvent.touches[0].clientX));

        if (diff < $(this).width() * 0.3) {
            return false;
        }

        var newReviewPage =  reviews.data('currentreview') + (Number(x1 - e.originalEvent.touches[0].clientX) > 0 ? +1 : -1)

        updateReviews(newReviewPage);
    });

    reviews.find('.slider_counter .review_counter').on('click', function() {
        updateReviews($(this).data('currentreview'));
    });

    var mySwiper = $('.reviews_mobile .main_wrapper').swiper

});
