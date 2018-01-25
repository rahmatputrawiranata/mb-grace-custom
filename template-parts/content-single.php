<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MB_Grace
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('panel panel-default'); ?>>
	<header class="entry-header panel-heading hidden-xs hidden-sm">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content panel-body">
		<div class="row">
			<div class="col-sm-12 col-md-6 hidden-xs hidden-sm">
				<?php  
				if ( 'post' === get_post_type() ) : 
					$metabox_normal_price = get_post_meta(get_the_ID(), 'product_meta_box_normal_price', true);
					$metabox_sale_price = get_post_meta(get_the_ID(), 'product_meta_box_sale_price', true);
					$metabox_product_link = get_post_meta(get_the_ID(), 'product_meta_box_link', true);
					$metabox_currency = get_post_meta(get_the_ID(), 'product_meta_box_currency', true);
					$metabox_is_featured = get_post_meta(get_the_ID(), 'product_meta_box_is_featured', true);
					$metabox_rating_star = get_post_meta(get_the_ID(), 'product_meta_box_rating_star', true);
					$metabox_link_text = get_post_meta(get_the_ID(), 'product_meta_box_link_text', true);
					$metabox_coupon_code = get_post_meta(get_the_ID(), 'product_meta_box_coupon_code', true);
					$metabox_is_custom_price = get_post_meta(get_the_ID(), 'product_meta_box_is_custom_price', true);
					$metabox_custom_price_text = get_post_meta(get_the_ID(), 'product_meta_box_custom_price_text', true);
					$metabox_custom_price_link = get_post_meta(get_the_ID(), 'product_meta_box_custom_price_link', true);
					$metabox_custom_price_notes = get_post_meta(get_the_ID(), 'product_meta_box_custom_price_notes', true);

					if ( $metabox_is_custom_price == 'on' ) {
						echo '<p class="custom_price"> '.$metabox_custom_price_notes.'<br> <a class="btn btn-warning btn-xs" href="'.$metabox_custom_price_link.'">'.$metabox_custom_price_text.'</a></p>';
					} else {
						if ($metabox_sale_price != '' && $metabox_sale_price > 0) {
							echo '<span class="sale_price">';
							echo $metabox_currency . number_format($metabox_sale_price);
							echo '</span>';
						}
						if ($metabox_sale_price > 0 && $metabox_sale_price < $metabox_normal_price) {
							$percent = ($metabox_sale_price/$metabox_normal_price)*100;
							echo '<span class="discounted label label-warning">';
							echo round(100-$percent) . '% OFF';
							echo '</span>';
						}
						if ($metabox_normal_price != '' || $metabox_normal_price > 0) {
							echo '<span class="normal_price">';
							echo $metabox_currency . number_format($metabox_normal_price);
							echo '</span>';
						}
					} ?>
				<div class="entry-meta">
					<span class="rating-star">
						<?php mb_grace_post_rating_star($metabox_rating_star); ?>
					</span>
				</div><!-- .entry-meta -->
				<?php endif; 
				if ($metabox_coupon_code != '') { ?>
					<div class="well coupon-code">
						<h3><i class="fa fa-scissors"></i> Coupon Code</h3>
						<p><?php echo $metabox_coupon_code; ?></p>
					</div><?php
				}
				?>

			</div>
			<div class="col-sm-12 col-md-6">
				<div class="text-center">
					<?php mb_grace_post_thumbnail(); ?>
					<a href="<?php echo $metabox_product_link; ?>" class="btn btn-success btn-lg btn-block dealButton hidden-xs hidden-sm"><?php echo $metabox_link_text; ?></a>
				</div>
			</div>
			<div class="col-sm-12 col-md-6 visible-xs visible-sm">
				<div class="text-center single-mobile">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
						add_filter( 'the_title', 'max_title_length');
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						add_filter( 'the_title', 'max_title_length');
					endif; ?>
					<?php  
					if ( 'post' === get_post_type() ) : 
						if ( $metabox_is_custom_price == 'on' ) {
							echo '<p class="custom_price"> '.$metabox_custom_price_notes.'<br> <a class="btn btn-warning btn-xs" href="'.$metabox_custom_price_link.'">'.$metabox_custom_price_text.'</a></p>';
						} else {
							if ($metabox_sale_price != '' && $metabox_sale_price > 0) {
								echo '<span class="sale_price">';
								echo $metabox_currency . number_format($metabox_sale_price);
								echo '</span>';
							}
							if ($metabox_normal_price != '' || $metabox_normal_price > 0) {
								echo '<span class="normal_price">';
								echo $metabox_currency . number_format($metabox_normal_price);
								echo '</span>';
							} 
							if ($metabox_sale_price > 0 && $metabox_sale_price < $metabox_normal_price) {
								$percent = ($metabox_sale_price/$metabox_normal_price)*100;
								echo '<br><span class="discounted label label-warning">';
								echo round(100-$percent) . '% OFF';
								echo '</span>';
							}
						} ?>
					<!--
					<div class="entry-meta">
						<?php // mb_grace_single_posted_on(); ?>	
					</div>
					-->
					<span class="rating-star">
						<br>
						<?php mb_grace_post_rating_star($metabox_rating_star); ?>
					</span>
					<?php
					endif;
					?>
					<a href="<?php echo $metabox_product_link; ?>" class="btn btn-success btn-lg btn-block dealButton"><?php echo $metabox_link_text; ?></a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<hr>
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mb-grace' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mb-grace' ),
				'after'  => '</div>',
			) );
		?>	
	</div><!-- .entry-content -->

	<footer class="entry-footer panel-footer">
		<?php mb_grace_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
