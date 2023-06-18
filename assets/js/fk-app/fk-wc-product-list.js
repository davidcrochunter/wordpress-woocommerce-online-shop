/**
 * search box 
 */
function fk_wc_product_search_keyup (e) {

    if (e.key === 'Enter' || e.keyCode === 13) {

        // Do something
        console.log('product search keyup event is occured...');

        let searching = $('#searching').val();
        let search = $('[name="search"]').val();
        if( search == searching ) {
            return;
        }

        $('[name="search"]').val(searching);
    
        $('form.woocommerce-searching').trigger("submit");
    }
}

/**
 * ordering
 */
function fk_wc_product_ordering ( id ) {

    let old_id = $('#orderbyMenuButton > span').attr('id');
    if( old_id == id ) {
        return;
    }

    $('#orderbyMenuButton > span').attr('id', id);
    $('.woocommerce-ordering > [name="orderby"]').val(id);
        
    $('form.woocommerce-ordering').trigger("submit");
}

/**
 * perpaging
 */
function fk_wc_product_perpaging ( id ) {

    let old_id = $('#ppgbyMenuButton > span').attr('id');
    if( old_id == id ) {
        return;
    }

    $('#ppgbyMenuButton > span').attr('id', id);
    $('.woocommerce-perpaging > [name="limit"]').val(id);
        
    $('form.woocommerce-perpaging').trigger("submit");
}

/**
 * categoring
 */
function fk_wc_product_categoring ( ) {
// alert();


    category_arr = $('.category-list .category-list-box > input:checked');

    category_id_arr = category_arr.map(function() {
        return $(this).attr('id');
    }).get();

    const category = category_id_arr.toString();
    $('.woocommerce-categoring > [name="category"]').val(category);

    $('form.woocommerce-categoring').trigger("submit");
}