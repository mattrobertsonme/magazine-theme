<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magazine_Theme_v1
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="col-xs-12 col-md-3 left">
    
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
    
</aside><!-- #secondary -->