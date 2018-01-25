<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MB_Grace
 */

if ( ! is_active_sidebar( 'sidebar-right' ) ) {
	return;
}
global $mwt_options;
?>
<aside id="sidebar" class="col-sm-12 col-md-4 col-lg-3 widget-area hidden-xs">
	<?php
	if (!empty($mwt_options['right_ads_code'])) {
		echo '<div class="sidebar-right-ads">'.$mwt_options['right_ads_code'].'</div><br>';
	}
	?>
	<?php dynamic_sidebar( 'sidebar-right' ); ?>
</aside><!-- #secondary -->