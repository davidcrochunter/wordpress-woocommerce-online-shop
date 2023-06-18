<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// This v is for reservation, indicates the columns in each product row...
$fk_product_loop_main_columns = esc_attr( wc_get_loop_prop( 'columns' ) );
?>

<div class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">