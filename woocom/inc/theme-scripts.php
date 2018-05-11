<?php
/**
 * Enqueue scripts and styles.
 */
function woocom_scripts() {

	wp_enqueue_style( 'woocom-font-awesome', THEME_URI.'/css/font-awesome.min.css' );
	wp_enqueue_style( 'woocom-bootstrap', THEME_URI.'/css/bootstrap.css' );
	wp_enqueue_style( 'woocom-jquery-ui', THEME_URI.'/css/jquery-ui.css' );
	wp_enqueue_style( 'woocom-owl-carousel', THEME_URI.'/css/owl.carousel.css' );
	wp_enqueue_style( 'woocom-magnific-popup', THEME_URI.'/css/magnific-popup.css' );
	wp_enqueue_style( 'woocom-fotorama', THEME_URI.'/css/fotorama.css' );
	wp_enqueue_style( 'woocom-coustom', THEME_URI.'/css/custom.css' );
	wp_enqueue_style( 'woocom-style', get_stylesheet_uri() );
	wp_enqueue_style( 'woocom-responsive', THEME_URI.'/css/responsive.css' );

	// theme js 
	wp_enqueue_script( 'bootstrap', THEME_URI.'/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'jquery-ui', THEME_URI.'/js/jquery-ui.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'fotorama', THEME_URI.'/js/fotorama.js', array('jquery'), '', true );
	wp_enqueue_script( 'magnific-popup', THEME_URI.'/js/jquery.magnific-popup.js', array('jquery'), '', true );
	wp_enqueue_script( 'owl-carousel', THEME_URI.'/js/owl.carousel.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'custom', THEME_URI.'/js/custom.js', array('jquery'), '', true );


	wp_enqueue_script( 'woocom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'woocom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	


}
add_action( 'wp_enqueue_scripts', 'woocom_scripts' );


