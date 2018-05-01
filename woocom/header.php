<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package woocom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- SEO Meta
	================================================== -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="distribution" content="global">
	<meta name="revisit-after" content="2 Days">
	<meta name="robots" content="ALL">
	<meta name="rating" content="8 YEARS">
	<meta name="Language" content="en-us">
	<meta name="GOOGLEBOT" content="NOARCHIVE">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="<?php echo THEME_URI ?>/images/favicon.png">
	<link rel="apple-touch-icon" href="<?php echo THEME_URI ?>/images/apple-touch-icon.html">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo THEME_URI ?>/images/apple-touch-icon-72x72.html">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo THEME_URI ?>/images/apple-touch-icon-114x114.html">

	<?php wp_head(); ?>
</head>
<?php $ishome = is_front_page() ? ' common-home ':' ' ?>
<body <?php body_class($ishome); ?>>

<!-- <div class="xpent-loader"></div> -->

<div id="page" class="main ">
	<!-- HEADER START -->
	<header class="navbar navbar-custom" id="header">
		<div class="header-top bg-gray">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="top-link top-link-left">
							<ul class="social-icon">
								<li><a title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
								<li><a title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
								<li><a title="Linkedin" class="linkedin"><i class="fa fa-linkedin"> </i></a></li>
								<li><a title="RSS" class="rss"><i class="fa fa-rss"> </i></a></li>
								<li><a title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="top-link right-side">
							<ul>
								<li class="Compare-icon">
									<a href="#" title="Compare">
										<i class="fa fa-sign-in"></i>
										<span class="hidden-xs hidden-sm hidden-md">Compare</span>
									</a>
								</li>

	<?php if ( is_user_logged_in() ) { ?>
		<li class="login-icon"><a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" title="<?php esc_attr__('My Account','woocom'); ?>" class="user-icon"><i class="fa fa-user"></i>										<span class="hidden-xs hidden-sm hidden-md"><?php esc_html_e('My Account', 'woocom'); ?></span></a></li>
	<?php }
	else { ?>
		<li class="Register-icon"><a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" title="<?php esc_attr__('Login/Register','woocom'); ?>" class="user-icon"><i class="fa fa-user-plus"></i><span class="hidden-xs hidden-sm hidden-md"><?php esc_html_e('Login/ Register', 'woocom'); ?></span></a></li>
	<?php } ?>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="header-middle">
			<div class="container">
				<div class="header-inner">
					<div class="navbar-header">
						<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><i class="fa fa-bars"></i></button>
						<a class="navbar-brand page-scroll" href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img alt=" Logo  " src="<?php echo THEME_URI ?>/images/logo.png" > </a>
					

					</div>
					<div class="right-side float-none-sm">
						<div class="right-side float-left-xs header-right-link">

							<ul>
								<li class="main-search">
									<div class="header_search_toggle desktop-view">
										<form action="<?php home_url('/')?>">
											<div class="search-box">
												<input class="input-text" type="text" name="s" placeholder="Search Here...">
												<button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
											</div>
										</form>
									</div>
								</li>

								<li class="cart-icon"> <a class="close-iconstyle" href="#"><span><i class="fa fa-shopping-cart"></i> <small class="cart-notification"><?php  echo wp_kses_data ( WC()->cart->get_cart_contents_count() ); ?></small> </span> </a>
									<div class="cart-dropdown header-link-dropdown">
										<?php // woocommerce_mini_cart(); ?>
										
										<?php the_widget( 'WC_Widget_Cart', '' ); ?>
										
									</div>
								</li>
								<li class="account-icon"> <a href="#"><span><i class="fa fa-heart-o"></i></span></a></li>
							</ul>
						</div>
					</div>
					<div class="header_search_toggle mobile-view">
						<form>
							<div class="search-box">
								<input class="input-text" type="text" placeholder="Search entire store here...">
								<button class="search-btn"></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

			<div class="header-bottom">
				<div class="container position-r">
					<div class="row m-0">
						<div class="col-md-3 position-i p-0">
							<div class="sidebar-menu-dropdown home ptb-20">
								<a class="btn-sidebar-menu-dropdown"><span></span> Categories</a>
								<div id="cat" class="cat-dropdown">
									<div class="sidebar-contant">
										<div id="menu" class="navbar-collapse collapse">
											<ul class="nav navbar-nav">
												<li class="level sub-megamenu">
													<span class="opener plus"></span>
													<a href="shop.html" class="page-scroll">Cloths<i class="fa fa-angle-right right-side"></i></a>
													<div class="megamenu mobile-sub-menu">
														<div class="megamenu-inner-top">
															<ul class="sub-menu-level1">
																<li class="level2">
																	<a href="shop.html"><span>Kids Fashion</span></a>
																	<ul class="sub-menu-level2 ">
																		<li class="level3"><a href="shop.html">Baby Suits</a></li>
																		<li class="level3"><a href="shop.html">Tops</a></li>
																		<li class="level3"><a href="shop.html">Trousers</a></li>
																		<li class="level3"><a href="shop.html">Shorts</a></li>
																		<li class="level3"><a href="shop.html">Jackets</a></li>
																	</ul>
																</li>
															</ul>
														</div>
													</div>
												</li>
												<li class="level"><a href="shop.html" class="page-scroll">Women Cloths</a></li>
												<li class="level"><a href="shop.html" class="page-scroll">Playsuits & Jumpsuits</a></li>
												<li class="level sub-megamenu">
													<span class="opener plus"></span>
													<a href="shop.html" class="page-scroll">Fashion<i class="fa fa-angle-right right-side"></i></a>
													<div class="megamenu mobile-sub-menu">
														<div class="megamenu-inner-top">
															<ul class="sub-menu-level1">
																<li class="level2">
																	<a href="shop.html"><span>Women Clothings</span></a>
																	<ul class="sub-menu-level2">
																		<li class="level3"><a href="shop.html">Dresses</a></li>
																		<li class="level3"><a href="shop.html">Skirts</a></li>
																		<li class="level3"><a href="shop.html">Tops</a></li>
																		<li class="level3"><a href="shop.html">Sleepwear</a></li>
																		<li class="level3"><a href="shop.html">Trousers</a></li>
																		<li class="level3"><a href="shop.html">Shorts</a></li>
																	</ul>
																</li>
																<li class="level2">
																	<a href="shop.html"><span>Girls Fashion</span></a>
																	<ul class="sub-menu-level2 ">
																		<li class="level3"><a href="shop.html">Dresses</a></li>
																		<li class="level3"><a href="shop.html">Skirts</a></li>
																		<li class="level3"><a href="shop.html">Tops</a></li>
																		<li class="level3"><a href="shop.html">Sleepwear</a></li>
																		<li class="level3"><a href="shop.html">Trousers</a></li>
																		<li class="level3"><a href="shop.html">Shorts</a></li>
																	</ul>
																</li>
																<li class="level2 hidden-xs hidden-sm">
																	<a href="shop.html">
																		<img src="images/banner/menu-banner.jpg" alt="Xpent ">
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</li>
												<li class="level"><a href="shop.html" class="page-scroll">Swimwear</a></li>
												<li class="level"><a href="shop.html" class="page-scroll">Jackets</a></li>
												<li class="level"><a href="shop.html" class="page-scroll">Playsuits & Jumpsuits</a></li>
												<li class="level sub-megamenu">
													<span class="opener plus"></span>
													<a class="page-scroll">Pages<i class="fa fa-angle-right right-side"></i></a>
													<div class="megamenu mobile-sub-menu">
														<div class="megamenu-inner-top">
															<ul class="sub-menu-level1">
																<li class="level2">
																	<ul class="sub-menu-level2 ">
																		<li class="level3"><a href="about.html">About</a></li>
																		<li class="level3"><a href="account.html">Account</a></li>
																		<li class="level3"><a href="checkout.html">Checkout</a></li>
																		<li class="level3"><a href="contact.html">Contact</a></li>
																		<li class="level3"><a href="404.html">404 Error</a></li>
																		<li class="level3"><a href="blog.html">Blog</a></li>
																		<li class="level3"><a href="single-blog.html">Single Blog</a></li>
																	</ul>
																</li>
															</ul>
														</div>
													</div>
												</li>
												<li class="level"><a href="shop.html" class="page-scroll">Ladis Coats</a></li>
												<li class="level"><a href="shop.html" class="page-scroll">Tracksuits</a></li>
												<li class="level"><a href="shop.html" class="page-scroll">All Categories >></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-9 p-0">
							<div class="nav_sec position-r">
								<div class="mobilemenu-title mobilemenu">
									<span>Menu</span>
									<i class="fa fa-bars pull-right"></i>
								</div>
								<?php
										wp_nav_menu( array(
											'menu_class'	=>'nav navbar-nav',
											'theme_location' => 'menu-main',
											'container' => 'div',
											'container_class' => 'mobilemenu-content',
											'menu_id'        => 'menu-main',
										 ));
										?>
								<!-- <div class="mobilemenu-content">

									<ul class="" id="menu-main">
										<li>
											<a href="index.html">Home</a>
										</li>
										<li>
											<a href="shop.html">Shop</a>
										</li>
										<li>
											<a href="about.html">About</a>
										</li>
										<li>
											<a href="blog.html">Blog</a>
										</li>
										<li>
											<a href="contact.html">Contact</a>
										</li>
										<li class="level">
											<span class="opener plus"></span>
											<a class="page-scroll">Pages</a>
											<div class="megamenu mobile-sub-menu">
												<div class="megamenu-inner-top">
													<ul class="sub-menu-level1">
														<li class="level2">
															<ul class="sub-menu-level2 ">
																<li class="level3"><a href="account.html">Account</a></li>
																<li class="level3"><a href="checkout.html">Checkout</a></li>
																<li class="level3"><a href="404.html">404 Error</a></li>
																<li class="level3"><a href="single-blog.html">Single Blog</a></li>
																<li class="level3"><a href="product-page.html">Product Details</a></li>
															</ul>
														</li>
													</ul>
												</div>
											</div>
										</li>
									</ul>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
	</header>
	<!-- HEADER END --> 

	<div id="content" class="site-content">
