<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MB_Grace
 */

get_header(); ?>

	<div id="content" class="row"> 

		<main id="main" class="col-sm-12 col-md-8">

			<section class="error-404 not-found panel panel-default">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mb-grace' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content panel-body">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'mb-grace' ); ?></p>
					<?php get_search_form(); ?>
					<br>
					<div class="clear"></div>
					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
					<div class="clear"></div>
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'mb-grace' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div><!-- #content -->

<?php
get_footer();
