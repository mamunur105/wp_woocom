<?php
define('THEME_URI', get_template_directory_uri());
define('THEME_PATH', get_template_directory());

/**
 * woocom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package woocom
 */

if ( ! function_exists( 'woocom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function woocom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on woocom, use a find and replace
		 * to change 'woocom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'woocom', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-main' => esc_html__( 'Main Menu', 'woocom' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'woocom_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'woocommerce' );
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');


		add_image_size( 'img-50-50', 50, 50 ); 

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'woocom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function woocom_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'woocom_content_width', 640 );
}
add_action( 'after_setup_theme', 'woocom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

require THEME_PATH. '/inc/sidebar-register.php';

/**
 * Enqueue scripts and styles.
 */
require THEME_PATH. '/inc/theme-scripts.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/////////////////
require THEME_PATH. '/plugin/tgm/tgm-custom.php';
// require THEME_PATH. '/plugin/new-social-media-widget/new-social-media-widget.php';


// require THEME_PATH. '/plugin/tgm/class-tgm-plugin-activation.php';

// woocom all function 

require THEME_PATH. '/inc/woocom-function.php';
 
require THEME_PATH. '/inc/custom-comments.php';

require THEME_PATH. '/inc/walker_menu.php';

// catagory.php

require THEME_PATH. '/inc/catagory.php';

require THEME_PATH. '/inc/best-sell.php';
// require THEME_PATH. '/inc/contact-info.php';

require THEME_PATH. '/plugin/redux/redux-config.php';



add_action( 'init', 'drubo_custompost_type' );
function drubo_custompost_type() {
 	//Create a custom post for Portfolio...
 	$labels = array(
 				'name'					=> 'Portfolio',
 				'singular_name'			=> 'Portfolio',
 				'add_new'				=> 'Add Portfolio',
 				'all_items'				=> 'All Portfolio',
 				'add_new_item'			=> 'Add Portfolio',
 				'edit_item'				=> 'Edit Portfolio',
 				'new_item'				=> 'New Portfolio',
 				'view_item'				=> 'View Portfolio',
 				'search_item'			=> 'Search Portfolio Post',
 				'not_found'				=> 'No Portfolio Found',
 				'not_found_in_trash' 	=> 'No Portfolio In Trash',
 				'parent_item_colon'		=> 'Parent Portfolio'
 			);
 	// Create a Aruments Array that Store all argumens of posts..
 	$args = array(
 			'labels'				=> $labels,
 			'menu_icon'				=> 'fa fa-briefcase',
 			// dashicons-art
 			'public'				=> true,
 			'has_archive'			=> true,
 			'publicly_queryable'	=> true,
 			'query_var'				=> true,
 			'rewrite'				=> true,
 			'capability-type'		=> 'post',
 			'hierarchical'			=> true,
 			// $Supports Array Create Custome From Fiels In WP-Dashbord,Defults are (title,Editor)
 			'supports'				=> array(
 										'title',
 										'editor',
 										'excerpt',
 										'thumbnail',
 										'comments'
 									),
 			'taxonomies'			=> array( ''),
 			'menu_position'			=> 5,
 			// 'exclude_from_search'	=> false
 		);
 	register_post_type( 'portfolio', $args );
}
/**
 * Create Custom Place Holders..
 */
add_filter('enter_title_here', 'drubo_title_placeholder', 0, 2 );
function drubo_title_placeholder( $title , $post ){
	if( $post->post_type == 'portfolio' ) {
		$cx_title = "Enter Portfolio Title..";
		return $cx_title;
	} 

	return $title;
}
function drubo_portfolio_taxonomies_type() {
	// add new taxonomy hierarchical
	$labels = array(
		'name' 				=> __('Portfolio Categories', 'reveal'),
		'singular_name' 	=> __('Portfolio Category', 'reveal'),
		'search_items' 		=> __('Search Portfolio Category', 'reveal'),
		'all_items' 		=> __('All Portfolio Categories', 'reveal'),
		'parent_item' 		=> __('Parent Portfolio Category', 'reveal'),
		'parent_item_colon' => __('Parent Portfolio Category:', 'reveal'),
		'edit_item' 		=> __('Edit Portfolio Category', 'reveal'),
		'update_item' 		=> __('Update Portfolio Category', 'reveal'),
		'add_new_item' 		=> __('Add New Portfolio Category', 'reveal'),
		'new_item_name' 	=> __('New Portfolio Category Name', 'reveal'),
		'menu_name' 		=> __('Portfolio Categories', 'reveal')
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'has_archive'	=> true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'portfolio-category')
	);
	register_taxonomy('portfolio-category', array('portfolio'), $args);
	// add new taxonomy NON hierarchical
	register_taxonomy('portfolio_tags', 'portfolio', array(
		'label' => 'Portfolio Tags',
		'rewrite' => array('slug' => 'portfolio-tags'),
		'hierarchical' => false
	));
}
add_action('init', 'drubo_portfolio_taxonomies_type');


// WISHLIST COPUNT 





// code at the end of functions.php file of your theme

function update_wishlist_count(){
    if( function_exists( 'YITH_WCWL' ) ){
        wp_send_json( YITH_WCWL()->count_products() );
    }
}
add_action( 'wp_ajax_update_wishlist_count', 'update_wishlist_count' );
add_action( 'wp_ajax_nopriv_update_wishlist_count', 'update_wishlist_count' );

function enqueue_custom_wishlist_js(){
	wp_enqueue_script( 'yith-wcwl-custom-js', get_template_directory_uri() . '/js/yith-wcwl-custom.js', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_wishlist_js' );