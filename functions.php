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
function wp_blank_setup() {
	// Support programmable title tag.
	add_theme_support( 'title-tag' );

	// Support custom logo.
	add_theme_support( 'custom-logo' );

	//post thumbnail
	add_theme_support( 'post-thumbnails' );
	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wp-blank, use a find and replace
	 * to change 'wp-blank' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-blank', get_template_directory() . '/languages' );

	// Register top menu.
//	register_nav_menus(
//		array(
//			'top' => esc_html__( 'Top Menu', 'wp-blank' ),
//		)
//	);
}
add_action( 'after_setup_theme', 'wp_blank_setup' );




/**
 * Specify JS bundle path.
 *
 * @return void
 */
function wp_blank_load_scripts() {
	wp_enqueue_script('jquery-min', PATH . '/js/jquery.min.js',array('jquery'), null, true );
    wp_enqueue_script('resize', PATH . '/js/ResizeSensor.min.js',array('jquery'), null, true );
    wp_enqueue_script('sticky', PATH . '/js/theia-sticky-sidebar.min.js',array('jquery'), null, true );
	wp_enqueue_script('swiper', PATH . '/js/swiper.min.js',array('jquery'), null, true );
	wp_enqueue_script('matchHeight', PATH . '/js/jquery.matchHeight-min.js',array('jquery'), null, true );
	wp_enqueue_script('bootstrap', PATH . '/js/bootstrap.min.js',array('jquery'), null, true );
	wp_enqueue_script('all.min', PATH . '/js/all.min.js',array('jquery'), null, true );
	wp_enqueue_script('main-js', PATH . '/js/main.js',array('jquery'), null, true );


}
add_action( 'wp_enqueue_scripts', 'wp_blank_load_scripts' );

/**
 * Specify CSS bundle path.
 *
 * @return void
 */
function wp_blank_load_styles() {
	wp_enqueue_style('bootstrap', PATH . '/css/bootstrap.min.css',false,'1.1','all');
    wp_enqueue_style('all.min', PATH . '/css/all.min.css', false, null, 'all');
    wp_enqueue_style('swiper', PATH . '/css/swiper.min.css',false,'1.1','all');
	wp_enqueue_style('main-style', PATH . '/css/style.css',false,'1.1','all');
	wp_enqueue_style('custom-colors', PATH . '/css/colors.css',false,'1.1','all');
}
add_action( 'wp_enqueue_scripts', 'wp_blank_load_styles' );

/**
 * Register widget area.
 *
 * @return void
 */
function wp_blank_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wp-blank' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'wp-blank' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wp_blank_widgets_init' );

//upload webp
function webp_upload_mimes( $existing_mimes ) {
	// add webp to the list of mime types
	$existing_mimes['webp'] = 'image/webp';

	// return the array back to the function with our added mime type
	return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );
///


//on sale
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
////