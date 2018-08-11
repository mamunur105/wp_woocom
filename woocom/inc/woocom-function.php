<?php

// woocommerce_result_count 
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
// woocommerce_catalog_ordering 
// remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);
// remove and add cart 
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);

// default product link remove 
remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);

// filter hooks 
add_filter('woocommerce_show_page_title','xpent_show_page_title');

// function for filter hooks 
function xpent_show_page_title(){
	return ;
}
//end  function for filter hooks

// all function here 


// product default title remove and add new title 
remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);

// product default title remove and add new title 
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
// Product title add 
add_action('woocommerce_before_shop_loop_item_title','xpent_template_loop_product_thumbnail',10);

function xpent_template_loop_product_thumbnail(){ ?>
<div class="product-image"> 
	<a href="<?php the_permalink() ?>"> <?php woocommerce_template_loop_product_thumbnail(); ?> </a>

	<div class="product-detail-inner">
	  <div class="item-overlay">
	    <ul>
	      	<li><?php woocommerce_template_loop_add_to_cart();?></li>
	      	<?php  
          if(shortcode_exists( 'yith_wcwl_add_to_wishlist' )):?>
	      		<li>
              <div class="wishlist-styling">
                <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?>
                <i class="fa fa-heart-o"></i>
              </div>
            </li>
	  		<?php endif; ?>
	  		<?php  if(shortcode_exists('yith_compare_button')):?>
			<li>
				<div class="compare-styling">
				<?php echo do_shortcode("[yith_compare_button]");?> <i class="fa fa-random"></i>
				</div>
			</li>
			<?php endif; ?>
	    </ul>
	  </div>
	</div>
</div>
<?php }
// 

// remove defaul prize 
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
// remove reating 
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);

add_action('woocommerce_after_shop_loop_item_title','xpent_template_loop_price',10);

function xpent_template_loop_price(){ ?>

<div class="product-item-details">
	<div class="item-title"> 
	  <a href="<?php the_permalink()?>"><?php the_title() ?> </a>
	</div>

	<div class="price-box"> 
	 	<?php // woocommerce_template_loop_price(); 

			global $woocommerce;
			$currency = get_woocommerce_currency_symbol();
			$price = get_post_meta( get_the_ID(), '_regular_price', true);
			$sale = get_post_meta( get_the_ID(), '_sale_price', true);
			
			if($sale) : ?>
				<span class="price"><?php echo $currency; echo $sale; ?> </span> 
				<del class="price old-price" ><?php echo $currency; echo $price; ?></del>     
			<?php elseif($price) : ?>
				<span class="price" ><?php echo $currency; echo $price; ?></span>    
			<?php endif; ?>

		<div class="item-rating">
		 	<div title="69%" class="F-rating-result"> <?php woocommerce_template_loop_rating() ; ?>
		</div> 
		 	
		</div>
	</div>


</div>

<?php }

// mini cart button 
remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );

