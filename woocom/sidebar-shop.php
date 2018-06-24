<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package woocom
 */

if ( ! is_active_sidebar( 'sidebar-woocom' ) ) {
	return;
}
?>

<div class="col-md-3 col-sm-4 mb-xs-30">
    <div class="sidebar-block">
        <?php dynamic_sidebar( 'sidebar-woocom' ); ?>
    </div>
</div>


