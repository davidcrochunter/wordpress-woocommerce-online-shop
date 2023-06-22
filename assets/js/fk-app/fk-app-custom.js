
/**
 * 
 */




// function ajax_loader_begin () {
//     $('.spinner-border').css('display', 'inline-block');
//     $('.fullpage-ajax-loader').css('background', '#daddd63d');
// }

// function ajax_loader_end () {
//     $('.fullpage-ajax-loader').css('background', '#daddd600');
//     $('.spinner-border').css('display', 'none');
// }

// function reRendering_ajax_fetch_part () {
//     // re-apply the feature of product-cart...
//     feather.replace();

//     $(".addcart-button").click(function () {
//         $(this).next().addClass("open");
//         $(".add-to-cart-box .qty-input").val('1');
//     });

//     $('.add-to-cart-box').on('click', function () {
//         var $qty = $(this).siblings(".qty-input");
//         var currentVal = parseInt($qty.val());
//         if (!isNaN(currentVal)) {
//             $qty.val(currentVal + 1);
//         }
//     });

//     $('.qty-left-minus').on('click', function () {
//         var $qty = $(this).siblings(".qty-input");
//         var _val = $($qty).val();
//         if (_val == '1') {
//             var _removeCls = $(this).parents('.cart_qty');
//             $(_removeCls).removeClass("open");
//         }
//         var currentVal = parseInt($qty.val());
//         if (!isNaN(currentVal) && currentVal > 0) {
//             $qty.val(currentVal - 1);
//         }
//     });

//     $('.qty-right-plus').click(function () {
//         if ($(this).prev().val() < 9) {
//             $(this).prev().val(+$(this).prev().val() + 1);
//         }
//     });
// }
jQuery(document).ready(function($) {
    // Your code here
    $range     = $(".js-range-slider");
    if( $range.length > 0 ) {
        instance   = $range.data("ionRangeSlider");
        max_price  = $range.data('max-price');
        from_price = $range.data('from-price');
        to_price   = $range.data('to-price');
    
        instance.update({
            min: 0,
            max: max_price,
            from: from_price,
            to: to_price,
            input_values_separator: "-",
        });
    
        instance.options.onFinish = function(range) {
            // debugger;
            console.log(range.from);
            console.log(range.to)
            let new_price_range = `${range.from}-${range.to}`;
            let old_price_range = $('.woocommerce-pricing > [name="price"]').val();
            if( old_price_range == new_price_range ) {
                return;
            }
    
            $('.woocommerce-pricing > [name="price"]').val(new_price_range);
    
            $('form.woocommerce-pricing').trigger("submit");
    
            // mukto_fetch();
        };
    }




});



// (function () {alert();
//     console.log('{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{00');
//     /**
//      * price control procedure
//      */
//     var $range = $(".js-range-slider"),
//     instance = $range.data("ionRangeSlider");

    
//     let ultimate_price = parseInt($('#ultimate_price').text());

//     instance.update({
//         min: 0,
//         max: ultimate_price,
//         from: 0,
//         to: ultimate_price
//     });



// });