add_action( 'woocommerce_widget_shopping_cart_buttons', 'my_woocommerce_widget_shopping_cart_button_view_cart', 10 );
add_action( 'woocommerce_widget_shopping_cart_buttons', 'my_woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );

function my_woocommerce_widget_shopping_cart_button_view_cart() {
    echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="btn-color btn" >' . esc_html__( 'View cart', 'woocommerce' ) . '</a>';
}
function my_woocommerce_widget_shopping_cart_proceed_to_checkout() {
    echo '<a href="' . esc_url( wc_get_checkout_url() ) . '"  class="btn-color btn right-side" >' . esc_html__( 'Checkout', 'woocommerce' ) . '</a>';
}


// cart notification 
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

function iconic_cart_count_fragments( $fragments ) {
    
    $fragments['small.cart-notification'] = '<small class="cart-notification">' . WC()->cart->get_cart_contents_count() . '</small>';
    
    return $fragments;
    
}

// Lets create the function to house our form
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

add_filter( 'woocommerce_default_catalog_orderby_options', 'custom_woocommerce_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );
function custom_woocommerce_catalog_orderby( $sortby ) { 
	// $sortby['menu_order'] = 'Default';
	$sortby['popularity'] = 'popularity';
	$sortby['date'] = 'Newest';
	$sortby['price'] = 'price(low&gt;high)';
	$sortby['price-desc'] = 'price(high &gt; low)';
	$sortby['rating'] = 'rating(highest)';
	$sortby['random_list'] = 'Random';
	return $sortby;
}


// show per page 
function woocommerce_catalog_page_ordering() {
?>
<?php echo '<span class="itemsorder">' ?>
<form action="" method="POST" name="results" class="woocommerce-ordering">
  <select name="woocommerce-sort-by-columns" id="woocommerce-sort-by-columns" class="sortby" onchange="this.form.submit()">
<?php
 
//Get products on page reload
if  (isset($_POST['woocommerce-sort-by-columns']) && (($_COOKIE['shop_pageResults'] <> $_POST['woocommerce-sort-by-columns']))) {
        $numberOfProductsPerPage = $_POST['woocommerce-sort-by-columns'];
          } else {
        $numberOfProductsPerPage = $_COOKIE['shop_pageResults'];
          }
 
//  This is where you can change the amounts per page that the user will use  feel free to change the numbers and text as you want, in my case we had 4 products per row so I chose to have multiples of four for the user to select.
			$shopCatalog_orderby = apply_filters('woocommerce_sortby_page', array(
			//Add as many of these as you like, -1 shows all products per page
			  //  ''       => __('Results per page', 'woocommerce'),
				'20' 		=> __('20', 'woocommerce'),
				'12' 		=> __('12', 'woocommerce'),
        '8'     => __('8', 'woocommerce'),
				'4' 		=> __('4', 'woocommerce'),
				'-1' 		=> __('All', 'woocommerce'),
			));

		foreach ( $shopCatalog_orderby as $sort_id => $sort_name )
			echo '<option value="' . $sort_id . '" ' . selected( $numberOfProductsPerPage, $sort_id, true ) . ' >' . $sort_name . '</option>';
?>
</select>
</form>
<?php echo ' </span>' ?>

<?php }
 
// now we set our cookie if we need to
function dl_sort_by_page($count) {
  if (isset($_COOKIE['shop_pageResults'])) { // if normal page load with cookie
     $count = $_COOKIE['shop_pageResults'];
  }
  if (isset($_POST['woocommerce-sort-by-columns'])) { //if form submitted
    setcookie('shop_pageResults', $_POST['woocommerce-sort-by-columns'], time()+1209600, '/', 'www.your-domain-goes-here.com', false); //this will fail if any part of page has been output- hope this works!
    $count = $_POST['woocommerce-sort-by-columns'];
  }
  // else normal page load and no cookie
  return $count;
}
 
add_filter('loop_shop_per_page','dl_sort_by_page');


// woocom  single page 

remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);
 add_action( 'woocommerce_before_single_product_summary', 'single_product_summary_sale_flash', 10);

function single_product_summary_sale_flash() { ?>
    <div class="sale-label single-product-sale_flash"><span>Sale</span></div>
<?php }


remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_images',20);
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_single_product_images', 20 );

function woocommerce_single_product_images() { ?>
 	
        <div class="col-md-5 col-sm-5 mb-xs-30"><?php // echo single_product_summary_sale_flash();?>
          <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native"> 

            <a href="#"> <?php the_post_thumbnail(); ?> </a>

				<?php 
				   global $product;

				    $attachment_ids = $product->get_gallery_image_ids();

				    foreach( $attachment_ids as $attachment_id ) {
				        $image_link = wp_get_attachment_url( $attachment_id ); ?>
				         
				            <a href="#"><img src="<?php echo $image_link;?>" alt="Xpent Super Shop "></a> 
				   		<?php  }
				?>
          </div>
        </div>


<?php }

// remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);
// remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
add_action('woocommerce_single_product_summary','product_title_single_page_content',20);
function product_title_single_page_content(){ ?>
    <!-- <h1 class="product-item-name"><?php the_title();?></h1> -->
    <?php the_content(); ?>
<?php }
// remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
// remove_action('woocommerce_single_product_summary','woocommerce_template_single_sharing',50); 

remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
add_action('woocommerce_single_product_summary','product_title_single_page',5);
function product_title_single_page(){ ?>
    <h1 class="product-item-name"><?php the_title();?></h1>
<?php }

remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);
add_action('woocommerce_single_product_summary','product_rating_single_page',10);
function product_rating_single_page(){ ?>
  <div class="rating-summary-block">
      <?php woocommerce_template_single_rating();?>
  </div>
<?php }

// woocommerce_before_variations_form 
add_action('woocommerce_before_variations_form','woocom_before_variations_form',10);
function woocom_before_variations_form(){ ?>
<div class="product-size select-arrow mb-0 mt-30">
<?php }
add_action('woocommerce_after_variations_form','woocom_after_variations_form',10);
function woocom_after_variations_form(){ ?>
</div>
<?php }


// remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);
add_action('woocommerce_single_product_summary','product_info_stock_sku',11);
function product_info_stock_sku(){ ?>
  <div class="product-info-stock-sku">

    <div>
        <label>Availability: </label>
        <span class="info-deta">
            <?php                        
                  global $product;

                  if ( $product->is_in_stock() ) {
                      echo $product->get_stock_quantity() . __( ' in stock', 'woocom' ) ;
                  } else {
                        echo  __( 'out of stock', 'woocom' )  ;
                  }
            ?> 
        </span> 
    </div>

      <div>
        <label>SKU: </label>
        <span class="info-deta"><?php echo $product->get_sku();?></span> 
      </div>
  </div>

<?php }

// woocommerce_template_single_price 
remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
add_action('woocommerce_single_product_summary','product_price_single_page',10);
function product_price_single_page(){ 

  global $product;
  if ( !$product->is_type( 'variable' ) ) { ?>
     <div class="price-box">
        <?php    
            global $woocommerce;
            $currency = get_woocommerce_currency_symbol();
            $price = get_post_meta( get_the_ID(), '_regular_price', true);
            $sale = get_post_meta( get_the_ID(), '_sale_price', true);
            
            if($sale) : ?>
              <span class="price"><?php echo $currency; echo $sale; ?> </span> 
              <del class="price old-price" ><?php echo $currency; echo $price; ?></del>     
            <?php elseif($price) : ?>
              <span class="price" ><?php echo $currency; echo $price; ?></span>    
        <?php endif; ?>
    </div>
<?php } }

