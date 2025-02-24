$(function() {
    var block = $('.services, .services_mobile');

    block.find('.group').on('click', function(e) {
        var groupName = $(this).data('name');

        block.find('.group').removeClass('active');
        $(this).addClass('active');

        block.find('.categories_container').hide();
        block.find(`.categories_container[data-groupname=${groupName}]`).fadeIn(500);
    });

    $(block.find('.group').get(0)).trigger('click');
});