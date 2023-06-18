<?php
/**
 * Initialize 
 */
?>
<?php
    /**
     * get max price from db and set 
     */
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => '_price',
                'value' => '',
                'compare' => '!=',
                'type' => 'NUMERIC'
            )
        ),
        'orderby' => 'meta_value_num',
        'meta_key' => '_price',
        'order' => 'DESC'
    );

    $price_query = new WP_Query( $args );

    if ( $price_query->have_posts() ) {
        $max_price = get_post_meta( $price_query->posts[0]->ID, '_price', true );
    } else {
        $max_price = 9999;
    }

    /**
     * get current price from url
     */
    $cur_price = '0-'.$max_price;

    
    if ( isset( $_GET['price'] ) && $_GET['price'] ) { 
        $cur_price = $_GET['price'];
    
    }
    $delimiter = "-";
    $arr_cur_price = explode($delimiter, $cur_price);


    $from_price = $arr_cur_price[0];
    $to_price   = $arr_cur_price[1];


    /**
     * get current category from url
     */

    $category = '';
    $category_arr = array();
    if ( isset( $_GET['category'] ) ) { 

        $category = $_GET['category'];
        $d = ",";
        $category_arr = explode($d, $category);
    }

    function fk_wc_is_category_selected($_c, $category_arr) {
        if ($category_arr && in_array($_c, $category_arr)) {
            return true;
        } else {
            return false;
        }
    }

?>
<?php
    /**
     * get search keyword from url
     */
    $search_product = '';
    
    if ( isset( $_GET['search'] ) ) { 
        $search_product = $_GET['search'];
    }
?>

<?php
/**
 * Event handler 
 */
?>
<form class="woocommerce-pricing" method="get">
	<?php wc_query_string_form_fields( null, array( 'price', 'submit', 'paged', 'product-page' ) ); ?>
    <!-- Initial current price will be changed properly in JS. -->
	<input type="hidden" name="price" value="<?php echo $cur_price; ?>" /> 
	<input type="hidden" name="paged" value="1" />
</form>

<form class="woocommerce-categoring" method="get">
	<?php wc_query_string_form_fields( null, array( 'category', 'submit', 'paged', 'product-page' ) ); ?>
	<!-- Not neccessary initial category, Because we don't confirm the change of category each time of changing the category selection. -->
	<input type="hidden" name="category" value="" /> 
	<input type="hidden" name="paged" value="1" />
</form>

<?php
/**
 * Template 
 */