add_action('woocommerce_before_single_product_summary','before_product_content',40);
function before_product_content(){ ?>

<div class="col-md-7 col-sm-7">
  <div class="row">
    <div class="col-xs-12">
      <div class="product-detail-main">
        <div class="product-item-details">

<?php }

add_action('woocommerce_after_single_product_summary','after_product_content',5);
function after_product_content(){ ?>

        </div>
      </div>
    </div>
  </div>
</div>

<?php }

// 
if ( ! function_exists( 'wc_dropdown_variation_attribute_options' ) ) {

  /**
   * Output a list of variation attributes for use in the cart forms.
   *
   * @param array $args Arguments.
   * @since 2.4.0
   */
  function wc_dropdown_variation_attribute_options( $args = array() ) {
    $args = wp_parse_args( apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ), array(
      'options'          => false,
      'attribute'        => false,
      'product'          => false,
      'selected'         => false,
      'name'             => '',
      'id'               => 'select-by-size',
      'class'            => 'selectpicker form-control',
      'show_option_none' => __( 'Choose an option', 'woocommerce' ),
    ) );

    $options               = $args['options'];
    $product               = $args['product'];
    $attribute             = $args['attribute'];
    $name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
    $id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
    $class                 = $args['class'];
    $show_option_none      = $args['show_option_none'] ? true : false;
    $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

    if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
      $attributes = $product->get_variation_attributes();
      $options    = $attributes[ $attribute ];
    }

    $html  = '<select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';
    $html .= '<option value="">' . esc_html( $show_option_none_text ) . '</option>';

    if ( ! empty( $options ) ) {
      if ( $product && taxonomy_exists( $attribute ) ) {
        // Get terms if this is a taxonomy - ordered. We need the names too.
        $terms = wc_get_product_terms( $product->get_id(), $attribute, array(
          'fields' => 'all',
        ) );

        foreach ( $terms as $term ) {
          if ( in_array( $term->slug, $options, true ) ) {
            $html .= '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</option>';
          }
        }
      } else {
        foreach ( $options as $option ) {
          // This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
          $selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
          $html    .= '<option value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
        }
      }
    }

    $html .= '</select>';

    echo apply_filters( 'woocommerce_dropdown_variation_attribute_options_html', $html, $args ); // WPCS: XSS ok.
  }
}

if (class_exists( 'WooCommerce' )){
  function cm_redirect_users_by_role() {
      if ( is_product()){ 
         remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
       }
  } // cm_redirect_users_by_role
  add_action( 'wp', 'cm_redirect_users_by_role' );
}

// // add New woocommerce_output_content_wrapper 
add_action('woocommerce_after_single_product_summary','xpent_output_content_wrapper',9);
function xpent_output_content_wrapper(){ ?>
        </div>
      </div>
    </section>
    <section class="pb-60 pb-xs-30">
        <div class="container">
          <div class="product-detail-tab">
            <div class="row">
              <div class="col-md-12">
<?php }


add_action('woocommerce_after_single_product_summary','xpent_output_content_wrapper_end',11);
function xpent_output_content_wrapper_end(){?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="pb-60 cccc">
  <div class="container">
    <div class="row">

<?php }


remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
// breadcrumb 
add_action('page_banner_and_breadcrumb','xpent_banner_and_breadcrumb_products',10);
function xpent_banner_and_breadcrumb_products(){  ?>

  <div class="banner inner-banner align-center">
    <div class="container">
      <section class="banner-detail">
        <h1 class="banner-title"><?php the_title()?></h1>
        <div class="bread-crumb right-side">
          
            <?php
            $args = array(
                'wrap_before' => '<ul>',
                'wrap_after'  => '</ul>',
                'before' => '<li>',
                'after' => '</li>',
              );

             woocommerce_breadcrumb($args)?>
        
        </div>
      </section>
    </div>
  </div>
<?php }



add_action('woocommerce_single_product_summary','comp_wish_email',65);

function comp_wish_email(){ ?>

<div class="bottom-detail">
    <ul>
      <?php  if(shortcode_exists('ti_wishlists_addtowishlist')):?>
      <li><i class="fa fa-heart-o"></i><?php echo do_shortcode("[ti_wishlists_addtowishlist loop=yes]");?>Wishlist</li>
       <?php endif; ?>
       <?php  if(shortcode_exists('yith_compare_button')):?>
      <li><i class="fa fa-random"></i><?php echo do_shortcode("[yith_compare_button]");?>Compare</li>
       <?php endif; ?>
    </ul>
</div>

<?php }

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action( 'woocommerce_after_single_product_summary', 'wc_output_related_products', 20);
function wc_output_related_products(){
  $args = array( 
        'posts_per_page' => 8,  
 ); 
    woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) ); 
}

// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
