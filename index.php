<?php
/*
Template Name: Food Kingdom Index-Page
*/

get_header(); 

if ( have_posts() ) {

    // Load posts loop.
    while ( have_posts() ) {
        
        the_post(); ?>

        <!-- <h2 style="width: 100%; text-align: center;">Sorry, This project is only for Woocommerce product list</h2>
        <h1 style="width: 100%; text-align: center;"><a href="<?php echo home_url().'/shop/'; ?>">Welcome to Woocommerce product list!</a></h1> -->

        <h2><?php the_title() ?></h2>
		<?php the_content();

    }
} else {

}

get_footer(); 

?>