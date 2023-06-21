
jQuery(document).ready(function($) {
    $('.qty-right-plus').off('click');
    $('.qty-right-plus').click(function () {
        quantity = parseInt($('[name="quantity"]').val());
        quantity++;
        $('[name="quantity"]').val(quantity);
    });




});
