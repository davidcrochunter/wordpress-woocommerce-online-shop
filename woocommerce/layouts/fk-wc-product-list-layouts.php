<?php

/**
 * Stop Woocommerce default actions
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 ); //is responsible for ordering(include sort-order combobox and etc).

// remove_action( 'woocommerce_after_shop_loop', 'woocommerce_after_shop_loop', 10 ); //is responsible for pagination.

/**
 * Customize FoodKingdom-Shop page
 */
add_action( 'woocommerce_before_main_content', 'fk_wc_before_main_content', 11 );

if( ! function_exists('fk_wc_before_main_content') ):
    function fk_wc_before_main_content() {
        //<!-- Shop Section Start -->
        echo '<section class="section-b-space shop-section">';
        echo '<div class="container-fluid-lg">';
        echo '<div class="row">';
    }
endif;

add_action( 'woocommerce_after_main_content', 'fk_wc_after_main_content', 9 );

if( ! function_exists('fk_wc_after_main_content') ):
    function fk_wc_after_main_content() {
        echo '</div>';
        echo '</div>';
        echo '</section>';
    }
endif;

//
add_action( 'woocommerce_before_shop_loop', 'fk_wc_before_shop_loop_wraper', 28 );

if( ! function_exists('fk_wc_before_shop_loop_wraper') ):
    function fk_wc_before_shop_loop_wraper() {
        echo '<div class="col-custome-9">';
    }
endif;

add_action( 'woocommerce_after_shop_loop', 'fk_wc_after_shop_loop_wraper', 11 );

if( ! function_exists('fk_wc_after_shop_loop_wraper') ):
    function fk_wc_after_shop_loop_wraper() {
        echo '</div>';
    }
endif;

// Display FoodKingdom-Shop banner 
add_action( 'woocommerce_before_shop_loop', 'fk_wc_shopbar_product_loop_baner', 29 );
add_action( 'woocommerce_no_products_found', 'fk_wc_shopbar_product_loop_baner', 9 );

if( ! function_exists('fk_wc_shopbar_product_loop_baner') ):
    function fk_wc_shopbar_product_loop_baner() {
        get_template_part( 'template-parts/shop/shopbar_product_loop_baner' );
    }
endif;


/**
 * Customize FoodKingdom-Product-Detail page 
 */

add_action( 'woocommerce_before_single_product_main_content', 'fk_wc_before_single_product_main_content', 11 );

if( ! function_exists('fk_wc_before_single_product_main_content') ):
    function fk_wc_before_single_product_main_content() {
        //<!-- Shop Section Start -->
        echo '<section class="product-section">';
        echo '<div class="container-fluid-lg">';
        echo '<div class="row">';
    }
endif;

add_action( 'woocommerce_after_single_product_main_content', 'fk_wc_after_single_product_main_content', 9 );

if( ! function_exists('fk_wc_after_single_product_main_content') ):
    function fk_wc_after_single_product_main_content() {
        echo '</div>';
        echo '</div>';
        echo '</section>';
    }
endif;

add_action( 'woocommerce_before_single_product_loop', 'fk_wc_before_single_product_loop_wraper', 28 );

if( ! function_exists('fk_wc_before_single_product_loop_wraper') ):
    function fk_wc_before_single_product_loop_wraper() {
        echo '<div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">';
    }
endif;

add_action( 'woocommerce_after_single_product_loop', 'fk_wc_after_single_product_loop_wraper', 11 );

if( ! function_exists('fk_wc_after_single_product_loop_wraper') ):
    function fk_wc_after_single_product_loop_wraper() {
        echo '</div>';
    }
endif;


?>