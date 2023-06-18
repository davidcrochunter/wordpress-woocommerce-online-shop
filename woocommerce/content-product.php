<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div>
    <div class="product-box-3 h-100 wow fadeInUp">
        <div class="product-header">
            <div class="product-image">
                <a href="<?php the_permalink(); ?>">
                    <?php //echo woocommerce_get_product_thumbnail();?>
                    <?php 
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'shop_catalog', ['class' => 'img-fluid blur-up lazyloaded'] );
                        } else {
                            echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" />';
                        } /**/
                    ?>
                </a>

                <ul class="product-option">
                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                            <i data-feather="eye"></i>
                        </a>
                    </li>

                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                        <a href="compare.html">
                            <i data-feather="refresh-cw"></i>
                        </a>
                    </li>

                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                        <a href="wishlist.html" class="notifi-wishlist">
                            <i data-feather="heart"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-footer">
            <div class="product-detail">
                <span class="span-name"><?php //echo fk_wc_get_product_category() ?></span>
                <a href="product-left-thumbnail.html">
                    <h5 class="name"><?php echo $product->get_name(); ?></h5>
                </a>
                <p class="text-content mt-1 mb-2 product-content">Cheesy feet cheesy grin brie.
                    Mascarpone cheese and wine hard cheese the big cheese everyone loves smelly
                    cheese macaroni cheese croque monsieur.</p>
                <div class="product-rating mt-2">
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
                    <span>(4.0)</span>
                </div>
                <h6 class="unit"><?php echo $product->get_sku(); ?></h6>
                <h5 class="price">
                    <span class="theme-color"><?php echo $product->get_price_html(); ?></span>
                    <del><?php // this part is already performed in above code line, so marked: echo $product->get_regular_price(); ?></del>
                </h5>
                <div class="add-to-cart-box bg-white">
                    <button class="btn btn-add-cart addcart-button">Add
                        <span class="add-icon bg-light-gray">
                            <i class="fa-solid fa-plus"></i>
                        </span>
                    </button>
                    <div class="cart_qty qty-box">
                        <div class="input-group bg-white">
                            <button type="button" class="qty-left-minus bg-gray" data-type="minus" data-field="">
                                <i class="fa fa-minus" aria-hidden="true"></i>
                            </button>
                            <input class="form-control input-number qty-input" type="text" name="quantity" value="0">
                            <button type="button" class="qty-right-plus bg-gray" data-type="plus" data-field="">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
