<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woocom
 */

if (is_single()){
$post_class = 'col-xs-12 single-post-class';
}else{
$post_class = 'col-xs-12 ';
}


?>

<div id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<div class="blog-item">
		<?php woocom_post_thumbnail(); ?>
	
		<div class="blog-detail mt-30">
			<?php 
				woocom_posted_on(); 

					if ( is_singular() ) :
						the_title( '<h3>', '</h3>' );
					else :
						the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					endif;
			?>

			<?php the_content(); ?>
			<hr>
			<div class="post-info">
				<ul>
					<li><?php woocom_posted_by(); ?></li>
					<li>
						<!-- <a href="<?php // echo esc_url( get_permalink() )  ?>">  -->
						<?php  // get_comments_number returns only a numeric value

							if ( comments_open() ) {
								 $num_comments = get_comments_number();
								if ( $num_comments == 0 ) {
									$comments = __('No Comments');
								} elseif ( $num_comments > 1 ) {
									$comments = $num_comments . __(' Comments');
								} else {
									$comments = __('1 Comment');
								}
								echo $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
							} 


						?>.
					<!-- </a> -->

					 </li>
				</ul>
			</div>
			
			<?php // woocom_entry_footer(); ?>

		</div>
	</div>
</div>
