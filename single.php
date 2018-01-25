<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MB_Grace
 */
global $mwt_options;

get_header(); ?>

	<?php mb_grace_breadcrumbs(); ?>

	<div id="content" class="row">

		<main id="main" class="col-sm-12 col-md-8">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( $mwt_options['comment_option'][1] == 0 ) {
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			}

			mb_grace_related_post();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div><!-- #content -->

<?php
get_footer();
