
<?php
include_once 'helpers/fk-helpers.php';
include_once 'assets/fk-assets.php';
include_once 'widgets/fk-widgets.php';
include_once 'shortcodes/fk-shortcodes.php';
include_once 'configs/fk-configs.php';

include_once 'woocommerce/layouts/fk-wc-product-list-layouts.php';
include_once 'woocommerce/layouts/fk-wc-product-list-filters.php';

/**
 * 
 */
$shop_page_id = wc_get_page_id( 'shop' );
// Set the page as the front page
update_option( 'page_on_front', $shop_page_id );






// include_once 'woocommerce/assist/fk-wc-config.php';
// include_once 'woocommerce/assist/fk-wc-helpers.php';
// include_once 'woocommerce/assist/fk-wc-ajax-product-pagination.php';
// include_once 'woocommerce/assist/fk-wc-ajax-product-search.php';


// add_filter( 'page_link', 'my_custom_pagination_class', 10, 2 );

// function my_custom_pagination_class( $output, $args ) {

//     console('dddddddddddddddddddd');
// console($output);


// 	// Replace "page-numbers" with your custom class string
// 	$output = str_replace('page-numbers', 'page-link', $output);
// 	return $output;
// }

// add_filter( "page_link", "modify_page_link_defaults", 10, 3 );
// function modify_page_link_defaults($link, $post_id, $sample) { 
// console($link);
// console($post_id);
// console($sample);

//         return 'http://localhost/food-kingdom/op/'; 

// }



// function my_pagination_args_filter( $args ) {
//     // Modify the arguments passed to the paginate_links() function
//     $args['prev_text'] = __( 'Previous Page', 'my-textdomain' );
//     $args['next_text'] = __( 'Next Page', 'my-textdomain' );
//     return $args;
// }
// add_filter( 'woocommerce_pagination_args', 'my_pagination_args_filter' );
/**
 * Product Query
 */
// add_action( 'pre_get_posts', 'custom_product_query4showing' );
// function custom_product_query4showing( $query ) {
//     if ( ! is_admin() && $query->is_main_query() && is_shop() ) {
//         $query->set( 'posts_per_page', fk_wc_shopbar_getPerPage() );
//         $query->set( 'offset', 0/*fk_wc_shopbar_getPgOffset()*/ );
//         // $query->set( 'orderby', 'price' );
//         // $query->set( 'order', 'DESC' );
//     }
// }

// add_action( 'woocommerce_product_query', 'sort_products_by_price_desc' );
// function sort_products_by_price_desc( $q ) {
//     $q->set( 'orderby', 'meta_value_num' );
//     $q->set( 'meta_key', '_price' );
//     $q->set( 'order', 'DESC' );
// }

// Search titles only 
// add_filter('posts_search', '__search_by_title_only', 500, 2);
// function __search_by_title_only( $search, $wp_query )
// {
//     /**
//      * 
//      * result of console($search);
//      * AND (((wp_posts.post_title   LIKE '{b169df1d2313a8d101edbb7a202bbf2cbae30c058ef7faba081a889608f8e59b}te{b169df1d2313a8d101edbb7a202bbf2cbae30c058ef7faba081a889608f8e59b}') 
//      *    OR (wp_posts.post_excerpt LIKE '{b169df1d2313a8d101edbb7a202bbf2cbae30c058ef7faba081a889608f8e59b}te{b169df1d2313a8d101edbb7a202bbf2cbae30c058ef7faba081a889608f8e59b}') 
//      *    OR (wp_posts.post_content LIKE '{b169df1d2313a8d101edbb7a202bbf2cbae30c058ef7faba081a889608f8e59b}te{b169df1d2313a8d101edbb7a202bbf2cbae30c058ef7faba081a889608f8e59b}')
//      * )) 
//      * 
//      * result of this function
//      *        wp_posts.post_title   LIKE '{b5ae561d11fff1a83781f710c7733477b1511e24fb9671fc62d4100af3599f6d}te{b5ae561d11fff1a83781f710c7733477b1511e24fb9671fc62d4100af3599f6d}'
//      */
//     global $wpdb;
//     if(empty($search)) {
//         return $search; // skip processing - no search term in query
//     }
//     $q = $wp_query->query_vars;
//     $n = !empty($q['exact']) ? '' : '%';
//     $search =
//     $searchand = '';
//     foreach ((array)$q['search_terms'] as $term) {
//         $term = esc_sql($wpdb->esc_like($term));
//         $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
//         $searchand = ' AND ';
//     }
//     if (!empty($search)) {
//         $search = " AND ({$search}) ";
//         if (!is_user_logged_in())
//             $search .= " AND ($wpdb->posts.post_password = '') ";
//     }
//     return $search;
// }




