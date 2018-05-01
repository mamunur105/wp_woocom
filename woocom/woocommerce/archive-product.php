<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */

?>

<?php do_action( 'woocommerce_sidebar' ); ?>


<div class="col-md-9 col-sm-8">

<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<div class="shorting mb-30">
            <div class="row">
              <div class="col-md-6">
                <div class="view">
                  <div class="list-types grid active "> 
                    <a href="shop.html">
                      <div class="grid-icon list-types-icon"></div>
                    </a> 
                  </div>
                  <div class="list-types list"> 
                    <a href="shop-list.html">
                      <div class="list-icon list-types-icon"></div>
                    </a> 
                  </div>
                </div>
                <div class="short-by float-right-sm"> <span>Sort By</span>
                  <div class="select-item">
                  		<?php woocommerce_catalog_ordering()// woocommerce_catalog_ordering() ?>
                    <!-- <select>
                      <option value="" selected="selected">Name (A to Z)</option>
                      <option value="">Name(Z - A)</option>
                      <option value="">price(low&gt;high)</option>
                      <option value="">price(high &gt; low)</option>
                      <option value="">rating(highest)</option>
                      <option value="">rating(lowest)</option>
                    </select> -->
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="show-item right-side float-left-sm"> <span>Show</span>
                  <div class="select-item">
                  	<?php 	woocommerce_catalog_page_ordering();?>
                    
                  </div>
                  <span>Per Page</span>
                </div>
              </div>

            </div>
          </div>

<?php

if ( have_posts() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked wc_print_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
?>
</div>
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
