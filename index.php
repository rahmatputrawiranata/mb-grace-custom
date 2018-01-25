<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MB_Grace
 */
global $mwt_options;
get_header(); ?>

	<div id="content" class="row">

		<main id="main" class="col-sm-12 col-md-8 col-lg-9">

			<?php
			if (!empty($mwt_options['top_ads_code'])) {
				echo $mwt_options['top_ads_code'];
			}
			if ( is_active_sidebar( 'sidebar-top' ) ) {
				?><div id="top" class="widget-area">
					<?php dynamic_sidebar('sidebar-top'); ?>
				</div>
				<div class="clear"></div><?php
			} ?>

			<div class="content-featured">
				<?php
				$args = array(
					'post_type'	=> 'post',
					'post_status' => 'publish',
					'posts_per_page' => 6,
			 	    'meta_key' => 'product_meta_box_is_featured',
				    'meta_value' => 'on',
			 	    'meta_value_num' => 10, 
				    'meta_compare' => '=',
				);
				$the_query = new WP_Query( $args );

				// The Loop
				if ( $the_query->have_posts() ) { 
					?><div class="page-header">
						<h2 class="page-title"><?php _e('Featured Deals', 'mb-grace'); ?></h2>
					</div><!-- .page-header -->
					<div class="bgrid block-grid-xs-1 block-grid-sm-1 block-grid-md-5"><?php
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						get_template_part( 'template-parts/content', 'archive' );
					}
					?></div><hr><?php 
					/* Restore original Post Data */
					wp_reset_postdata();
				} else {
					// no posts found
				}
				?>
			</div>

			<?php
			if ( have_posts() ) : $count = 1;

				if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php
				endif; ?>
				<div class="page-header">
					<h2 class="page-title"><?php _e('Frontpage Deals', 'mb-grace'); ?></h2>
				</div><!-- .page-header -->
				<div class="bgrid block-grid-xs-1 block-grid-sm-1 block-grid-md-4">

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'archive' );

					if ( isset($mwt_options['content_ads_'.$count.'_code']) && $mwt_options['content_ads_'.$count.'_code'] != '' ) { 
							echo "</div>";
						?>
						<div class="row">
							<div class="col-md-12">
								<div class="content-ads content-ads-<?php echo $count; ?>">
									<?php echo $mwt_options['content_ads_'.$count.'_code']; ?>
								</div>
							</div>
						</div>
						<?php 
						echo '<div class="bgrid block-grid-xs-1 block-grid-sm-1 block-grid-md-4">';
					}
					$count++;

				endwhile;

				?></div><?php

				mb_grace_pagination(); 

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div><!-- #content -->

<?php
get_footer();
