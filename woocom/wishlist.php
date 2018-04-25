<?php
/**
 *Template Name: Wishlist
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woocom
 */

get_header();
?>

	<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woocom
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
  	<!-- CONTAIN START -->
	<section class="ptb-60">
	    <div class="container">
	      <div class="row">

	      	<div class="col-md-12">
	      		<?php 
	      			if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							if(shortcode_exists('ti_wishlistsview')):
								  echo do_shortcode("[ti_wishlistsview]"); 
							endif;
						endwhile;
					endif; 
				?>
	      	</div>

	      </div>
	    </div>
	</section>
  	<!-- CONTAINER END --> 
	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
