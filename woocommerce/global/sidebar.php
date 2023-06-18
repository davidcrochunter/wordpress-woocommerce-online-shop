<?php
/**
 * Sidebar
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/sidebar.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_active_sidebar( 'fk_wc_shopbar_sidebar' ) ) : ?>

	<div class="col-custome-3">
		<div class="left-box wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
			<div class="shop-left-sidebar">
				<?php dynamic_sidebar( 'fk_wc_shopbar_sidebar' ); ?>
			</div>
		</div>
	</div>

<?php
endif;

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
