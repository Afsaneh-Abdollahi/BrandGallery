<?php
define('PATH', get_template_directory_uri());

require_once 'inc/menu.php';
require_once 'inc/cpt.php';
require get_template_directory() . '/inc/customizer.php';
require_once(TEMPLATEPATH . '/inc/acf/setup.php');

/**
 * Add theme support for various WordPress features.
 *
 * @return void
 */
function wp_blank_setup()
{
    // Support programmable title tag.
    add_theme_support('title-tag');

    // Support custom logo.
    add_theme_support('custom-logo');
    // woocommerce
    add_theme_support('woocommerce');

    //post thumbnail
    add_theme_support('post-thumbnails');
    /**
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on wp-blank, use a find and replace
     * to change 'wp-blank' to the name of your theme in all the template files.
     */
    load_theme_textdomain('wp-blank', get_template_directory() . '/languages');

    // Register top menu.
//	register_nav_menus(
//		array(
//			'top' => esc_html__( 'Top Menu', 'wp-blank' ),
//		)
//	);
}

add_action('after_setup_theme', 'wp_blank_setup');


/**
 * Specify JS bundle path.
 *
 * @return void
 */
function wp_blank_load_scripts()
{
    wp_enqueue_script('jquery-min', PATH . '/js/jquery.min.js', array('jquery'), null, true);
    wp_enqueue_script('resize', PATH . '/js/ResizeSensor.min.js', array('jquery'), null, true);
    wp_enqueue_script('sticky', PATH . '/js/theia-sticky-sidebar.min.js', array('jquery'), null, true);
    wp_enqueue_script('swiper', PATH . '/js/swiper.min.js', array('jquery'), null, true);
    wp_enqueue_script('matchHeight', PATH . '/js/jquery.matchHeight-min.js', array('jquery'), null, true);
    wp_enqueue_script('bootstrap', PATH . '/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('all.min', PATH . '/js/all.min.js', array('jquery'), null, true);
    wp_enqueue_script('main-js', PATH . '/js/main.js', array('jquery'), null, true);


}

add_action('wp_enqueue_scripts', 'wp_blank_load_scripts');

/**
 * Specify CSS bundle path.
 *
 * @return void
 */
function wp_blank_load_styles()
{
    wp_enqueue_style('bootstrap', PATH . '/css/bootstrap.min.css', false, '1.1', 'all');
    wp_enqueue_style('all.min', PATH . '/css/all.min.css', false, null, 'all');
    wp_enqueue_style('swiper', PATH . '/css/swiper.min.css', false, '1.1', 'all');
    wp_enqueue_style('main-style', PATH . '/css/style.css', false, '1.1', 'all');
    wp_enqueue_style('custom-colors', PATH . '/css/colors.css', false, '1.1', 'all');
}

add_action('wp_enqueue_scripts', 'wp_blank_load_styles');

/**
 * Register widget area.
 *
 * @return void
 */
function wp_blank_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'wp-blank'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here to appear in your sidebar.', 'wp-blank'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'wp_blank_widgets_init');

//upload webp
function webp_upload_mimes($existing_mimes)
{
    // add webp to the list of mime types
    $existing_mimes['webp'] = 'image/webp';

    // return the array back to the function with our added mime type
    return $existing_mimes;
}

add_filter('mime_types', 'webp_upload_mimes');
///


remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('set_comment_cookies', 'wp_set_comment_cookies');


// add to cart
add_action('woocommerce_before_add_to_cart_form', 'before_add_to_cart');
function before_add_to_cart()
{
    echo '<div class="add-section">';
}

add_action('woocommerce_after_add_to_cart_form', 'after_add_to_cart');
function after_add_to_cart()
{
    echo '</div>';
}


// variation
add_action('woocommerce_before_variations_form', 'before_variations_form');
function before_variations_form()
{
    echo '<div class="variations-section">';
}

add_action('woocommerce_after_variations_form', 'after_variations_form');
function after_variations_form()
{
    echo '</div>';
}

// group product
add_action('woocommerce_before_add_to_cart_form', 'before_group');
function before_group()
{
    global $product;
    if ($product->is_type('grouped')) {
        echo '<div class="product-group-section">';
    }
}

add_action('woocommerce_after_add_to_cart_form', 'after_group');
function after_group()
{
    global $product;
    if ($product->is_type('grouped')) {
        echo '</div>';
    }
}

//row of products
function woocommerce_product_loop_start()
{
    echo '<div class="row">';
}

function woocommerce_product_loop_end()
{
    echo '</div>';
}

// cart section
add_action('woocommerce_before_cart_table', 'before_cart_table');
function before_cart_table()
{
    echo '<div class="cart-section">';
}

add_action('woocommerce_after_cart_table', 'after_cart_table');
function after_cart_table()
{
    echo '</div>';
}

add_action('woocommerce_before_cart_collaterals', 'before_cart_collaterals');
function before_cart_collaterals()
{
    echo '<div class="cart-collaterals-section">';
}

add_action('woocommerce_after_cart_collaterals', 'after_cart_collaterals');
function after_cart_collaterals()
{
    echo '</div>';
}

// cart section
add_action('woocommerce_before_checkout_form', 'before_checkout_form');
function before_checkout_form()
{
    echo '<div class="checkout-section">';
}

add_action('woocommerce_after_checkout_form', 'after_checkout_form');
function after_checkout_form()
{
    echo '</div>';
}


//lost password
add_action('woocommerce_before_lost_password_form', 'before_lost_password_form');
function before_lost_password_form()
{
    echo '<div class="lostPass-section"><div class="row align-items-center"><div class="col-lg-4">
<img src="' . path . '/images/forgot_password_vector.png" class="img-fluid"></div><div class="col-lg-8">';
}

add_action('woocommerce_after_lost_password_form', 'after_lost_password_form');
function after_lost_password_form()
{
    echo '</div></div></div>';
}

//account navigation
add_action('woocommerce_before_account_navigation', 'before_account_navigation');
function before_account_navigation()
{
    echo '<div class="account-nav-section">';
}

add_action('woocommerce_after_account_navigation', 'after_account_navigation');
function after_account_navigation()
{
    echo '</div><div class="clearfix"></div>';
}

//account orders
add_action('woocommerce_before_account_orders', 'before_account_orders');
function before_account_orders()
{
    echo '<div class="account-orders-section">';
}

add_action('woocommerce_after_account_orders', 'after_account_orders');
function after_account_orders()
{
    echo '</div>';
}

//account address
add_action('woocommerce_before_edit_account_address_form', 'before_edit_account_address_form');
function before_edit_account_address_form()
{
    echo '<div class="account-address-section">';
}

add_action('woocommerce_after_edit_account_address_form', 'after_edit_account_address_form');
function after_edit_account_address_form()
{
    echo '</div>';
}

//account edit
add_action('woocommerce_before_edit_account_form', 'before_edit_account_form');
function before_edit_account_form()
{
    echo '<div class="account-edit-section">';
}

add_action('woocommerce_after_edit_account_form', 'after_edit_account_form');
function after_edit_account_form()
{
    echo '</div>';
}

//feature product
function hb_attribute()
{
    global $product;
    $attributes = $product->get_attributes();
//        if limited features
    $counter = 0;
    if (!empty($attributes)) {
        echo '<strong>ویژگی های مهم</strong>';
        foreach ($attributes as $attribute) if ($counter < 3) {
            $name = $attribute->get_name();
            if ($attribute->is_taxonomy()) {
                $terms = wp_get_post_terms($product->get_id(), $name, 'all');
                $product_tax = $terms[0]->taxonomy;
                $product_object_tax = get_taxonomy($product_tax);
                $product_tax_label = $product_object_tax->labels->singular_name;
                echo '<li>';
                echo $product_tax_label . ' : ';
                $product_tax_terms = array();
                foreach ($terms as $term) {
                    $product_tax_terms[] = $term->name;
                }
                echo implode(', ', $product_tax_terms) . '<br>';
                echo '</li>';
            }
            $counter++;
        }
    }
}

add_filter('woocommerce_variable_sale_price_html', 'wc_wc20_variation_price_format', 10, 2);
add_filter('woocommerce_variable_price_html', 'wc_wc20_variation_price_format', 10, 2);
function wc_wc20_variation_price_format($price, $product)
{
    $min_price = $product->get_variation_price('min', true);
    $price = sprintf(__('%1$s', 'woocommerce'), wc_price($min_price));
    return $price;
}

//    move comment to bottom
function wpb_move_comment_field_to_bottom($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter('comment_form_fields', 'wpb_move_comment_field_to_bottom');


add_action( 'woocommerce_sale_flash', 'bbloomer_show_sale_percentage_loop', 10 );
function bbloomer_show_sale_percentage_loop() {
    global $product;
    if ( ! $product->is_on_sale() ) return;
    if ( $product->is_type( 'simple' ) ) {
        $max_percentage = ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100;
    } elseif ( $product->is_type( 'variable' ) ) {
        $max_percentage = 0;
        foreach ( $product->get_children() as $child_id ) {
            $variation = wc_get_product( $child_id );
            $price = $variation->get_regular_price();
            $sale = $variation->get_sale_price();
            if ( $price != 0 && ! empty( $sale ) ) $percentage = ( $price - $sale ) / $price * 100;
            if ( $percentage > $max_percentage ) {
                $max_percentage = $percentage;
            }
        }
    }
    if ( $max_percentage > 0 )
        return '<span class="onsale">'.round($max_percentage).'%</span>';
}
add_action( 'woocommerce_single_product_summary', 'simple_product_saving_percentage', 11 );

function simple_product_saving_percentage() {
    global $product;
    if( $product->is_type('simple') && $product->is_on_sale() ) {
        $regular_price = (float) wc_get_price_to_display( $product, array('price' => $product->get_regular_price() ) );
        $active_price  = (float) wc_get_price_to_display( $product, array('price' => $product->get_sale_price() ) );
        $saved_amount  = $regular_price - $active_price;
        $percentage    = round( $saved_amount / $regular_price * 100 );
        if ($product->is_in_stock()) {
            echo '<p id="saving_total_price">'. __("تخفیف شما") .': '.$percentage.'% </p>';   } }
}
add_filter( 'woocommerce_available_variation', 'variable_product_saving_percentage', 10, 3 );

function variable_product_saving_percentage( $data, $product, $variation ) {
    if( $variation->is_on_sale() ) {
        $saved_amount  = $data['display_regular_price'] - $data['display_price'];
        $percentage    = round( $saved_amount / $data['display_regular_price'] * 100 );
        if ($product->is_in_stock()) {
            $data['price_html'] .= '<p id="saving_total_price">'. __("تخفیف شما") .': '.$percentage.'%</p>';  }  }
    return $data;
}

add_action( 'woocommerce_single_product_summary', 'dev_designs_show_sku', 5 );
function dev_designs_show_sku(){
    global $product;

    echo '<div class="sku_product" >'.'شناسه محصول: ' . $product->get_sku().'</div>';
}


// #1 Add New Product Type to Select Dropdown
add_filter( 'product_type_selector', 'rngwc_add_custom_pt' );
function rngwc_add_custom_pt( $types ){
    $types[ 'software' ] = __('SoftWare');
    return $types;
}
// #2 Add New Product Type Class
add_action( 'init', 'rngwc_create_custom_pt' );
function rngwc_create_custom_pt(){
    class WC_Product_Software extends WC_Product {
        public function get_type() {
            return 'software';
        }
    }
}
// #3 Load New Product Type Class
add_filter( 'woocommerce_product_class', 'rngwc_woocommerce_pt', 10, 2 );
function rngwc_woocommerce_pt( $classname, $product_type ) {
    if ( $product_type == 'software' ) {
        $classname = 'WC_Product_Software';
    }
    return $classname;
}

//pagination
function bittersweet_pagination()
{

    global $wp_query;

    if ($wp_query->max_num_pages <= 1) return;

    $big = 999999999; // need an unlikely integer

    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'array',
        'prev_text' => __('قبلی'),
        'next_text' => __('بعدی'),
    ));
    if (is_array($pages)) {
        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
        echo '<div class="pagination-wrap"><ul class="pagination">';
        foreach ($pages as $page) {
            echo "<li>$page</li>";
        }
        echo '</ul></div>';
    }
}

// sale and main product price
add_filter( 'woocommerce_variable_sale_price_html', 'wpglorify_variation_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'wpglorify_variation_price_format', 10, 2 );

function wpglorify_variation_price_format( $price, $product ) {

// Main Price
    $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
    $price = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

// Sale Price
    $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
    sort( $prices );
    $saleprice = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

    if ( $price !== $saleprice ) {
        $price = '<del>' . $saleprice . $product->get_price_suffix() . '</del> <ins>' . $price . $product->get_price_suffix() . '</ins>';
    }
    return $price;
}

add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
    $cols = 12;
    return $cols;
}
