<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

		      	<div class="col-md-9 col-sm-8 pb-xs-60">
		      		<div class="blog-listing">
		      			<div class="row">
		      				  	<?php
									if ( have_posts() ) :
										/* Start the Loop */
										while ( have_posts() ) :
											the_post();

											/*
											 * Include the Post-Type-specific template for the content.
											 * If you want to override this in a child theme, then include a file
											 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
											 */
											get_template_part( 'template-parts/content', get_post_type() );

										endwhile;

										if ( comments_open() || get_comments_number() ) :
											comments_template();
											// comments_template( '/custom-templates/alternative-comments.php' ); 
										endif;
									else :

										get_template_part( 'template-parts/content', 'none' );

									endif;
								?>
		      			</div>
		      			
		      		</div>
		      	</div>

		      	<?php get_sidebar(); ?>

		      </div>
		    </div>
		</section>
	  	<!-- CONTAINER END --> 
	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
