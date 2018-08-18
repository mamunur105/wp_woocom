<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package woocom
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

						<section class="ptb-60 gray-bg error-block-main">
			    <div class="container">
			      <div class="row">
			        <div class="col-xs-12">
			          <div class="error-block-detail">
			            <div class="row">
			              <div class="col-lg-6 col-lg-offset-3 col-md-6">
			                <div class="main-error-text">404</div>
			                <div class="error-small-text">We are Sorry</div>
			                <div class="error-slogan">The page you Are Looking for does not Exist</div>
			                <div class="mt-40"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-color big">Back To Home </a> </div>
			              </div>
			            </div>
			          </div>
			        </div>
			      </div>
			    </div>
			 </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
