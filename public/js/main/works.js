$(function() {
    Fancybox.bind("[data-fancybox]");


    $('.works').on('click', '.all_works', function() {
        $(this).closest('.works').find('.group_wrapper:not(:first-child)').toggleClass('hidden');
    });
});
