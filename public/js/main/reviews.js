$(function() {
    var reviews = $('.reviews');
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

    reviews.find('.prev').on('click', function() {
        updateReviews(reviews.data('currentreview') - 1);
    });

    reviews.find('.next').on('click', function() {
        updateReviews(reviews.data('currentreview') + 1);
    });

    reviews.find('.slider_counter .review_counter').on('click', function() {
        updateReviews($(this).data('currentreview'));
    })
});
