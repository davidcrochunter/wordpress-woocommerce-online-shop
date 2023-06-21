<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}


$post_thumbnail_id = $product->get_image_id();
$attachment_ids = $product->get_gallery_image_ids();

?>

<div class="row g-4">
	<div class="col-xl-6 wow fadeInUp">
		<div class="product-left-box">
			<div class="row g-2">
				<div class="col-12">
					<div class="product-main-1 no-arrow">
						<div>
							<div class="slider-image">
								<?php
									if ( $post_thumbnail_id ) {

										$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
										$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
										$thumbnail_src     = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
										$html = esc_url( $thumbnail_src[0] );		
									
										?>
											<img src="<?php echo $html; ?>" id="<?php echo $post_thumbnail_id; ?>" data-zoom-image="<?php echo $html; ?>" class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
										<?php
									}
								?>
							</div>
						</div>

						<?php
							if ( $attachment_ids && $product->get_image_id() ) {

								foreach ( $attachment_ids as $key => $attachment_id ) {

									$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
									$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
									$thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
									$html = esc_url( $thumbnail_src[0] );	

									echo '<div><div class="slider-image">';
									echo '<img src="'.$html.'" data-zoom-image="'.$html.'" class="img-fluid image_zoom_cls-'.($key+1).' blur-up lazyload" alt="">';
									echo '</div></div>';
								}
							}
						?>
					</div>
				</div>

				<div class="col-12">
					<div class="bottom-slider-image left-slider no-arrow slick-top">
						<div>
							<div class="sidebar-image">
								<?php
									if ( $post_thumbnail_id && count($attachment_ids) > 0 ) {

										$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
										$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
										$thumbnail_src     = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
										$html = esc_url( $thumbnail_src[0] );	
										
										?>
											<img src="<?php echo $html; ?>" class="img-fluid blur-up lazyload" alt="">
										<?php
									} 
								?>
							</div>
						</div>

						<?php
							if ( $attachment_ids && count($attachment_ids) > 0 && $product->get_image_id() ) {
								foreach ( $attachment_ids as $key => $attachment_id ) {

									$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
									$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
									$thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
									$html = esc_url( $thumbnail_src[0] );	

									echo '<div><div class="sidebar-image">';
									echo '<img src="'.$html.'" class="img-fluid blur-up lazyload" alt="">';
									echo '</div></div>';
								}
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-6 wow fadeInUp ps40" data-wow-delay="0.1s">
		<div class="right-box-contain">
			<h6 class="offer-top">30% Off</h6>
			<h2 class="name">Creamy Chocolate Cake</h2>
			<div class="price-rating">
				<h3 class="theme-color price">$49.50 <del class="text-content">$58.46</del> <span class="offer theme-color">(8% off)</span></h3>
				<div class="product-rating custom-rate">
					<ul class="rating">
						<li>
							<i data-feather="star" class="fill"></i>
						</li>
						<li>
							<i data-feather="star" class="fill"></i>
						</li>
						<li>
							<i data-feather="star" class="fill"></i>
						</li>
						<li>
							<i data-feather="star" class="fill"></i>
						</li>
						<li>
							<i data-feather="star"></i>
						</li>
					</ul>
					<span class="review">23 Customer Review</span>
				</div>
			</div>

			<div class="procuct-contain">
				<p>Lollipop cake chocolate chocolate cake dessert jujubes. Shortbread sugar plum
					dessert
					powder cookie sweet brownie. Cake cookie apple pie dessert sugar plum muffin
					cheesecake.
				</p>
			</div>

			<div class="product-packege">
				<div class="product-title">
					<h4>Weight</h4>
				</div>
				<ul class="select-packege">
					<li>
						<a href="javascript:void(0)" class="active">1/2 KG</a>
					</li>
					<li>
						<a href="javascript:void(0)">1 KG</a>
					</li>
					<li>
						<a href="javascript:void(0)">1.5 KG</a>
					</li>
					<li>
						<a href="javascript:void(0)">Red Roses</a>
					</li>
					<li>
						<a href="javascript:void(0)">With Pink Roses</a>
					</li>
				</ul>
			</div>

			<div class="time deal-timer product-deal-timer mx-md-0 mx-auto" id="clockdiv-1" data-hours="1" data-minutes="2" data-seconds="3">
				<div class="product-title">
					<h4>Hurry up! Sales Ends In</h4>
				</div>
				<ul>
					<li>
						<div class="counter d-block">
							<div class="days d-block">
								<h5></h5>
							</div>
							<h6>Days</h6>
						</div>
					</li>
					<li>
						<div class="counter d-block">
							<div class="hours d-block">
								<h5></h5>
							</div>
							<h6>Hours</h6>
						</div>
					</li>
					<li>
						<div class="counter d-block">
							<div class="minutes d-block">
								<h5></h5>
							</div>
							<h6>Min</h6>
						</div>
					</li>
					<li>
						<div class="counter d-block">
							<div class="seconds d-block">
								<h5></h5>
							</div>
							<h6>Sec</h6>
						</div>
					</li>
				</ul>
			</div>

			<!-- **************** -->
			<!-- Add To Cart Form -->
			<!-- **************** -->
			<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>

				<div class="note-box product-packege">

						<div class="cart_qty qty-box product-qty">
							<div class="input-group">
								<button type="button" class="qty-right-plus" data-type="plus" data-field="">
									<i class="fa fa-plus" aria-hidden="true"></i>
								</button>

								<?php
										woocommerce_quantity_input(
											array(
												'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
												'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
												'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
												'classes'	  => 'form-control input-number qty-input', //fk custom class info...
											)
										);
								?>								
								
								<button type="button" class="qty-left-minus" data-type="minus" data-field="">
									<i class="fa fa-minus" aria-hidden="true"></i>
								</button>
							</div>
						</div>

						<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn btn-md bg-dark cart-button text-white w-100 single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

				</div>

			</form>


			<div class="buy-box">
				<a href="wishlist.html">
					<i data-feather="heart"></i>
					<span>Add To Wishlist</span>
				</a>

				<a href="compare.html">
					<i data-feather="shuffle"></i>
					<span>Add To Compare</span>
				</a>
			</div>

			<div class="pickup-box">
				<div class="product-title">
					<h4>Store Information</h4>
				</div>

				<div class="pickup-detail">
					<h4 class="text-content">Lollipop cake chocolate chocolate cake dessert jujubes.
						Shortbread sugar plum dessert powder cookie sweet brownie.</h4>
				</div>

				<div class="product-info">
					<ul class="product-info-list product-info-list-2">
						<li>Type : <a href="javascript:void(0)">Black Forest</a></li>
						<li>SKU : <a href="javascript:void(0)">SDFVW65467</a></li>
						<li>MFG : <a href="javascript:void(0)">Jun 4, 2022</a></li>
						<li>Stock : <a href="javascript:void(0)">2 Items Left</a></li>
						<li>Tags : <a href="javascript:void(0)">Cake,</a> <a href="javascript:void(0)">Backery</a></li>
					</ul>
				</div>
			</div>

			<div class="paymnet-option">
				<div class="product-title">
					<h4>Guaranteed Safe Checkout</h4>
				</div>
				<ul>
					<li>
						<a href="javascript:void(0)">
							<img src="<?php echo get_parent_theme_file_uri( '/assets/images/product/payment/1.svg' ); ?>" class="blur-up lazyload" alt="">
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<img src="<?php echo get_parent_theme_file_uri( '/assets/images/product/payment/2.svg' ); ?>" class="blur-up lazyload" alt="">
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<img src="<?php echo get_parent_theme_file_uri( '/assets/images/product/payment/3.svg' ); ?>" class="blur-up lazyload" alt="">
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<img src="<?php echo get_parent_theme_file_uri( '/assets/images/product/payment/4.svg' ); ?>" class="blur-up lazyload" alt="">
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<img src="<?php echo get_parent_theme_file_uri( '/assets/images/product/payment/5.svg' ); ?>" class="blur-up lazyload" alt="">
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="product-section-box">
			<ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
				</li>

				<li class="nav-item" role="presentation">
					<button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="false">Additional info</button>
				</li>

				<li class="nav-item" role="presentation">
					<button class="nav-link" id="care-tab" data-bs-toggle="tab" data-bs-target="#care" type="button" role="tab" aria-controls="care" aria-selected="false">Care Instuctions</button>
				</li>

				<li class="nav-item" role="presentation">
					<button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Review</button>
				</li>
			</ul>

			<div class="tab-content custom-tab" id="myTabContent">
				<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
					<div class="product-description">
						<div class="nav-desh">
							<p>Jelly beans carrot cake icing biscuit oat cake gummi bears tart.
								Lemon drops carrot cake pudding sweet gummi bears. Chocolate cake
								tart cupcake donut topping liquorice sugar plum chocolate bar. Jelly
								beans tiramisu caramels jujubes biscuit liquorice chocolate. Pudding
								toffee jujubes oat cake sweet roll. Lemon drops dessert croissant
								danish cake cupcake. Sweet roll candy chocolate toffee jelly sweet
								roll halvah brownie topping. Marshmallow powder candy sesame snaps
								jelly beans candy canes marshmallow gingerbread pie.</p>
						</div>

						<div class="nav-desh">
							<div class="desh-title">
								<h5>Organic:</h5>
							</div>
							<p>vitae et leo duis ut diam quam nulla porttitor massa id neque aliquam
								vestibulum morbi blandit cursus risus at ultrices mi tempus
								imperdiet nulla malesuada pellentesque elit eget gravida cum sociis
								natoque penatibus et magnis dis parturient montes nascetur ridiculus
								mus mauris vitae ultricies leo integer malesuada nunc vel risus
								commodo viverra maecenas accumsan lacus vel facilisis volutpat est
								velit egestas dui id ornare arcu odio ut sem nulla pharetra diam sit
								amet nisl suscipit adipiscing bibendum est ultricies integer quis
								auctor elit sed vulputate mi sit amet mauris commodo quis imperdiet
								massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada
								proin libero nunc consequat interdum varius sit amet mattis
								vulputate enim nulla aliquet porttitor lacus luctus accumsan.</p>
						</div>

						<div class="banner-contain nav-desh">
							<img src="<?php echo get_parent_theme_file_uri( '/assets/images/vegetable/banner/14.jpg' ); ?>" class="bg-img blur-up lazyload" alt="">
							<div class="banner-details p-center banner-b-space w-100 text-center">
								<div>
									<h6 class="ls-expanded theme-color mb-sm-3 mb-1">SUMMER</h6>
									<h2>VEGETABLE</h2>
									<p class="mx-auto mt-1">Save up to 5% OFF</p>
								</div>
							</div>
						</div>

						<div class="nav-desh">
							<div class="desh-title">
								<h5>From The Manufacturer:</h5>
							</div>
							<p>Jelly beans shortbread chupa chups carrot cake jelly-o halvah apple
								pie pudding gingerbread. Apple pie halvah cake tiramisu shortbread
								cotton candy croissant chocolate cake. Tart cupcake caramels gummi
								bears macaroon gingerbread fruitcake marzipan wafer. Marzipan
								dessert cupcake ice cream tootsie roll. Brownie chocolate cake
								pudding cake powder candy ice cream ice cream cake. Jujubes soufflé
								chupa chups cake candy halvah donut. Tart tart icing lemon drops
								fruitcake apple pie.</p>

							<p>Dessert liquorice tart soufflé chocolate bar apple pie pastry danish
								soufflé. Gummi bears halvah gingerbread jelly icing. Chocolate cake
								chocolate bar pudding chupa chups bear claw pie dragée donut halvah.
								Gummi bears cookie ice cream jelly-o jujubes sweet croissant.
								Marzipan cotton candy gummi bears lemon drops lollipop lollipop
								chocolate. Ice cream cookie dragée cake sweet roll sweet roll.Lemon
								drops cookie muffin carrot cake chocolate marzipan gingerbread
								topping chocolate bar. Soufflé tiramisu pastry sweet dessert.</p>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
					<div class="table-responsive">
						<table class="table info-table">
							<tbody>
								<tr>
									<td>Specialty</td>
									<td>Vegetarian</td>
								</tr>
								<tr>
									<td>Ingredient Type</td>
									<td>Vegetarian</td>
								</tr>
								<tr>
									<td>Brand</td>
									<td>Lavian Exotique</td>
								</tr>
								<tr>
									<td>Form</td>
									<td>Bar Brownie</td>
								</tr>
								<tr>
									<td>Package Information</td>
									<td>Box</td>
								</tr>
								<tr>
									<td>Manufacturer</td>
									<td>Prayagh Nutri Product Pvt Ltd</td>
								</tr>
								<tr>
									<td>Item part number</td>
									<td>LE 014 - 20pcs Crème Bakes (Pack of 2)</td>
								</tr>
								<tr>
									<td>Net Quantity</td>
									<td>40.00 count</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="tab-pane fade" id="care" role="tabpanel" aria-labelledby="care-tab">
					<div class="information-box">
						<ul>
							<li>Store cream cakes in a refrigerator. Fondant cakes should be
								stored in an air conditioned environment.</li>

							<li>Slice and serve the cake at room temperature and make sure
								it is not exposed to heat.</li>

							<li>Use a serrated knife to cut a fondant cake.</li>

							<li>Sculptural elements and figurines may contain wire supports
								or toothpicks or wooden skewers for support.</li>

							<li>Please check the placement of these items before serving to
								small children.</li>

							<li>The cake should be consumed within 24 hours.</li>

							<li>Enjoy your cake!</li>
						</ul>
					</div>
				</div>

				<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="review-box">
						<div class="row g-4">
							<div class="col-xl-6">
								<div class="review-title">
									<h4 class="fw-500">Customer reviews</h4>
								</div>

								<div class="d-flex">
									<div class="product-rating">
										<ul class="rating">
											<li>
												<i data-feather="star" class="fill"></i>
											</li>
											<li>
												<i data-feather="star" class="fill"></i>
											</li>
											<li>
												<i data-feather="star" class="fill"></i>
											</li>
											<li>
												<i data-feather="star"></i>
											</li>
											<li>
												<i data-feather="star"></i>
											</li>
										</ul>
									</div>
									<h6 class="ms-3">4.2 Out Of 5</h6>
								</div>

								<div class="rating-box">
									<ul>
										<li>
											<div class="rating-list">
												<h5>5 Star</h5>
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 68%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
														68%
													</div>
												</div>
											</div>
										</li>

										<li>
											<div class="rating-list">
												<h5>4 Star</h5>
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 67%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
														67%
													</div>
												</div>
											</div>
										</li>

										<li>
											<div class="rating-list">
												<h5>3 Star</h5>
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 42%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
														42%
													</div>
												</div>
											</div>
										</li>

										<li>
											<div class="rating-list">
												<h5>2 Star</h5>
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
														30%
													</div>
												</div>
											</div>
										</li>

										<li>
											<div class="rating-list">
												<h5>1 Star</h5>
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 24%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
														24%
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>

							<div class="col-xl-6">
								<div class="review-title">
									<h4 class="fw-500">Add a review</h4>
								</div>

								<div class="row g-4">
									<div class="col-md-6">
										<div class="form-floating theme-form-floating">
											<input type="text" class="form-control" id="name" placeholder="Name">
											<label for="name">Your Name</label>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-floating theme-form-floating">
											<input type="email" class="form-control" id="email" placeholder="Email Address">
											<label for="email">Email Address</label>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-floating theme-form-floating">
											<input type="url" class="form-control" id="website" placeholder="Website">
											<label for="website">Website</label>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-floating theme-form-floating">
											<input type="url" class="form-control" id="review1" placeholder="Give your review a title">
											<label for="review1">Review Title</label>
										</div>
									</div>

									<div class="col-12">
										<div class="form-floating theme-form-floating">
											<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
											<label for="floatingTextarea2">Write Your
												Comment</label>
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="review-title">
									<h4 class="fw-500">Customer questions & answers</h4>
								</div>

								<div class="review-people">
									<ul class="review-list">
										<li>
											<div class="people-box">
												<div>
													<div class="people-image">
														<img src="<?php echo get_parent_theme_file_uri( '/assets/images/review/1.jpg' ); ?>" class="img-fluid blur-up lazyload" alt="">
													</div>
												</div>

												<div class="people-comment">
													<a class="name" href="javascript:void(0)">Tracey</a>
													<div class="date-time">
														<h6 class="text-content">14 Jan, 2022 at
															12.58 AM</h6>

														<div class="product-rating">
															<ul class="rating">
																<li>
																	<i data-feather="star" class="fill"></i>
																</li>
																<li>
																	<i data-feather="star" class="fill"></i>
																</li>
																<li>
																	<i data-feather="star" class="fill"></i>
																</li>
																<li>
																	<i data-feather="star"></i>
																</li>
																<li>
																	<i data-feather="star"></i>
																</li>
															</ul>
														</div>
													</div>

													<div class="reply">
														<p>Icing cookie carrot cake chocolate cake
															sugar plum jelly-o danish. Dragée dragée
															shortbread tootsie roll croissant muffin
															cake I love gummi bears. Candy canes ice
															cream caramels tiramisu marshmallow cake
															shortbread candy canes cookie.<a href="javascript:void(0)">Reply</a>
														</p>
													</div>
												</div>
											</div>
										</li>

										<li>
											<div class="people-box">
												<div>
													<div class="people-image">
														<img src="<?php echo get_parent_theme_file_uri( '/assets/images/review/2.jpg' ); ?>" class="img-fluid blur-up lazyload" alt="">
													</div>
												</div>

												<div class="people-comment">
													<a class="name" href="javascript:void(0)">Olivia</a>
													<div class="date-time">
														<h6 class="text-content">01 May, 2022 at
															08.31 AM</h6>
														<div class="product-rating">
															<ul class="rating">
																<li>
																	<i data-feather="star" class="fill"></i>
																</li>
																<li>
																	<i data-feather="star" class="fill"></i>
																</li>
																<li>
																	<i data-feather="star" class="fill"></i>
																</li>
																<li>
																	<i data-feather="star"></i>
																</li>
																<li>
																	<i data-feather="star"></i>
																</li>
															</ul>
														</div>
													</div>

													<div class="reply">
														<p>Tootsie roll cake danish halvah powder
															Tootsie roll candy marshmallow cookie
															brownie apple pie pudding brownie
															chocolate bar. Jujubes gummi bears I
															love powder danish oat cake tart
															croissant.<a href="javascript:void(0)">Reply</a>
														</p>
													</div>
												</div>
											</div>
										</li>

										<li>
											<div class="people-box">
												<div>
													<div class="people-image">
														<img src="<?php echo get_parent_theme_file_uri( '/assets/images/review/3.jpg' ); ?>" class="img-fluid blur-up lazyload" alt="">
													</div>
												</div>

												<div class="people-comment">
													<a class="name" href="javascript:void(0)">Gabrielle</a>
													<div class="date-time">
														<h6 class="text-content">21 May, 2022 at
															05.52 PM</h6>

														<div class="product-rating">
															<ul class="rating">
																<li>
																	<i data-feather="star" class="fill"></i>
																</li>
																<li>
																	<i data-feather="star" class="fill"></i>
																</li>
																<li>
																	<i data-feather="star" class="fill"></i>
																</li>
																<li>
																	<i data-feather="star"></i>
																</li>
																<li>
																	<i data-feather="star"></i>
																</li>
															</ul>
														</div>
													</div>

													<div class="reply">
														<p>Biscuit chupa chups gummies powder I love
															sweet pudding jelly beans. Lemon drops
															marzipan apple pie gingerbread macaroon
															croissant cotton candy pastry wafer.
															Carrot cake halvah I love tart caramels
															pudding icing chocolate gummi bears.
															Gummi bears danish cotton candy muffin
															marzipan caramels awesome feel. <a href="javascript:void(0)">Reply</a>
														</p>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
