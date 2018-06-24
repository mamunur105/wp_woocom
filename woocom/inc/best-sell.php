<?php
class Bestselling_product extends WP_Widget {
	function __construct() {
		// Instantiate the parent object
		parent::__construct( 'Bestselling', 'Wc Product Bestselling' ,array(
				'description'=> "Xpent Product Bestselling "
			));
	}
	function widget( $args, $instance ) {
		// checking 
		$title = (!empty($instance['title'])) ? $instance['title'] : false ;
		$total = (!empty($instance['total'])) ? $instance['total'] : 3 ;


		// Widget output
		echo $args["before_widget"];

		
		echo  $args["before_title"].$instance["title"]. $args["after_title"]; 

		// setup query
		$argsp = array(
			'post_type' 			=> 'product',
			'post_status' 			=> 'publish',
			// 'ignore_sticky_posts'   => 1,
			'posts_per_page'		=> $total,			
			'meta_key' 		 		=> 'total_sales',
			'orderby' 		 		=> 'meta_value_num',
		);
		// query database
		$products = new WP_Query( $argsp );

		if ( $products->have_posts() ) : ?>
            <div class="sidebar-contant sidebar-item">
                <ul>
			<?php // woocommerce_product_loop_start(); ?>
 
				<?php while ( $products->have_posts() ) : $products->the_post(); ?>
 
					<?php // wc_get_template_part( 'content', 'product' ); ?>
			
                  <li>
                    <div class="pro-media">
                     <a class="<?php the_permalink() ;?>">
                     	<!-- <img alt="T-shirt" src="images/products/item-small-1.jpg"> -->
                     	<?php  the_post_thumbnail('img-75-85'); ?>

                     </a> 
                     </div>
                    <div class="pro-detail-info"> 
                    	<a  class="<?php the_permalink() ;?>">
                    		<?php the_title()?>
                    	</a>
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

                    </div>
                  </li>
 
				<?php endwhile; // end of the loop. ?>
 				</ul>
            </div>
			<?php // woocommerce_product_loop_end(); ?>
 
		<?php endif;
 
		wp_reset_postdata();

		
		echo $args["after_widget"] ;
	}
	
	function form( $instance ) {
		
		// checking 
		
		$title = (!empty($instance['title'])) ? $instance['title'] : null ;
		$total = (!empty($instance['total'])) ? $instance['total'] : 3 ;
		?>

		<div>
			<label for="<?php echo $this->get_field_id('title')?>">Title</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title ; ?>" class="widefat" id="<?php echo $this->get_field_id('title')?>" >
		</div>
		<div>
			<label for="<?php echo $this->get_field_id('total')?>">Total Item</label>
			<input type="number" name="<?php echo $this->get_field_name('total'); ?>" value="<?php echo $total ; ?>" class="widefat" id="<?php echo $this->get_field_id('total')?>" >
		</div>

		<?php
	}
}
function fn_product_categories() {
	register_widget( 'Bestselling_product' );
}
add_action( 'widgets_init', 'fn_product_categories' );