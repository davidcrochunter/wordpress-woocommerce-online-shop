<?php
    $search_product = '';
    
    if ( isset( $_GET['search'] ) ) { 
        $search_product = $_GET['search'];
    }
?>

<form class="woocommerce-searching" method="get">
	<input type="hidden" name="search" value="<?php echo $search_product; ?>" />
	<input type="hidden" name="paged" value="1" />
	<?php wc_query_string_form_fields( null, array( 's', 'submit', 'paged', 'product-page', 'price' ) ); ?>
</form>

<div class="form-floating theme-form-floating-2 search-box">
    <input type="text" class="form-control" name="searching" id="searching" 
        onkeyup="fk_wc_product_search_keyup(event)" placeholder="Search Product..." value="<?php echo $search_product; ?>">
    <label for="search">Search</label>
</div>
