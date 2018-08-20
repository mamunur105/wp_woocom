<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
  <!-- BANNER STRAT -->
  <div class="banner inner-banner align-center" style="background: url('<?php echo the_post_thumbnail_url()?>') no-repeat scroll center center;background-size: cover;">
    <div class="container">
      <section class="banner-detail">
        <h1 class="banner-title">Login</h1>
        <div class="bread-crumb right-side">
          <ul>
            <li><a href="<?php echo esc_url(home_url());?>">Home</a>/</li>
            <li><span>Login</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>

<section class="checkout-section ptb-60">
    <div class="container">
      <div class="row">


		<?
		wc_print_notices();

		/**
		 * My Account navigation.
		 * @since 2.6.0
		 */
		?>

		<div class="col-md-3 col-sm-4">
		    <div class="account-sidebar account-tab mb-xs-30">
				<?php	do_action( 'woocommerce_account_navigation' ); ?>
			</div>
		</div>
		<div class="col-md-9 col-sm-8">
			<div class="account-content">
			<?php
				/**
				 * My Account content.
				 * @since 2.6.0
				 */
				do_action( 'woocommerce_account_content' );
			?>
			</div>
		</div>


      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 