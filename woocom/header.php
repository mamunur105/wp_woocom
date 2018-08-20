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
	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="<?php echo THEME_URI ?>/images/favicon.png">

	<?php wp_head(); ?>
</head>
<?php $ishome =  (is_front_page() && !is_home() ) ? ' common-home ':' ' ?>
<body <?php body_class($ishome); ?>>
<?php 
								// if (is_front_page() && is_home() ): ?>
								
<!-- <div class="xpent-loader"></div> -->
<!-- hello  this is checking  -->
<div id="page" class="main ">
	<!-- HEADER START -->
	<header class="navbar navbar-custom" id="header">
		<div class="header-top bg-gray">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="top-link top-link-left">
							<ul class="social-icon">

								<?php if (!empty(woo_option('facebook-link'))) : ?>
								<li><a title="Facebook" href="<?php echo woo_option('facebook-link')?>" class="facebook"><i class="fa fa-facebook"> </i></a></li>
								<?php endif;  ?>
								<?php if (!empty(woo_option('twitter-link'))) : ?>

								<li><a href="<?php echo woo_option('twitter-link')?>" title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
								<?php endif;  ?>
								<?php if (!empty(woo_option('google-plus-link'))) : ?>
								
								<li><a href="<?php echo woo_option('linkedin-link')?>" title="Linkedin" class="linkedin"><i class="fa fa-linkedin"> </i></a></li>

								<?php endif;  ?>
								<?php if (!empty(woo_option('pinterest-link'))) : ?>
								
								<li><a href="<?php echo woo_option('pinterest-link')?>" title="RSS" class=" pinterest"><i class="fa fa-pinterest"> </i></a></li>
								
								<?php endif;  ?>
								<?php if (!empty(woo_option('instagram-link'))) : ?>
								
								<li><a href="<?php echo woo_option('instagram-link')?>" title="Pinterest" class="rss"><i class="fa fa-rss"> </i></a></li>

								<?php endif;  ?>

							</ul>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="top-link right-side">
							<ul>
								
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
						<?php ?>

						<?php if (!empty(woo_option('woocom_logo'))) : ?>
							<a class="navbar-brand page-scroll" href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img alt=" Logo  " src="<?php echo esc_url(woo_option('woocom_logo')['url']) ; ?>" > </a>
						<?php endif; ?>

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

									<?php if (!is_cart()) { ?> 
								        <div class="cart-dropdown header-link-dropdown">
											<?php // woocommerce_mini_cart(); ?>
											
											<?php the_widget( 'WC_Widget_Cart', '' ); ?>
											
										</div>

								     <?php  }  ?>
								     
									
								</li>
								<li class="account-icon cart-icon"> <a href="<?php echo esc_url(home_url()) ?>/wishlist"><span><i class="fa fa-heart-o"></i><small id="wishlist_counter" class=" wishlist-notification "> 
									<?php if( function_exists( 'YITH_WCWL' ) ){ 
										echo YITH_WCWL()->count_products();  
									}?> </small></span></a></li>
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
							<!-- editing area  -->
								<div class="sidebar-menu-dropdown home ptb-20">
									<a class="btn-sidebar-menu-dropdown"><span></span> Categories</a>
									<div id="cat" class="cat-dropdown">
										<div class="sidebar-contant">
											<div id="menu" class="navbar-collapse collapse">
												<ul class="nav navbar-nav">
													

												<?php 
													$orderby = 'name';
													$order = 'asc';
													$hide_empty = false ;
													$cat_args = array(
													    'orderby'    => $orderby,
													    'order'      => $order,
													    'hide_empty' => $hide_empty,
													);

													$product_categories = get_terms( 'product_cat', $cat_args );
													
													if( !empty($product_categories) ){
													    foreach ($product_categories as $category) {

																$children = get_term_children($category->term_id, 'product_cat');
																$this_category = get_category($category);

																if( empty( $children ) &&  $this_category->category_parent == 0 ) {
																    echo '<li class="level"><a href="'.get_term_link($category).'" class="page-scroll" >'.$category->name.'</a></li>';
																}else{ ?>
																	<li class="level sub-megamenu">
																	<?php if($this_category->category_parent == 0 ): ?>
																			<span class="opener plus"></span>
																			<a href="<?php echo get_term_link($category) ; ?>" class="page-scroll"><?php echo $category->name ?><i class="fa fa-angle-right right-side"></i></a>
																		<?php endif;  ?>
																	 	<div class="megamenu mobile-sub-menu">
																			<div class="megamenu-inner-top">
																				<ul class="sub-menu-level1">
																					<li class="level2">
																						<ul class="sub-menu-level2 ">
																						<?php
																						$terms = get_terms('product_cat', array(
																							'parent' => $category->term_id, 
																							'orderby' => $orderby, 
													    									'order'      => $order,
																							'hide_empty' => $hide_empty
																						));	
																						foreach($terms as $child) {  ?>
																							<li class="level3"><a href="<?php echo get_term_link($child) ; ?>"><?php echo $child->name ?></a></li>

																						<?php } ?>
																						</ul>
																					</li>
																				</ul>
																			</div>
																		</div> 
																	</li>
																<?php }
													    }
													}
												?>

												</ul>
											</div>
										</div>
									</div>
								</div>
							<!-- editing area  -->
								
						</div>

						<div class="col-md-9 p-0">
							<div class="nav_sec position-r">
								<div class="mobilemenu-title mobilemenu">
									<span>Menu</span>
									<i class="fa fa-bars pull-right"></i>
								</div>
								<?php

								if (has_nav_menu('menu-main')) {
									wp_nav_menu( array(
										'menu_class'	=>'nav navbar-nav',
										'theme_location' => 'menu-main',
										'container' => 'div',
										'container_class' => 'mobilemenu-content',
										'menu_id'        => 'menu-main',
										'walker' => new Walker_Menu,
									 ));
								}

								?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
	</header>
	<!-- HEADER END --> 


