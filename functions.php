<?php
define('PATH', get_template_directory_uri());

require_once 'inc/menu.php';
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
	wp_enqueue_script('slick-min', PATH . '/js/slick.min.js',array('jquery'), null, true );
	wp_enqueue_script('main', PATH . '/js/main.js',array('jquery'), null, true );

}
add_action( 'wp_enqueue_scripts', 'wp_blank_load_scripts' );

/**
 * Specify CSS bundle path.
 *
 * @return void
 */
function wp_blank_load_styles() {
	wp_enqueue_style('bootstrap-grid', PATH . '/assets/styles/bootstrap-grid.min.css',false,'1.1','all');
	wp_enqueue_style('slick', PATH . '/assets/styles/slick.css',false,'1.1','all');
	wp_enqueue_style('slick-theme', PATH . '/assets/styles/slick-theme.css',false,'1.1','all');
	wp_enqueue_style('main-style', PATH . '/assets/styles/style.css',false,'1.1','all');
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

?>
