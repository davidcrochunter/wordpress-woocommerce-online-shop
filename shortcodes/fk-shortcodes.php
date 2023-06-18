<?php

/**
 * Shortcode Regisget
 */
add_action( 'init', 'register_shortcodes');

function register_shortcodes(){
    add_shortcode('fk_wc_product_filter_clear_panel', 'fk_wc_product_filter_clear_panel_function');
    add_shortcode('fk_wc_product_search_filter_panel', 'fk_wc_product_search_filter_panel_function');
    add_shortcode('fk_wc_product_complex_filter_panel', 'fk_wc_product_complex_filter_panel_function');
}

function fk_wc_product_filter_clear_panel_function() {
    get_template_part( 'template-parts/shop/product_filter_clear_panel' );
    return;
}

function fk_wc_product_search_filter_panel_function() {
    get_template_part( 'template-parts/shop/product_search_filter_panel' );
    return;
}

function fk_wc_product_complex_filter_panel_function() {
    get_template_part( 'template-parts/shop/product_complex_filter_panel' );
    return;
}
?>