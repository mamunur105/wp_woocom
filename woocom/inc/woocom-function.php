<?php

// woocommerce_result_count 
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
// woocommerce_catalog_ordering 
remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);
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
// Product title add 
// add_action('woocommerce_shop_loop_item_title','xpent_template_loop_product_title',10);

// function xpent_template_loop_product_title(){
//       echo '<div class="item-title"> <a href="'.get_the_permalink().'">'.get_the_title().'</a> </div>';
// }


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


