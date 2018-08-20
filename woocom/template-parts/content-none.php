<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woocom
 */

?>

<section class="no-results not-found">

	<div class="page-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<section class="ptb-60 gray-bg error-block-main">
				    <div class="container">
				      <div class="row">
				        <div class="col-xs-12">
				          <div class="error-block-detail">
				            <div class="row">
				              <div class="col-lg-6 col-lg-offset-3 col-md-6">
				                	<header class="page-header">
										<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'woocom' ); ?></h1>
									</header><!-- .page-header -->

				                <div class="error-small-text">We are Sorry</div>
				                <div class="error-slogan">The page you Are Looking for does not Exist</div>
				                <h2>Search Again</h2>
				                <?php echo get_search_form() ?>
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

	</div><!-- .page-content -->
</section><!-- .no-results -->
