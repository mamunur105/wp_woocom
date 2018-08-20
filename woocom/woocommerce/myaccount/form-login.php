<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php wc_print_notices(); ?>
 
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
      		
				
           
  <!-- BANNER END --> 
<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

	<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : 
		echo '<div class="col-md-6 ">';
	?>
	<?php else:  ?>
		<div class="col-lg-6 col-md-8 col-sm-8 col-lg-offset-3 col-sm-offset-2">

	<?php endif; ?>
			<form class=" main-form full" method="post">

				<div class="col-xs-12 mb-20">
					<div class="heading-part heading-bg">
					  	<h2 class="heading" ><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>
					</div>
				</div>

				<?php do_action( 'woocommerce_login_form_start' ); ?>


						<div class="col-xs-12 ">
							<div class="input-box">
							  <label for="login-email"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?></label>
							  <input id="login-email" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" placeholder="<?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" />
							</div>
						</div>
						<div class="col-xs-12">
						    <div class="input-box ">
								<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
								<input id="login-pass" class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
							</div>
						</div>
				<?php do_action( 'woocommerce_login_form' ); ?>

					<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
					<div class="col-xs-12">
	                    <div class="check-box left-side"> <span>
	                      <input id="remember_me" class="checkbox woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever">
	                      </span>
	                      <label for="remember_me"><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></label>
	                    </div>
						<button type="submit" class=" btn-color right-side" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
	                </div>
					<div class="col-xs-12">
						<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" title="Forgot Password" class="forgot-password mtb-20"  ><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
						<hr>
		            </div>

				<?php do_action( 'woocommerce_login_form_end' ); ?>
			</form>
		</div>
	<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
		
		<div class="col-md-6 ">

			<div class="mb-20">
	            <div class="heading-part heading-bg">
	              <h2 class="heading"><?php esc_html_e( 'Create your account ', 'woocommerce' ); ?></h2>
	            </div>
	         </div>


			<form method="post" class=" main-form full ">

				<?php do_action( 'woocommerce_register_form_start' ); ?>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>


			    <div class="input-box"> 
					<label for="f-name"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="f-name" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</div>
				<?php endif; ?>

			    <div class="input-box"> 
					<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</div>
				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
			    <div class="input-box"> 
					<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
				</div>

				<?php endif; ?>

				<?php do_action( 'woocommerce_register_form' ); ?>				
				<div class="col-xs-12">
                    <div class="check-box left-side mb-20"> 
                    	<span> <input id="remember_me_" class="checkbox woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever">
	                    </span>
	                    <label for="remember_me_"><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></label> 
					</div>
					<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
					<button type="submit" class="btn-color right-side " name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
                    
                  </div>

				<?php do_action( 'woocommerce_register_form_end' ); ?>

			</form>
		</div>

	<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>


      </div>
    </div>
  </section>
