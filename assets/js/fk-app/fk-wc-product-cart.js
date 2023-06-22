
jQuery(document).ready(function($) {

    $('.qty-left-minus').on('click', function () {
        $('[name="update_cart"]').removeAttr('disabled');
    });
    
    $('.qty-right-plus').click(function () {
        $('[name="update_cart"]').removeAttr('disabled');
    });


});
