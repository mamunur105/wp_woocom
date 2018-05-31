<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'woocom' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'woocom' ),
		'before_widget' => '<div id="%1$s" class="sidebar-box listing-box mb-40 %2$s "> <span class="opener plus"></span> ',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar-title"><h2>',
		'after_title'   => '</h2></div>',
	) );
}
add_action( 'widgets_init', 'blog_widgets_init' );


function woocom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Sidebar', 'woocom' ),
		'id'            => 'sidebar-woocom',
		'description'   => esc_html__( 'Add widgets here.', 'woocom' ),
		'before_widget' => '<div id="%1$s" class="sidebar-box listing-box mb-40 %2$s "> <span class="opener plus"></span> ',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'woocom_widgets_init' );

