<?php
/**
 * Load neccessary CSS & JS files
 */
add_action( 'wp_enqueue_scripts', 'fk_theme_stylesheet_setup' );

if ( ! function_exists( 'fk_theme_stylesheet_setup' ) ):
    
    function fk_theme_stylesheet_setup() {

        /**
         * CSS
         */
        wp_enqueue_style( 'css2', get_template_directory_uri() .'/assets/etc/css2?family=Russo+One&display=swap'/*, '1.0.0' */);
        wp_enqueue_style( 'css2-3', get_template_directory_uri() .'/assets/etc/css2-3?family=Exo+2:wght@400;500;600;700;800;900&display=swap'/*, '1.0.0' */);
        wp_enqueue_style( 'css4', get_template_directory_uri() .'/assets/etc/css2-4?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'/*, '1.0.0' */);
        wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() .'/assets/css/vendors/bootstrap.css'/*, '1.0.0' */);
        wp_enqueue_style( 'wow-css', get_template_directory_uri() .'/assets/css/animate.min.css'/*, 'bootstrap-css', '1.0.0' */);
        wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() .'/assets/css/vendors/font-awesome.css');
        wp_enqueue_style( 'feather-icon-css', get_template_directory_uri() .'/assets/css/vendors/feather-icon.css');
        wp_enqueue_style( 'slick-css', get_template_directory_uri() .'/assets/css/vendors/slick/slick.css');
        wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() .'/assets/css/vendors/slick/slick-theme.css');
        wp_enqueue_style( 'Iconly-css', get_template_directory_uri() .'/assets/css/bulk-style.css');
        wp_enqueue_style( 'theme-css', get_template_directory_uri() .'/assets/css/style.css');

        wp_enqueue_style( 'main-style', get_template_directory_uri() .'/style.css');

        /**
         * JS
         */
        wp_enqueue_script( 'latest-jquery', get_template_directory_uri().'/assets/js/jquery-3.6.0.min.js', array( ), '1.0.0', true );
        wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/assets/js/jquery-ui.min.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri().'/assets/js/bootstrap/bootstrap.bundle.min.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'bootstrap-notify', get_template_directory_uri().'/assets/js/bootstrap/bootstrap-notify.min.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'popper', get_template_directory_uri().'/assets/js/popper.min.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'feather', get_template_directory_uri().'/assets/js/feather/feather.min.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'feather-icon', get_template_directory_uri().'/assets/js/feather/feather-icon.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'lazysizes', get_template_directory_uri().'/assets/js/lazysizes.min.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'slick', get_template_directory_uri().'/assets/js/slick/slick.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'slick-animation', get_template_directory_uri().'/assets/js/slick/slick-animation.min.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'custom-slick', get_template_directory_uri().'/assets/js/slick/custom_slick.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'price-range', get_template_directory_uri().'/assets/js/ion.rangeSlider.min.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'quantity', get_template_directory_uri().'/assets/js/quantity-2.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'sidebar-open', get_template_directory_uri().'/assets/js/filter-sidebar.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.min.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'custom-wow', get_template_directory_uri().'/assets/js/custom-wow.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'main', get_template_directory_uri().'/assets/js/script.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'theme-setting', get_template_directory_uri().'/assets/js/theme-setting.js', array( 'jquery' ), '1.0.0', true );

        wp_enqueue_script( 'fk-wc-product-list', get_template_directory_uri().'/assets/js/fk-app/fk-wc-product-list.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'fk-wc-product-detail', get_template_directory_uri().'/assets/js/fk-app/fk-wc-product-detail.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'fk-wc-product-cart', get_template_directory_uri().'/assets/js/fk-app/fk-wc-product-cart.js', array( 'jquery' ), '1.0.0', true );

        wp_enqueue_script( 'fk-app-custom', get_template_directory_uri().'/assets/js/fk-app/fk-app-custom.js', array( 'jquery' ), '1.0.0', true );
    }
    
endif;

?>