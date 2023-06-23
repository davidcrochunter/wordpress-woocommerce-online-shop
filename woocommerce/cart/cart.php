<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

?>

<!-- Cart Section Start -->
<section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
				<?php do_action( 'woocommerce_before_cart' ); ?>

                    <div class="cart-table">



					
                        <div class="table-responsive-xl">

	<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
		<?php do_action( 'woocommerce_before_cart_table' ); ?>

                            <table class="table">
                                <tbody>

		<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
			/**
			 * Filter the product name.
			 *
			 * @since 7.8.0
			 * @param string $product_name Name of the product in the cart.
			 */
			$product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key ); ?>

				<tr class="product-box-contain">
					<td class="product-detail">
						<div class="product border-0">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $product_permalink ) {
								echo $thumbnail; // PHPCS: XSS ok.
							} else {
								printf( '<a href="%s" class="product-image">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
							}
						?>
						<div class="product-detail">
							<ul>
								<li class="name">
									<a href="product-left-thumbnail.html">Bell pepper</a>
								</li>

								<li class="text-content"><span class="text-title">Sold
										By:</span> Fresho</li>

								<li class="text-content"><span class="text-title">Quantity</span> - 500 g</li>

								<li>
									<h5 class="text-content d-inline-block">Price :</h5>
									<span>$35.10</span>
									<span class="text-content">$45.68</span>
								</li>

								<li>
									<h5 class="saving theme-color">Saving : $20.68</h5>
								</li>

								<li class="quantity-price-box">
									<div class="cart_qty">
										<div class="input-group">
											<button type="button" class="btn qty-left-minus" data-type="minus" data-field="">
												<i class="fa fa-minus ms-0" aria-hidden="true"></i>
											</button>
											<input class="form-control input-number qty-input" type="text" name="quantity" value="0">


											<button type="button" class="btn qty-right-plus" data-type="plus" data-field="">
												<i class="fa fa-plus ms-0" aria-hidden="true"></i>
											</button>
										</div>
									</div>
								</li>

								<li>
									<h5>Total: $35.10</h5>
								</li>
							</ul>
						</div>
					</div>
				</td>

				<td class="price">
					<h4 class="table-title text-content">Price</h4>
					<h5>$35.10 <del class="text-content">$45.68</del></h5>
					<h6 class="theme-color">You Save : $20.68</h6>
				</td>

				<td class="quantity">
					<h4 class="table-title text-content">Qty</h4>
					<div class="quantity-price">
						<div class="cart_qty">
							<div class="input-group">
								<button type="button" class="btn qty-left-minus" data-type="minus" data-field="">
									<i class="fa fa-minus ms-0" aria-hidden="true"></i>
								</button>
								<?php
								if ( $_product->is_sold_individually() ) {
									$min_quantity = 1;
									$max_quantity = 1;
								} else {
									$min_quantity = 0;
									$max_quantity = $_product->get_max_purchase_quantity();
								}

								$product_quantity = woocommerce_quantity_input(
									array(
										'input_name'   => "cart[{$cart_item_key}][qty]",
										'input_value'  => $cart_item['quantity'],
										'max_value'    => $max_quantity,
										'min_value'    => $min_quantity,
										'product_name' => $product_name,
										'readonly' 	   => true,
									),
									$_product,
									false
								);

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
								?>
						
								<button type="button" class="btn qty-right-plus" data-type="plus" data-field="">
									<i class="fa fa-plus ms-0" aria-hidden="true"></i>
								</button>
							</div>
						</div>
					</div>
				</td>

				<td class="subtotal">
					<h4 class="table-title text-content">Total</h4>
					<h5>$35.10</h5>
				</td>

				<td class="save-remove">
					<h4 class="table-title text-content">Action</h4>
					<!-- <a class="save notifi-wishlist" href="javascript:void(0)">Save for later</a> -->
					<a class="remove close_button" href="javascript:void(0)">Remove</a>
				</td>
			</tr>





			<?php
			}
		} ?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>
			<tr>
				<td colspan="6" class="actions">
					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon">
							<label for="coupon_code" class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply coupon', 'woocommerce' ); ?></button>
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>
					<button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
					<?php do_action( 'woocommerce_cart_actions' ); ?>
					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</td>
			</tr>
			<?php do_action( 'woocommerce_after_cart_contents' ); ?>

                                </tbody>
                            </table>

		<?php do_action( 'woocommerce_after_cart_table' ); ?>
	</form>

                        </div>
                    </div>
                </div>

                <div class="col-xxl-3">
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>Cart Total</h3>
                        </div>

                        <div class="summery-contain">
                            <div class="coupon-cart">
                                <h6 class="text-content mb-2">Coupon Apply</h6>
                                <div class="mb-3 coupon-box input-group">
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Coupon Code Here...">
                                    <button class="btn-apply">Apply</button>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price">$125.65</h4>
                                </li>

                                <li>
                                    <h4>Coupon Discount</h4>
                                    <h4 class="price">(-) 0.00</h4>
                                </li>

                                <li class="align-items-start">
                                    <h4>Shipping</h4>
                                    <h4 class="price text-end">$6.90</h4>
                                </li>
                            </ul>
                        </div>

                        <ul class="summery-total">
                            <li class="list-total border-top-0">
                                <h4>Total (USD)</h4>
                                <h4 class="price theme-color">$132.58</h4>
                            </li>
                        </ul>

                        <div class="button-group cart-button">
                            <ul>
                                <li>
                                    <button onclick="location.href = '<?php echo esc_url( wc_get_checkout_url() ); ?>'" class="btn btn-animation proceed-btn fw-bold">Process To Checkout</button>
                                </li>

                                <li>
                                    <button onclick="location.href = 'index.html';" class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>Return To Shopping</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section End -->

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<div class="cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
