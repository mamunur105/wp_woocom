<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package woocom
 */

?>

	</div><!-- #content -->


	<!-- FOOTER START -->
	<div class="footer">
		<?php if ( is_active_sidebar( 'footer-top' ) ) : ?>
		<div class="footer-top">
			<div class="container">
				<div class="newsletter">
					<div class="newsletter-inner center-sm">
						<div class="row">
							<?php dynamic_sidebar('footer-top') ?>
							<!-- <div class="col-md-4">
								<div class="newsletter-title">
									<div class="newsletter-icon"><img src="<?php echo THEME_URI ?>/images/newsletter-icon.png" alt=" "></div>
									<h2 class="main_title">Subscribe to our newsletter</h2>
								</div>
							</div>

							<div class="col-md-4">
								<input type="email" placeholder="Your email address">
								<button title="Subscribe"><i class="fa fa-paper-plane"></i> Subscribe</button> 
							</div>

							<div class="col-md-4">
								<div class="footer_social right-side float-none-sm pt-sm-15 pb-sm-15 center-sm mt-sm-15">
									<ul class="social-icon">
										<li><div class="title">Follow us on :</div></li>
										<li><a title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
										<li><a title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
										<li><a title="Linkedin" class="linkedin"><i class="fa fa-linkedin"> </i></a></li>
										<li><a title="RSS" class="rss"><i class="fa fa-rss"> </i></a></li>
										<li><a title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
									</ul>
								</div>
							</div>
 							-->
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif;?>
		<?php if ( is_active_sidebar( 'footer-middle' ) ) : ?>
		<div class="footer-middle">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar('footer-middle') ?>
				</div>
			</div>
		</div>
		<?php endif;?>

		<div class="footer-bottom">
			<div class="container">
				<div class="row"> 
					<div class="col-md-6 col-sm-6 center-sm">
						<div class="copy-right"> <p> <?php echo woo_option('copyright-text'); ?></p></div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="payment float-none-xs center-sm">
							<img src="<?php echo THEME_URI ?>/images/payment-method.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="scroll-top">
		<div id="scrollup"></div>
	</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
