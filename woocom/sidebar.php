<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package woocom
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

        <div class="col-md-3 col-sm-4">
        	
		<aside id="secondary" class="widget-area">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!-- #secondary -->

          <div class="sidebar-block">
            <div class="sidebar-box mb-40">
              <form>
                <div class="search-box">
                  <input type="text" placeholder="Search entire store here..." class="input-text">
                  <button class="search-btn"><i class="fa fa-search"></i></button>
                </div>
              </form>
            </div>
            <div class="sidebar-box listing-box mb-40"> <span class="opener plus"></span>
              <div class="sidebar-title">
                <h3>Categories</h3>
              </div>
              <div class="sidebar-contant">
                <ul>
                  <li><a>Clothing <span>(21)</span></a></li>
                  <li><a>Shoes <span>(05)</span></a></li>
                  <li><a>Jewellery <span>(10)</span></a></li>
                  <li><a>Home & Furniture <span>(12)</span></a></li>
                  <li><a>Bags <span>(18)</span></a></li>
                  <li><a>Accessories <span>(70)</span></a></li>
                </ul>
              </div>
            </div>
            <div class="sidebar-box mb-40"> <span class="opener plus"></span>
              <div class="sidebar-title">
                <h3>Tags</h3>
              </div>
              <div class="sidebar-contant">
                <ul class="tagcloud">
                  <li><a href="#">Orange</a></li>
                  <li><a href="#">Neutral</a></li>
                  <li><a href="#">Print</a></li>
                  <li><a href="#">Tan</a></li>
                  <li><a href="#">Purple</a></li>
                  <li><a href="#">Yellow</a></li>
                  <li><a href="#">White</a></li>
                  <li><a href="#">Metallic</a></li>
                  <li><a href="#">Red</a></li>
                </ul>
              </div>
            </div>
            <div class="sidebar-box sidebar-item sidebar-item-wide"> <span class="opener plus"></span>
              <div class="sidebar-title">
                <h3>Recent Post</h3>
              </div>
              <div class="sidebar-contant">
                <ul>
                  <li>
                    <div class="pro-media"> <a><img alt="T-shirt" src="<?php echo THEME_URI ?>/images/blog/blog-large-1.jpg"></a> </div>
                    <div class="pro-detail-info"> <a>Slim Nice Skirt</a>
                      <div class="post-info">Dec, 12 2017</div>
                    </div>
                  </li>
                  <li>
                    <div class="pro-media"> <a><img alt="T-shirt" src="<?php echo THEME_URI ?>/images/blog/blog-large-2.jpg"></a> </div>
                    <div class="pro-detail-info"> <a>Slim Nice Skirt</a>
                      <div class="post-info">Dec, 12 2017</div>
                    </div>
                  </li>
                  <li>
                    <div class="pro-media"> <a><img alt="T-shirt" src="<?php echo THEME_URI ?>/images/blog/blog-large-3.jpg"></a> </div>
                    <div class="pro-detail-info"> <a>Slim Nice Skirt</a>
                      <div class="post-info">Dec, 12 2017</div>
                    </div>
                  </li>
                  <li>
                    <div class="pro-media"> <a><img alt="T-shirt" src="<?php echo THEME_URI ?>/images/blog/blog-large-4.jpg"></a> </div>
                    <div class="pro-detail-info"> <a>Slim Nice Skirt</a>
                      <div class="post-info">Dec, 12 2017</div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
