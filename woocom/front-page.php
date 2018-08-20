<?php
/**
 *Template Name: Home One 
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woocom
 */

get_header();
?>
  <div id="content" class="site-content">
  <?php if (!is_home() && is_front_page()) : ?>
    <!-- BANNER STRAT -->
    <div class="banner">
      <div class="container">
        <div class="row m-0">
          <div class="col-md-3"></div>
          <div class="col-md-9 p-0">
            <div class="main-banner">
              <?php  if (!empty(woo_option('homess-slides'))) {
                $homess_slides = woo_option('homess-slides'); 
                foreach ($homess_slides as $key => $slides) : ?>

                  <div class="banner" style="background: url(<?php echo esc_url($slides['image']); ?>);"> 
                    <div class="banner-detail">
                      <div class="row">
                        <div class="col-md-8 col-sm-7 col-xs-7 text-center">
                          <div class="banner-detail-inner"> 
                            <!-- <span class="slogan">Women’s Categories</span> -->
                            <h1 class="banner-title"><?php echo $slides['title'];?></h1>
                            <span class="slogan"><?php echo $slides['description'];?></span><br>
                            <a href="<?php echo $slides['url'];?>" class="btn btn-color">Shop Now</a>   
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

              <?php endforeach; } ?>
              
              
            </div>
          </div> 
        </div>
      </div>
    </div>
    <!-- BANNER END --> 
  <?php endif; ?>

  <!-- CONTAIN START -->
  <section class="mt-20 mt-xs-30">
    <div class="container">
      <div class="sub-banner-block center-xs">
        <div class="row mlr_-20">

        <?php  if (!empty(woo_option('homess-banners'))) {
                $homess_banner = woo_option('homess-banners'); 
                foreach ($homess_banner as $key => $banners) : ?>

          
          <div class="col-sm-6 plr-20">
            <div class="sub-banner banner-text-left"> 
              <a href="<?php echo $banners['url'];?>"> 
                <img src="<?php echo esc_url($banners['image']); ?>" alt=" ">
                <div class="sub-banner-detail">
                  <div class="sub-banner-type"><?php echo $banners['title'];?></div>
                  
                  <div class="sub-banner-subtitle"><?php echo $banners['description'];?></div>
                  <span class="btn btn-color">SHOP NOW</span>
                </div> 
                <div class="sub-banner-effect"></div>
              </a> 
            </div>
          </div>
        <?php endforeach; } ?>
                       


        </div>
      </div>
    </div>
  </section>
  
  <!--  Featured Products Slider Block Start  -->
  <section class="pt-60 pt-xs-30">
    <div class="container">

        <div class="row">
          <div class="col-xs-12">
            <div class="heading-part mb-20">
              <h2 class="main_title">Featured Products</h2>
            </div>
          </div>
        </div>

        <div class="featured-product">
          <div class="row mlr_-20">


<?php
   $meta_query  = WC()->query->get_meta_query();
    $tax_query   = WC()->query->get_tax_query();
    $tax_query[] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
        'operator' => 'IN',
    );

    $args = array(
        'post_type'           => 'product',
        'post_status'         => 'publish',
        // 'ignore_sticky_posts' => 1,
        // 'meta_key' => '_featured',
        // 'meta_value' => 'yes',
        'posts_per_page'      => 8,
        'meta_query'          => $meta_query,
        'tax_query'           => $tax_query,
    );


    $q = new WP_Query($args);

    if ( $q->have_posts() ) :
        while ( $q->have_posts() ) : $q->the_post();
          // echo do_shortcode('[products limit="4" columns="" visibility="featured" ]');
?>
        <div class="col-md-3 col-sm-4 col-xs-6 plr-20">
            <?php wc_get_template_part( 'content', 'product' ); ?>
        </div>
    <?php
        endwhile; wp_reset_query();
    endif;
?>
          </div>
        </div>

    </div>
  </section>
  <!--  Featured Products Slider Block End  --> 

  <!-- perellex-banner Start -->
  <section class="ptb-60 ptb-xs-30">
    <div class="parallax-bg client-bg align-center dark-bg" style="background-image: url(<?php echo esc_url(woo_option('cta-bg')['url']) ; ?>);">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 mtb-40 ptb-60">
            <h1> <?php echo woo_option('cta_title'); ?></h1>
            <p><?php echo woo_option('cta_textarea'); ?> </p>

            <a href="<?php echo esc_url(woo_option('cta_link')) ?>" class="btn btn-color">Shop Now!</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- perellex-banner End -->

  <!--  Best Sallers Slider Block Start  -->
  <section class="pb-60 pb-xs-30 featured-product">
    <div class="container">
      <div class="product-slider">
        <div class="row">
          <div class="col-xs-12">
            <div class="heading-part mb-20">
              <h2 class="main_title">Latest Products</h2>
            </div>
          </div>
        </div>
        <div class="position-r">
          <div class="row">
            <div class="owl-carousel pro_cat_slider">
<?php
   $meta_query  = WC()->query->get_meta_query();
    $tax_query   = WC()->query->get_tax_query();
    $tax_query[] = array(
        'taxonomy' => 'product_visibility',
        'field'    => 'name',
        'terms'    => 'featured',
        'operator' => 'IN',
    );

    $args = array(
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => 1,
        'posts_per_page'      => 8,
        'meta_query'          => $meta_query,
        'tax_query'           => $tax_query,
    );


    $q = new WP_Query($args);

    if ( $q->have_posts() ) :
        while ( $q->have_posts() ) : $q->the_post();
          // echo do_shortcode('[products limit="4" columns="" visibility="featured" ]');
?>
    <div class="item">
        <?php wc_get_template_part( 'content', 'product' ); ?>
    </div>

<?php
        endwhile; wp_reset_query();
    endif;
?>



            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  Best Sallers Slider Block End  -->

   <!--  Site Services Features Block Start  -->
  <section class="pb-xs-30">
    <div class="service-block center-sm">
    <div class="container">
        <div class="row">

        <?php  if (!empty(woo_option('homess-DELIVERY'))) {
                $homess_banner = woo_option('homess-DELIVERY'); 
                foreach ($homess_banner as $key => $DELIVERY) : ?>
            <div class="col-md-3 col-xs-6 feature-box-main">
              <div class="feature-box">
                <i class="">
                <img src="<?php echo esc_url($DELIVERY['image']); ?>" width="50"></i>
                <div class="title"><?php echo $DELIVERY['title'];?></div>
                <div class="subtitle"><?php echo $DELIVERY['description'];?></div>
              </div>
            </div>
         <?php endforeach; } ?>
        </div>
      </div>
    </div>
  </section>
  <!--  Site Services Features Block End  -->

<?php

get_footer();
