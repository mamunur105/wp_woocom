<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/* ---------------------------------------------------------------------------
 * Enqueue Style
 * --------------------------------------------------------------------------- */

// add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
// function my_theme_enqueue_styles() {
//     wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
// }


function my_theme_enqueue_styles() {

    $parent_style = 'woocom-style'; 
	wp_dequeue_style( $parent_style );
    wp_enqueue_style( 'parent', get_template_directory_uri() . '/style.css');
    wp_enqueue_style( $parent_style, get_stylesheet_directory_uri());
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles',11);
