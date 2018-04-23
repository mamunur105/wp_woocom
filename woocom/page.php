<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

	      	<div class="col-md-9 col-sm-8 pb-xs-60">
	      		<div class="blog-listing">
	      		<?php if ( have_posts() ) :?>
	      			<div class="row">
	      				  		<?php
							

									if ( is_home() && ! is_front_page() ) :
										?>
										<header>
											<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
										</header>
										<?php
									endif;

									/* Start the Loop */
									while ( have_posts() ) :
										the_post();

										/*
										 * Include the Post-Type-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
										 */
										get_template_part( 'template-parts/content', 'page' );

									endwhile;

							
								?>
	      			</div>
	      			
	      			<?php 
	      			 	
	      			 	else :

							get_template_part( 'template-parts/content', 'none' );

						endif; 
					?>
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
