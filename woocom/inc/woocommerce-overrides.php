<?php
/******************************************************************************
 * Variation Grid
 *
 * The following function allow for the theme to display product variations in a grid format.
 * This code could be moved to a plugin but is in the theme function file as it used the
 * themes grid system.
 *
 * @reference: http://www.eggplantstudios.ca/woocommerce-product-variation-add-cart-grid/ 
 * ******************************************************************************/

/**
 * Add option to allow the variations to be displayed in a grid or default layout
 *
 * @since Variation Grid 1.0
 */
add_action( 'woocommerce_product_options_general_product_data', 'variation_grid_advanced_fields' );
function variation_grid_advanced_fields() {
    global $woocommerce, $post;
    echo '<div class="options_group show_if_variable">';

    $variation_grid_view = get_post_meta( $post->ID, 'variation_grid_view', true);
    woocommerce_wp_checkbox(
        array(
            'id' => 'variation_grid_view',
            'wrapper_class' => 'show_if_variable',
            'label' => __('Show Variations in Grid', 'scaffolding' ),
            'description' => __( 'Enable', 'scaffolding' ),
            'cbvalue' => true
        )
    );

    $variation_grid_count = get_post_meta( $post->ID, 'variation_grid_count', true);
    woocommerce_wp_select(
        array(
            'id'      => 'variation_grid_count',
            'wrapper_class' => 'show_if_variable',
            'label'   => __( 'Number of Columns', 'scaffolding' ),
            'options' => array(
                '1'   => '1',
                '2'   => '2',
                '3'   => '3',
                '4'   => '4',
            )
        )
    );

    echo '</div>';
}

/**
 * Save option if the variation is in grid layout
 *
 * @since Variation Grid 1.0
 */
add_action( 'woocommerce_process_product_meta', 'variation_grid_advanced_fields_save' );
function variation_grid_advanced_fields_save( $post_id ) {

    // Save checkbox options
    if ( ! empty( $_POST['variation_grid_view'] ) ) {
        update_post_meta( $post_id, 'variation_grid_view', true );
    } else {
        update_post_meta( $post_id, 'variation_grid_view', false );
    }

    // Save select field options
    if( $_POST['variation_grid_count'] ){
        update_post_meta( $post_id, 'variation_grid_count', esc_attr( $_POST['variation_grid_count'] ) );
    }
}

/**
 * Display in grid format by overwriting woocommerce template
 *
 * @since Variation Grid 1.0
 */
remove_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart' );
add_action( 'woocommerce_variable_add_to_cart', 'swoocommerce_variable_add_to_cart' );

function swoocommerce_variable_add_to_cart() {
    global $product, $post, $woocommerce;

    $variations = find_valid_variations();
    $attributes = $product->get_attributes();

    // Check if the special 'variation_grid_view' meta is set to false, load the default template:
    if ( !get_post_meta( $post->ID, 'variation_grid_view', true ) ) {
        // Enqueue variation scripts
        wp_enqueue_script( 'wc-add-to-cart-variation' );

        // Load the template
        wc_get_template( 'single-product/add-to-cart/variable.php', array(
                'available_variations'  => $product->get_available_variations(),
                'attributes'            => $product->get_variation_attributes(),
                'selected_attributes'   => $product->get_variation_default_attributes()
            ) );
        return;
    }

    // Uses the bootstrap grid class names - TODO: Update these if you are using a different grid
    $grid_count = get_post_meta( $post->ID, 'variation_grid_count', true );
    switch ($grid_count) {
        case 1:
            $grid_class="col-sm-12";
            break;
        case 2:
            $grid_class="col-sm-6";
            break;
        default;
        case 3:
            $grid_class="col-sm-4";
            break;
        case 4:
            $grid_class="col-sm-3";
            break;
    } ?>

    <div class="variations variations-grid clearfix" cellspacing="0">

        <div class="variation-inner clearfix" cellspacing="0">

        <?php // Loop through visible variations
        foreach ($variations as $key => $value) :

            if( !$value['variation_is_visible'] ) continue; ?>

            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="<?php echo $grid_class; ?> clearfix">

            <?php // Loop through and print the attribute names
            $name_output = null;
            foreach( $value['attributes'] as $key => $val ) {

				$key = str_replace( 'attribute_', '', $key ); // Clean the attribute name

				$attribute = $attributes[$key]; // Get the attribute data

				// Check if the attribute is a taxonomy
				if( $attribute['is_taxonomy'] ){

					// Get the taxonomy name
					$attr_name = get_term_by( 'slug', $val, $key, 'ARRAY_A' );
					$attr_name = $attr_name['name'];

				} else {
					$attr_name = ucwords($val); // Clean up the custom attribute name
				}

                $name_output[] = "<span class='variation-titles attr attr-$key'>$attr_name</span>";
            }

			// Dump the output
			echo implode(', ', $name_output);
            ?>

                <span itemprop="price" class="variation-price price"><?php echo $value['price_html']; ?></span>

            <?php if( $value['is_in_stock'] ): ?>

                <form class="cart" action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" method="post" enctype='multipart/form-data'>

                    <?php woocommerce_quantity_input(); ?>

                    <?php // Run through the attributes and print them in hidden inputs
                    if( !empty( $value['attributes'] ) ){
                        foreach ($value['attributes'] as $attr_key => $attr_value) { ?>

                        <input type="hidden" name="<?php echo $attr_key?>" value="<?php echo $attr_value?>">

                        <?php
                        }
                    }?>

                    <button type="submit" class="single_add_to_cart_button button alt"><span class="glyphicon glyphicon-tag"></span> Add to cart</button>

                    <input type="hidden" name="variation_id" value="<?php echo $value['variation_id']?>" />
                    <input type="hidden" name="product_id" value="<?php echo esc_attr( $post->ID ); ?>" />
                    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $post->ID ); ?>" />

                </form>

            <?php else: //Out off Stock ?>

                <p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>

            <?php endif; ?>

            </div>

        <?php endforeach; ?>

        </div>

    </div>

    <?php
}