?>
<div class="accordion custome-accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <span>Price</span>
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree">
            <div class="accordion-body">
                <div class="range-slider">
                    <input type="text" class="js-range-slider" hidden
                        data-max-price ="<?php echo $max_price ?>"
                        data-from-price="<?php echo $from_price ?>"
                        data-to-price  ="<?php echo $to_price ?>" />
                </div>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <span>Categories</span>
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
            <div class="accordion-body">
                <ul class="category-list custom-padding custom-height">
                    <?php
                        // Product category Loop
                        $terms = get_terms( array(
                            'taxonomy'   => 'product_cat', 
                            'hide_empty' => true, 
                        ));

                        // Loop through all category with a foreach loop
                        foreach( $terms as $term ) {
                            echo '<li>
                                    <div class="form-check ps-0 m-0 category-list-box">
                                        <input id="'.$term->term_id.'" onchange="javascript:fk_wc_product_categoring()" class="checkbox_animated" type="checkbox" ';

                                            // determine whether each category is selected or not initially
                                            if(fk_wc_is_category_selected($term->term_id, $category_arr)) {
                                                echo 'checked >';
                                            } else {
                                                echo '>';
                                            }
                                    echo '
                                        <label class="form-check-label" for="'.$term->term_id.'" style="cursor: pointer">
                                            <span class="name">'.$term->name.'</span>
                                            <span class="number">('.$term->count.')</span>
                                        </label>

                                    </div>
                                </li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <span>Food Preference</span>
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo">
            <div class="accordion-body">
                <ul class="category-list custom-padding">
                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="veget">
                            <label class="form-check-label" for="veget">
                                <span class="name">Vegetarian</span>
                                <span class="number">(08)</span>
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="non">
                            <label class="form-check-label" for="non">
                                <span class="name">Non Vegetarian</span>
                                <span class="number">(09)</span>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->

    <!-- <div class="accordion-item">
        <h2 class="accordion-header" id="headingSix">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                <span>Rating</span>
            </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse collapse show" aria-labelledby="headingSix">
            <div class="accordion-body">
                <ul class="category-list custom-padding">
                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox">
                            <div class="form-check-label">
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
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                </ul>
                                <span class="text-content">(5 Star)</span>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox">
                            <div class="form-check-label">
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
                                <span class="text-content">(4 Star)</span>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox">
                            <div class="form-check-label">
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
                                <span class="text-content">(3 Star)</span>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox">
                            <div class="form-check-label">
                                <ul class="rating">
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
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <span class="text-content">(2 Star)</span>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox">
                            <div class="form-check-label">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <span class="text-content">(1 Star)</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->

    <!-- <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <span>Discount</span>
            </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour">
            <div class="accordion-body">
                <ul class="category-list custom-padding">
                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                <span class="name">upto 5%</span>
                                <span class="number">(06)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault1">
                                <span class="name">5% - 10%</span>
                                <span class="number">(08)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault2">
                            <label class="form-check-label" for="flexCheckDefault2">
                                <span class="name">10% - 15%</span>
                                <span class="number">(10)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault3">
                            <label class="form-check-label" for="flexCheckDefault3">
                                <span class="name">15% - 25%</span>
                                <span class="number">(14)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault4">
                            <label class="form-check-label" for="flexCheckDefault4">
                                <span class="name">More than 25%</span>
                                <span class="number">(13)</span>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                <span>Pack Size</span>
            </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive">
            <div class="accordion-body">
                <ul class="category-list custom-padding custom-height">
                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault5">
                            <label class="form-check-label" for="flexCheckDefault5">
                                <span class="name">400 to 500 g</span>
                                <span class="number">(05)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault6">
                            <label class="form-check-label" for="flexCheckDefault6">
                                <span class="name">500 to 700 g</span>
                                <span class="number">(02)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault7">
                            <label class="form-check-label" for="flexCheckDefault7">
                                <span class="name">700 to 1 kg</span>
                                <span class="number">(04)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault8">
                            <label class="form-check-label" for="flexCheckDefault8">
                                <span class="name">120 - 150 g each Vacuum 2 pcs</span>
                                <span class="number">(06)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault9">
                            <label class="form-check-label" for="flexCheckDefault9">
                                <span class="name">1 pc</span>
                                <span class="number">(09)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault10">
                            <label class="form-check-label" for="flexCheckDefault10">
                                <span class="name">1 to 1.2 kg</span>
                                <span class="number">(06)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault11">
                            <label class="form-check-label" for="flexCheckDefault11">
                                <span class="name">2 x 24 pcs Multipack</span>
                                <span class="number">(03)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault12">
                            <label class="form-check-label" for="flexCheckDefault12">
                                <span class="name">2x6 pcs Multipack</span>
                                <span class="number">(04)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault13">
                            <label class="form-check-label" for="flexCheckDefault13">
                                <span class="name">4x6 pcs Multipack</span>
                                <span class="number">(05)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault14">
                            <label class="form-check-label" for="flexCheckDefault14">
                                <span class="name">5x6 pcs Multipack</span>
                                <span class="number">(09)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault15">
                            <label class="form-check-label" for="flexCheckDefault15">
                                <span class="name">Combo 2 Items</span>
                                <span class="number">(10)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault16">
                            <label class="form-check-label" for="flexCheckDefault16">
                                <span class="name">Combo 3 Items</span>
                                <span class="number">(14)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault17">
                            <label class="form-check-label" for="flexCheckDefault17">
                                <span class="name">2 pcs</span>
                                <span class="number">(19)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault18">
                            <label class="form-check-label" for="flexCheckDefault18">
                                <span class="name">3 pcs</span>
                                <span class="number">(14)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault19">
                            <label class="form-check-label" for="flexCheckDefault19">
                                <span class="name">2 pcs Vacuum (140 g to 180 g each
                                    )</span>
                                <span class="number">(13)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault20">
                            <label class="form-check-label" for="flexCheckDefault20">
                                <span class="name">4 pcs</span>
                                <span class="number">(18)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault21">
                            <label class="form-check-label" for="flexCheckDefault21">
                                <span class="name">4 pcs Vacuum (140 g to 180 g each
                                    )</span>
                                <span class="number">(07)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault22">
                            <label class="form-check-label" for="flexCheckDefault22">
                                <span class="name">6 pcs</span>
                                <span class="number">(09)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault23">
                            <label class="form-check-label" for="flexCheckDefault23">
                                <span class="name">6 pcs carton</span>
                                <span class="number">(11)</span>
                            </label>
                        </div>
                    </li>

                    <li>
                        <div class="form-check ps-0 m-0 category-list-box">
                            <input class="checkbox_animated" type="checkbox" id="flexCheckDefault24">
                            <label class="form-check-label" for="flexCheckDefault24">
                                <span class="name">6 pcs Pouch</span>
                                <span class="number">(16)</span>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
</div>