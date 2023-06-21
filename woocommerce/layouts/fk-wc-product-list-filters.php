<?php
/**
 * Remove the prefix 'Sort by' from ordering content
 */

add_filter( 'woocommerce_catalog_orderby', 'custom_catalog_orderby', 20 );

function custom_catalog_orderby( $orderby ) {

    foreach ( $orderby as $key => $value ) :
        $value = str_replace("Sort by ", "", $value);
        $orderby[$key] = $value;
    endforeach;

    console($orderby);
    return $orderby;
}

add_action( 'pre_get_posts', 'woocommerce_products_per_page' );

function woocommerce_products_per_page( $query ) {

    global $fk_wc_catalog_perpage_current;
    global $fk_wc_catalog_perpage_default;

    if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'product' ) ) {

        /**
         * limit (alias for posts_per_page)
         */
        if ( isset( $_GET['limit'] ) ) { //If there is limit parameter in the URL...

            console('limit parameter is passed!');
            console($_GET['limit']);

            $posts_per_page = $_GET['limit'];

            $fk_wc_catalog_perpage_current = $posts_per_page;
            $query->set( 'posts_per_page', $fk_wc_catalog_perpage_current );

        } else {

            console('limit parameter is not passed!');
            console('so perpage_defailt value is applied.');
            console($fk_wc_catalog_perpage_default);

            $fk_wc_catalog_perpage_current = $fk_wc_catalog_perpage_default;
            $query->set( 'posts_per_page', $fk_wc_catalog_perpage_current );
        }

        /**
         * search (alias for s)
         */
        if ( isset( $_GET['search'] ) ) { 

            $s = $_GET['search'];

            $query->set( 's', $s );
        }

        /**
         * price (consists of from and to price)
         */
        if ( isset( $_GET['price'] ) && $_GET['price'] ) { 

            $cur_price = $_GET['price'];
            
            $delimiter = "-";
            $arr_cur_price = explode($delimiter, $cur_price);
        
            $from_price = $arr_cur_price[0];
            $to_price   = $arr_cur_price[1];
            
            $args = array(
                array(
                    'key' => '_price',
                    'value' => array($from_price,$to_price),
                    'compare' => 'BETWEEN',
                    'type' => 'NUMERIC'
                )
            );

            $query->set( 'meta_query', $args );
        }

        /**
         * category (category array seperated ',')
         */
        if ( isset( $_GET['category'] ) && $_GET['category'] ) { 

            $category = $_GET['category'];

            $delimiter = ",";
            $category_arr = explode($delimiter, $category);

            $args = array(
                array(
                    'taxonomy'  => 'product_cat',
                    'field'     => 'term_id',
                    'terms'     => $category_arr,
                    'operator'  => 'IN',
                )
            );
    
            $query->set( 'tax_query', $args );
        }
    }
}

// Search titles only 
add_filter('posts_search', '__search_by_title_only', 500, 2);
function __search_by_title_only( $search, $wp_query )
{
    /**
     * 
     * result of console($search);
     * AND (((wp_posts.post_title   LIKE '{b169df1d2313a8d101edbb7a202bbf2cbae30c058ef7faba081a889608f8e59b}te{b169df1d2313a8d101edbb7a202bbf2cbae30c058ef7faba081a889608f8e59b}') 
     *    OR (wp_posts.post_excerpt LIKE '{b169df1d2313a8d101edbb7a202bbf2cbae30c058ef7faba081a889608f8e59b}te{b169df1d2313a8d101edbb7a202bbf2cbae30c058ef7faba081a889608f8e59b}') 
     *    OR (wp_posts.post_content LIKE '{b169df1d2313a8d101edbb7a202bbf2cbae30c058ef7faba081a889608f8e59b}te{b169df1d2313a8d101edbb7a202bbf2cbae30c058ef7faba081a889608f8e59b}')
     * )) 
     * 
     * result of this function
     *        wp_posts.post_title   LIKE '{b5ae561d11fff1a83781f710c7733477b1511e24fb9671fc62d4100af3599f6d}te{b5ae561d11fff1a83781f710c7733477b1511e24fb9671fc62d4100af3599f6d}'
     */
    global $wpdb;
    if(empty($search)) {
        return $search; // skip processing - no search term in query
    }
    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';
    $search =
    $searchand = '';
    foreach ((array)$q['search_terms'] as $term) {
        $term = esc_sql($wpdb->esc_like($term));
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if (!empty($search)) {
        $search = " AND ({$search}) ";
        if (!is_user_logged_in())
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    return $search;
}




/*
add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args' );

function custom_woocommerce_get_catalog_ordering_args( $args ) {
    $orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );

    if ( 'popularity' == $orderby_value ) {
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'desc';
        $args['meta_key'] = 'total_sales';
    }

    return $args;
}
*/

?>