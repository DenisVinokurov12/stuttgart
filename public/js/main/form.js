$(function() {
    let form = $('.form');
    let categorySelect = form.find('.form_select');
    let categoryInput = categorySelect.find('.form_field');

    categoryInput.on('focus', function() {
        $(this).addClass('focused');
    }).on('blur', function() {
        $(this).removeClass('focused');
    });

    categorySelect.find('.dropdown li.option').on('mousedown', function() {
        categoryInput.val($(this).data('value')).removeClass('focused');
    });
});