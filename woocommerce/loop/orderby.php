<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wp_query;

?>

<form class="woocommerce-ordering" method="get">
	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
	<!-- If there is no orderby parameter in the URL, the 'menu_order' string is passed default. 
			Need initialization for orderby to make to be impossible for users to access the reordering for default order status.-->
	<input type="hidden" name="orderby" value="<?php echo $orderby; ?>" /> 
	<input type="hidden" name="paged" value="1" />
</form>

<div class="show-button">
	<div class="filter-button-group">
		<div class="filter-button d-inline-block d-lg-none">
			<a><i class="fa-solid fa-filter"></i> Filter Menu</a>
		</div>
	</div>

	<div class="top-filter-menu row">
		<div class="category-dropdown col-4">
			<h5 class="text-content"><span style="color: green"><?php echo $wp_query->found_posts; ?> results </span> <span style="color: darkseagreen">of total <?php echo wp_count_posts('product')->publish; ?></span></h5>
			<!-- <div class="dropdown">
				<button class="dropdown-toggle" type="button" id="orderbyMenuButton" data-bs-toggle="dropdown">
					<span id="<?php //echo $orderby; ?>"><?php //echo esc_html($catalog_orderby_options[$orderby]); ?></span> <i class="fa-solid fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu" aria-labelledby="orderbyMenuButton">

					<?php //foreach ( $catalog_orderby_options as $id => $name ) : ?>
						<li>
							<a href="javascript:fk_wc_product_ordering('<?php //echo esc_attr( $id ); ?>')" 
								class="dropdown-item" id="<?php //echo esc_attr( $id ); ?>" ><?php //echo esc_html( $name ); ?></a>
						</li>
					<?php //endforeach; ?>
					
				</ul>
			</div> -->
		</div>
		<div class="col-4">
			<!-- <h5 class="text-content" style="text-align: center; color: #ededed">page : <?php //echo wc_get_loop_prop( 'current_page' ); ?>/<?php //echo wc_get_loop_prop( 'total_pages' ); ?></h5> -->
		</div>
		<div class="col-4">
			<div class="" style="float: left">
				<div class="category-dropdown">
					<h5 class="text-content">Sort By :</h5>
					<div class="dropdown">
						<button class="dropdown-toggle" type="button" id="orderbyMenuButton" data-bs-toggle="dropdown">
							<span id="<?php echo $orderby; ?>"><?php echo esc_html($catalog_orderby_options[$orderby]); ?></span> <i class="fa-solid fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu" aria-labelledby="orderbyMenuButton">

							<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
								<li>
									<a href="javascript:fk_wc_product_ordering('<?php echo esc_attr( $id ); ?>')" 
										class="dropdown-item" id="<?php echo esc_attr( $id ); ?>" ><?php echo esc_html( $name ); ?></a>
								</li>
							<?php endforeach; ?>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="grid-option d-none d-md-block" style="float: right">
				<ul>
					<li class="three-grid">
						<a href="javascript:void(0)">
							<img src="<?php echo get_parent_theme_file_uri( '/assets/svg/grid-3.svg' ); ?>" class="blur-up lazyload" alt="">
						</a>
					</li>
					<li class="grid-btn d-xxl-inline-block d-none active">
						<a href="javascript:void(0)">
							<img src="<?php echo get_parent_theme_file_uri( '/assets/svg/grid-4.svg' ); ?>" class="blur-up lazyload d-lg-inline-block d-none" alt="">
							<img src="<?php echo get_parent_theme_file_uri( '/assets/svg/grid.svg' ); ?>" class="blur-up lazyload img-fluid d-lg-none d-inline-block" alt="">
						</a>
					</li>
					<li class="list-btn">
						<a href="javascript:void(0)">
							<img src="<?php echo get_parent_theme_file_uri( '/assets/svg/list.svg' ); ?>" class="blur-up lazyload" alt="">
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>