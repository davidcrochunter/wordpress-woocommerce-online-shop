<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

// if ( $total <= 1 ) {
// 	return;
// }

global $fk_wc_catalog_perpage_options;
global $fk_wc_catalog_perpage_current;

?>
<form class="woocommerce-perpaging" method="get">
	<?php wc_query_string_form_fields( null, array( 'limit', 'submit', 'paged', 'product-page' ) ); ?>
	<!-- If there is no limit parameter in the URL, number 16 is passed default. 
		Need initialization for limit to make to be impossible for users to access the reperpaging for default limit status.-->
	<input type="hidden" name="limit" value="<?php echo $fk_wc_catalog_perpage_current; ?>" /> 
	<input type="hidden" name="paged" value="1" />
</form>

<div class="show-button">
	<div class="top-filter-menu row">
		<div class="category-dropdown col-3 per-page">
			<h5 class="text-content">Per Page :</h5>
			<div class="dropdown">
				<button class="dropdown-toggle" type="button" id="ppgbyMenuButton" data-bs-toggle="dropdown">
					<span id="<?php echo $fk_wc_catalog_perpage_current; ?>"><?php echo $fk_wc_catalog_perpage_current; ?></span> <i class="fa-solid fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu" aria-labelledby="ppgbyMenuButton">

					<?php foreach ( $fk_wc_catalog_perpage_options as $id => $name ) : ?>
						<li>
							<a href="javascript:fk_wc_product_perpaging('<?php echo esc_attr( $id ); ?>')" 
								class="dropdown-item" id="<?php echo esc_attr( $id ); ?>" ><?php echo esc_html( $name ); ?></a>
						</li>
					<?php endforeach; ?>
					
				</ul>
			</div>
		</div>
		<!-- Pagination -->
		<div class="col-6">
			<nav class="custome-pagination">
				<?php
					$pagination = paginate_links(
						apply_filters(
							'woocommerce_pagination_args',
							array( // WPCS: XSS ok.
								'base'      => $base,
								'format'    => $format,
								'add_args'  => false,
								'current'   => max( 1, $current ),
								'total'     => $total,
								'prev_next'    => true,
								'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
								'next_text' => is_rtl() ? '&larr;' : '&rarr;',
								'type'      => 'array', //or list
								'end_size'  => 3,
								'mid_size'  => 3,
								'class'		=> 'page-link',
							)
						)
					); 
				?>
				<?php if ( ! empty( $pagination ) ) : ?>
					<ul class="pagination justify-content-center"><!-- or any class you need -->
						<?php foreach ( $pagination as $key => $page_link ) : ?>
							<li class="page-item <?php if ( strpos( $page_link, 'current' ) !== false ) { echo ' active'; } ?> ">
								<?php 
									$page_link = str_replace( 'page-numbers', 'page-link', $page_link );
									$page_link = str_replace( 'page/1/', '', $page_link ); 

									echo $page_link;
								?>
							</li>
						<?php endforeach ?>
					</ul>
				<?php else : ?>
					<ul class="pagination justify-content-center">
						<li class="page-item active">
							<span aria-current="page" class="page-link current">1</span>
						</li>
					</ul>
				<?php endif ?>
			</nav>
		</div>
		<div class="col-3">
			
		</div>
	</div>
</div>




