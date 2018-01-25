<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MB_Grace
 */
global $mwt_options;
?>
	</div><!-- #content -->
	<footer id="colophon" class="footer">
		<div class="inner-footer container">
		    <div class="footerMiddle">
		        <div class="row">
					<?php
					if ( is_active_sidebar( 'sidebar-footer-1' ) ) {
						?><div class="col-xs-12 col-sm-6 col-md-3">
							<?php dynamic_sidebar('sidebar-footer-1'); ?>
						</div><?php
					} ?>
					<?php
					if ( is_active_sidebar( 'sidebar-footer-2' ) ) {
						?><div class="col-xs-12 col-sm-6 col-md-3">
							<?php dynamic_sidebar('sidebar-footer-2'); ?>
						</div><?php
					} ?>
					<?php
					if ( is_active_sidebar( 'sidebar-footer-3' ) ) {
						?><div class="col-xs-12 col-sm-6 col-md-3">
							<?php dynamic_sidebar('sidebar-footer-3'); ?>
						</div><?php
					} ?>
					<?php
					if ( is_active_sidebar( 'sidebar-footer-4' ) ) {
						?><div class="col-xs-12 col-sm-6 col-md-3">
							<?php dynamic_sidebar('sidebar-footer-4'); ?>
						</div><?php
					} ?>
		        </div>
		    </div>
		</div>
		<div class="footerBottom">
		  <div class="inner">
		    <span class="copyrightLeft">
				<?php if( !empty($mwt_options['footer_copyright_text']) ) {
					echo $mwt_options['footer_copyright_text']; 
				} else { ?>
		    	Copyright &copy; <?php echo date('Y'); ?>
				<a href="<?php echo esc_url( __( get_bloginfo('url'), 'mb-grace' ) ); ?>"><?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( '%s', 'mb-grace' ), get_bloginfo('name') );
				?></a>. All Rights Reserved.
				<?php } ?>
		    </span>
			<?php
			if (has_nav_menu( 'menu-3' )) {
				wp_nav_menu( array(
					'theme_location' 	=> 'menu-3',
					'menu_id'        	=> 'footer-menu',
					'menu_class'			=> 'copyrightRight nav nav-pills',
					'container'				=> 'ul',
				) );
			}
			?>
		  </div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<?php if( !empty($mwt_options['mb_grace_custom_js']) ) {
?><script type="text/javascript">
	<?php echo $mwt_options['mb_grace_custom_js']; ?>
</script><?php } ?>
</body>
</html>
