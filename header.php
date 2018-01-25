<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MB_Grace
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <?php global $mwt_options; ?>
		<style type="text/css">
			<?php if( !empty($mwt_options['thumbnail_large_screen_size']['height']) ) {
		?>
			.desktop .inner-wrap .post-thumbnail img {
				width: <?php echo $mwt_options['thumbnail_large_screen_size']['width']; ?>;
				height: <?php echo $mwt_options['thumbnail_large_screen_size']['height']; ?>;
			}
			<?php } ?>
			@media only screen and (max-width : 1200px) {
				<?php if( !empty($mwt_options['thumbnail_medium_screen_size']['height']) ) :
			?>
				.desktop .inner-wrap .post-thumbnail img {
					width: <?php echo $mwt_options['thumbnail_medium_screen_size']['width']; ?>;
					height: <?php echo $mwt_options['thumbnail_medium_screen_size']['height']; ?>;
					min-height: <?php echo $mwt_options['thumbnail_medium_screen_size']['height']; ?>;
					max-height: <?php echo $mwt_options['thumbnail_medium_screen_size']['height']; ?>;
				}
				<?php else: ?>
				.desktop .inner-wrap .post-thumbnail img {
					height: 120px;
				}
				<?php endif; ?>
			}
			@media only screen and (max-width : 992px) {
				<?php if( !empty($mwt_options['thumbnail_small_screen_size']['height']) ) :
			?>
				.desktop .inner-wrap .post-thumbnail img {
					width: <?php echo $mwt_options['thumbnail_small_screen_size']['width']; ?>;
					height: <?php echo $mwt_options['thumbnail_small_screen_size']['height']; ?>;
					min-height: <?php echo $mwt_options['thumbnail_small_screen_size']['height']; ?>;
					max-height: <?php echo $mwt_options['thumbnail_small_screen_size']['height']; ?>;
				}
				<?php else: ?>
				.mobile .inner-wrap .post-thumbnail img {
					width: 90px;
					height: 100px;
					max-width: 90px;
					max-height: 100px;
				}
				<?php endif; ?>
			}
			<?php if( !empty($mwt_options['mb_grace_custom_css']) ) {
		?>
			<?php echo $mwt_options['mb_grace_custom_css']; ?>
			<?php } ?>
		</style>
	<?php if( !empty($mwt_options['analytics_code']) ) {
		echo $mwt_options['analytics_code'];
	} ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="header">
		<nav id="main-navigation" class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'mb_grace' ); ?></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <?php if( !empty($mwt_options['mb_grace_logo']['url']) ): ?>
				<a class="navbar-brand logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $mwt_options['mb_grace_logo']['url']; ?>" alt="<?php bloginfo('name'); ?>"></a>
			   <?php else: ?>
			   	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
			   <?php endif; ?>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<?php
					wp_nav_menu( array(
						'theme_location' 	=> 'menu-1',
						'menu_id'        	=> 'main-menu',
						'menu_class'		=> 'nav navbar-nav',
										'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
										'walker'            => new wp_bootstrap_navwalker()
					) );
					?>
		      <form class="navbar-form navbar-right hidden-xs hidden-sm" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
			    <div class="input-group">
			      <input id="s" type="text" class="form-control" name="s" placeholder="<?php echo __('Search', 'mb_grace'); ?>">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
			      </span>
			    </div><!-- /input-group -->
		      </form>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav><!-- #site-navigation -->
		<?php
		if (has_nav_menu( 'menu-2' )) { ?>
			<div class="centered-pills"><?php
			wp_nav_menu( array(
				'theme_location' 	=> 'menu-2',
				'menu_id'        	=> 'category-menu',
				'menu_class'		=> 'nav nav-pills',
			) ); ?></div><?php
		} else { ?>
			<div class="clear" style="min-height: 5em"></div>
		<?php } ?>
	</header>
	<form class="mobile-search visible-xs visible-sm" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	    <div class="input-group">
	      <input id="s" type="text" class="form-control" name="s" placeholder="<?php echo __('Search', 'mb_grace'); ?>">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
	      </span>
	    </div>
	</form>
	<div id="wrapper" class="container-fluid">


