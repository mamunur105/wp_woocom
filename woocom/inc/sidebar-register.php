<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// general sidebar 
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

// woocommearce sidebar 
function woocom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Sidebar', 'woocom' ),
		'id'            => 'sidebar-woocom',
		'description'   => esc_html__( 'Add widgets here.', 'woocom' ),
		'before_widget' => '<div id="%1$s" class="sidebar-box listing-box sidebar-item mb-40 %2$s "> <span class="opener plus"></span> ',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'woocom_widgets_init' );


// footer top 
function footer_top_sidebar() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top ', 'woocom' ),
		'id'            => 'footer-top',
		'description'   => esc_html__( 'Add widgets here.', 'woocom' ),
		'before_widget' => '<div id="%1$s" class=" col-md-4 widget_text %2$s "><div class="footer-static-block"> ',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'footer_top_sidebar' );


// footer middle
function footer_middle_sidebar() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Middle ', 'woocom' ),
		'id'            => 'footer-middle',
		'description'   => esc_html__( 'Add widgets here.', 'woocom' ),
		'before_widget' => '<div id="%1$s" class=" col-md-3 f-col  %2$s "><div class="footer-static-block link "> ',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'footer_middle_sidebar' );

