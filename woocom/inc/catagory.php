<?php
class XpentCatagory extends WP_Widget {
	function __construct() {
		// Instantiate the parent object
		parent::__construct( 'catagories', 'Xpent Wc Product Catagory ' ,array(
				'description'=> "Xpent Catagory By Post type "
			));
	}
	function widget( $args, $instance ) {
		// checking 
		$title = (!empty($instance['title'])) ? $instance['title'] : false ;
		$post_type = (!empty($instance['post_type'])) ? $instance['post_type'] : false ;
		
		// Widget output
		echo $args["before_widget"];
		
		echo  $args["before_title"].$instance["title"]. $args["after_title"] ?>
			
			<div class="sidebar-contant">
                <ul>
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
						    foreach ($product_categories as $key => $category) {
						        echo '<li><a href="'.get_term_link($category).'" >'.$category->name.'</a><span>('.$category->count.')</span></li>';
						    }
						}
					?>

                </ul>
              </div>
		
		<?php echo $args["after_widget"] ;
	}
	// function update( $new_instance, $old_instance ) {
	// 	// Save widget options
	// }
	function form( $instance ) {
		
		// checking 
		
		$title = (!empty($instance['title'])) ? $instance['title'] : null ;
		$post_type = (!empty($instance['post_type'])) ? $instance['post_type'] : null ;

		?>
		<div>
			<label for="<?php echo $this->get_field_id('title')?>">Title</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title ; ?>" class="widefat" id="<?php echo $this->get_field_id('title')?>" >
		</div>
		

		<?php
	}
}
function fun_XpentCatagory() {
	register_widget( 'XpentCatagory' );
}
add_action( 'widgets_init', 'fun_XpentCatagory' );