/**
 * Collect all the variations of a product and add them in a new array to use for displaying them in the grid
 *
 * @since Variation Grid 1.0
 */
function find_valid_variations() {
    global $product;

    $variations = $product->get_available_variations();
    $attributes = $product->get_attributes();
    $new_variants = array();

    // Loop through all variations
    foreach( $variations as $variation ) {

        // Peruse the attributes.

        // 1. If both are explicitly set, this is a valid variation
        // 2. If one is not set, that means any, and we must 'create' the rest.

        $valid = true; // so far
        foreach( $attributes as $slug => $args ) {
            if( array_key_exists("attribute_$slug", $variation['attributes']) && !empty($variation['attributes']["attribute_$slug"]) ) {
                // Exists

            } else {
                // Not exists, create
                $valid = false; // it contains 'anys'
                // loop through all options for the 'ANY' attribute, and add each
                foreach( explode( '|', $attributes[$slug]['value']) as $attribute ) {
                    $attribute = trim( $attribute );
                    $new_variant = $variation;
                    $new_variant['attributes']["attribute_$slug"] = $attribute;
                    $new_variants[] = $new_variant;
                }

            }
        }

        // This contains ALL set attributes, and is itself a 'valid' variation.
        if( $valid )
            $new_variants[] = $variation;

    }

    return $new_variants;
}

/*
 * Custom Add To Cart Messages
 *
 * @since Variation Grid 1.1
 */
add_filter( 'wc_add_to_cart_message', 'custom_add_to_cart_message', 10, 2 );
function custom_add_to_cart_message( $message, $product_id ) {

	// Collect the variation if is exists
	$variation_id = isset( $_REQUEST[ 'variation_id' ] ) ? $_REQUEST[ 'variation_id' ] : null;

	if ( is_array( $product_id ) ) { // Multiple item added to cart - Grouped Product

		$titles = array();

		foreach ( $product_id as $id ) {
			$titles[] = get_the_title( $id );
		}

		$added_text = sprintf( __( 'Added %s to your cart.', 'woocommerce' ), wc_format_list_of_items( $titles ) );

	} else { // One item added to cart

		// Add variation name to the product title
		$added_title = '';

		if ( !empty( $variation_id ) ) {

			// Collect the product, product variations and attributes
			$var_product = get_product( $variation_id );
			$variations = $var_product->get_variation_attributes();
			$attributes = $var_product->get_attributes();
			$name_output = null;

			if ( is_array( $variations ) ) {

				foreach( $variations as $key => $value ) {

					$key = str_replace( 'attribute_', '', $key ); // Clean the attribute name

					$attribute = $attributes[$key]; // Get the attribute data

					// Check if the attribute is a taxonomy
					if( $attribute['is_taxonomy'] ){

						// Get the taxonomy name
						$attr_name = get_term_by( 'slug', $value, $key, 'ARRAY_A' );
						$attr_name = $attr_name['name'];

					} else {
						$attr_name = ucwords($value); // Clean up the custom attribute name
					}

	                $name_output[] = $attr_name; // Load them into an array to be imploded
				}
			}
		}

		$product_title = get_the_title( $product_id ); // Get the main product title

		$product_title .= ( $name_output ? ' &mdash; ' . implode( ', ', $name_output ) : '' ); // Add variation(s) if not null

		$added_text = sprintf( __( '&quot;%s&quot; was successfully added to your cart.', 'woocommerce' ), $product_title );
	}

	// Output success messages
	if ( get_option( 'woocommerce_cart_redirect_after_add' ) == 'yes' ) :

		$return_to 	= apply_filters( 'woocommerce_continue_shopping_redirect', wp_get_referer() ? wp_get_referer() : home_url() );

		$message 	= sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', $return_to, __( 'Continue Shopping', 'woocommerce' ), $added_text );

	else :

		$message 	= sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', wc_get_page_permalink( 'cart' ), __( 'View Cart', 'woocommerce' ), $added_text );

	endif;

	return $message;
}