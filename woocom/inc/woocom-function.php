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
// remove default woocommerce_output_content_wrapper 
remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
// add New woocommerce_output_content_wrapper 
add_action('woocommerce_before_main_content','xpent_output_content_wrapper',10);
function xpent_output_content_wrapper(){
	echo '<section class="ptb-60"><div class="container"><div class="row">';
}

remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end',10);
add_action('woocommerce_after_main_content','xpent_output_content_wrapper_end',10);
function xpent_output_content_wrapper_end(){
	echo '</div></div></section>';
}

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
	      	<?php  if(shortcode_exists('ti_wishlists_addtowishlist')):?>
	      		<li><div class="wishlist-styling"><?php echo do_shortcode("[ti_wishlists_addtowishlist loop=yes]");?><i class="fa fa-heart-o"></i></div></li>
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

		  <!-- <span style="width:69%"></span>  -->
		</div> 
		 	
		</div>
	</div>
</div>

<?php }


/// wc mini cart ajaxify 
// add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

// function iconic_cart_count_fragments( $fragments ) {
    
//     $fragments['span.cart-notification'] = '<small class="cart-notification">' . WC()->cart->get_cart_contents_count() . '</small>';
    
//     return $fragments;
    
// }

 //  woocommerce_mini_cart();  


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

// remove cart iteam 




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
				'10' 		=> __('10', 'woocommerce'),
				'8' 		=> __('8', 'woocommerce'),
				'-1' 		=> __('All', 'woocommerce'),
			));

		foreach ( $shopCatalog_orderby as $sort_id => $sort_name )
			echo '<option value="' . $sort_id . '" ' . selected( $numberOfProductsPerPage, $sort_id, true ) . ' >' . $sort_name . '</option>';
?>
</select>
</form>

<?php echo ' </span>' ?>
<?php
}
 
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
// add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_page_ordering', 20 );



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

				    $attachment_ids = $product->get_gallery_attachment_ids();

				    foreach( $attachment_ids as $attachment_id ) {
				        $image_link = wp_get_attachment_url( $attachment_id ); ?>
				         
				            <a href="#"><img src="<?php echo $image_link;?>" alt="Xpent Super Shop "></a> 
				   		<?php  }
				?>
          </div>
        </div>


<?php }


remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_sharing',50);


add_action( 'woocommerce_before_single_product_summary', 'woocom_single_product_summary', 20 );

function woocom_single_product_summary() { ?>

        <div class="col-md-7 col-sm-7">
          <div class="row">
            <div class="col-xs-12">
              <div class="product-detail-main">
                <div class="product-item-details">
                  <h1 class="product-item-name"><?php woocommerce_template_single_title();?></h1>
                  <div class="rating-summary-block">
                    <div title="70%" class="rating-result"> <span style="width:70%"></span> </div>
                  </div>
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
                      <span class="info-deta"><?php echo $product->get_sku();?></span> </div>
                  </div>
                  <p><?php the_content();// woocommerce_template_single_excerpt();?></p>
                  <div class="product-size select-arrow mb-20 mt-30">
                    <label>Size</label>
                    <select class="selectpicker form-control" id="select-by-size">
                      <option selected="selected" value="#">S</option>
                      <option value="#">M</option>
                      <option value="#">L</option>
                    </select>
                  </div>
                  <div class="product-color select-arrow mb-20">
                    <label>Color</label>
                    <select class="selectpicker form-control" id="select-by-color">
                      <option selected="selected" value="#">Blue</option>
                      <option value="#">Green</option>
                      <option value="#">Orange</option>
                      <option value="#">White</option>
                    </select>
                  </div> 
                  <div class="mb-40">
                    <div class="product-qty">
                      <label for="qty">Qty:</label>
                      <div class="custom-qty">
                        <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items" type="button"> <i class="fa fa-minus"></i> </button>
                        <input type="text" class="input-text qty" title="Qty" value="1" maxlength="8" id="qty" name="qty">
                        <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items" type="button"> <i class="fa fa-plus"></i> </button>
                      </div>
                    </div>
                    <div class="bottom-detail cart-button">
                      <ul>
                        <li><button title="Add to Cart" class="btn-black"><i class="fa fa-shopping-cart"></i><span></span>Add to Cart</button></li>
                      </ul>
                    </div>
                  </div>

                  <div class="bottom-detail">
                    <ul>
                      <li><a href="#"><i class="fa fa-heart-o"></i><span></span>Wishlist</a></li>
                      <li><a href="#"><i class="fa fa-random"></i><span></span>Compare</a></li>
                      <li><a href="#"><i class="fa fa-envelope-o"></i><span></span>Email to Friends</a></li>
                    </ul>
                  </div>

                  <div class="share-link">
                    <label>Share This : </label>
                    <div class="social-link">
                      <ul class="social-icon">
                        <li><a class="facebook" title="Facebook" href="#"><i class="fa fa-facebook"> </i></a></li>
                        <li><a class="twitter" title="Twitter" href="#"><i class="fa fa-twitter"> </i></a></li>
                        <li><a class="linkedin" title="Linkedin" href="#"><i class="fa fa-linkedin"> </i></a></li>
                        <li><a class="rss" title="RSS" href="#"><i class="fa fa-rss"> </i></a></li>
                        <li><a class="pinterest" title="Pinterest" href="#"><i class="fa fa-pinterest"> </i></a></li>
                      </ul>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>


<?php }
