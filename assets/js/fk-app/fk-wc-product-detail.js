
jQuery(document).ready(function($) {
    $('.product-section .qty-right-plus').off('click');
    $('.product-section .qty-right-plus').click(function () {
        quantity = parseInt($('[name="quantity"]').val());
        quantity++;
        $('[name="quantity"]').val(quantity);
    });




});
