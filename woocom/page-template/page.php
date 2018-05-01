<?php
/**
 * template Name: About Page
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woocom
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
<?php
	/* Start the Loop */
									while ( have_posts() ) :
										the_post();

										/*
										 * Include the Post-Type-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
										 */
the_content();
									endwhile;

?>
</main>
</div>

<?php get_footer();
