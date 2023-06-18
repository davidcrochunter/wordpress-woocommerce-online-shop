<?php

/**
 * Theme comprehensive setup
 */
add_action( 'after_setup_theme', 'fk_theme_setup' );

if( ! function_exists('fk_theme_setup') ):
    function fk_theme_setup() {

        // provide pre-defined supports into admin dashboard...
        add_theme_support( 'widgets' );
        add_theme_support( 'woocommerce' );
        //...
    }
endif;

/**
 * Woocommerce main sidebar init
 */
add_action( 'widgets_init', 'fk_wc_shopbar_sidebar_init' );

if( ! function_exists('fk_wc_shopbar_sidebar_init') ) {
    function fk_wc_shopbar_sidebar_init() {

        register_sidebar(
            array(
                'name'          => esc_html__( 'FoodKingdom-WC Shopbar SideBar', 'food-kingdom' ),
                'id'            => 'fk_wc_shopbar_sidebar',
                'description'   => esc_html__( 'Add widget here to appear in Shopbar-Store page\'s left sidebar.', 'fastkart' ),
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => '',
            )
        );
    }
}

$fk_wc_catalog_perpage_options = array(
	'4'     => __( '4',   'woocommerce' ),
	'8'     => __( '8',   'woocommerce' ),
	'16'    => __( '16',  'woocommerce' ),
	'24'    => __( '24',  'woocommerce' ),
	'48'    => __( '48',  'woocommerce' ),
);
$fk_wc_catalog_perpage_default = 16;
$fk_wc_catalog_perpage_current = 16;
