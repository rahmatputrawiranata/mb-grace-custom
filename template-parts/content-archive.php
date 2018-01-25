<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MB_Grace
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid'); ?>>
	<div class="inner-wrap">
		<header class="entry-header hidden-xs hidden-sm">
			<div class="">
				<?php if(has_post_thumbnail()): ?>
				<?php mb_grace_post_thumbnail(); ?>
				<?php else: ?>
				<div class="post-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt=" " class="img-responsive">
				</div><!-- .post-thumbnail -->
				<?php endif; ?>
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					add_filter( 'the_title', 'max_title_length');
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					
				endif;

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php  
					$metabox_normal_price = get_post_meta(get_the_ID(), 'product_meta_box_normal_price', true);
					$metabox_sale_price = get_post_meta(get_the_ID(), 'product_meta_box_sale_price', true);
					$metabox_currency = get_post_meta(get_the_ID(), 'product_meta_box_currency', true);
					$metabox_is_featured = get_post_meta(get_the_ID(), 'product_meta_box_is_featured', true);
					$metabox_is_custom_price = get_post_meta(get_the_ID(), 'product_meta_box_is_custom_price', true);
					$metabox_custom_price_text = get_post_meta(get_the_ID(), 'product_meta_box_custom_price_text', true);
					$metabox_custom_price_link = get_post_meta(get_the_ID(), 'product_meta_box_custom_price_link', true);
					$metabox_custom_price_notes = get_post_meta(get_the_ID(), 'product_meta_box_custom_price_notes', true);
					$metabox_rating_star = get_post_meta(get_the_ID(), 'product_meta_box_rating_star', true);

					if ( $metabox_is_custom_price == 'on' ) {
						echo '<p class="custom_price"> '.$metabox_custom_price_notes.' <a class="btn btn-warning btn-xs" href="'.$metabox_custom_price_link.'">'.$metabox_custom_price_text.'</a></p>';
					} else {
						if ($metabox_normal_price != '' || $metabox_normal_price > 0) {
							echo '<span class="normal_price">';
							echo $metabox_currency . number_format($metabox_normal_price);
							echo '</span>';
						}
						if ($metabox_sale_price > 0 && $metabox_sale_price < $metabox_normal_price) {
							$percent = ($metabox_sale_price/$metabox_normal_price)*100;
							echo '<span class="discounted label label-warning">';
							echo round(100-$percent) . '% OFF';
							echo '</span>';
						}
						if ($metabox_sale_price != '' && $metabox_sale_price > 0) {
							echo '<span class="sale_price">';
							echo $metabox_currency . number_format($metabox_sale_price);
							echo '</span>';
						}
					} ?>
				</div><!-- .entry-meta -->
				<span class="rating-star" style="position : absolute; bottom :65px;right:5px;">
					<?php mb_grace_post_rating_star($metabox_rating_star); ?>
				</span>
				<?php
				endif; ?>
			</div>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<div class="visible-xs visible-sm">
				<div class="row">
					<div class="col-xs-1 col-sm-1 col-md-3 col-lg-2 vcenter mobile-thumbnail">
						<?php if(has_post_thumbnail()): ?>
						<?php mb_grace_post_thumbnail(); ?>
						<?php else: ?>
						<div class="post-thumbnail">
							<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt=" " class="img-responsive">
						</div><!-- .post-thumbnail -->
						<?php endif; ?>
					</div>
					<div class="col-xs-10 col-sm-10 col-md-7 col-lg-8 vcenter mobile-content">
						<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
						endif;

						if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php  
							if ( $metabox_is_custom_price == 'on' ) {
								echo '<p class="custom_price"> '.$metabox_custom_price_notes.' <a class="btn btn-warning btn-xs" href="'.$metabox_custom_price_link.'">'.$metabox_custom_price_text.'</a></p>';
							} else {
								if ($metabox_normal_price != '' || $metabox_normal_price > 0) {
									echo '<span class="normal_price">';
									echo $metabox_currency . number_format($metabox_normal_price);
									echo '</span>';
								}
								if ($metabox_sale_price > 0 && $metabox_sale_price < $metabox_normal_price) {
									$percent = ($metabox_sale_price/$metabox_normal_price)*100;
									echo '<span class="discounted label label-warning">';
									echo round(100-$percent) . '% OFF';
									echo '</span>';
								}
								if ($metabox_sale_price != '' && $metabox_sale_price > 0) {
									echo '<span class="sale_price">';
									echo $metabox_currency . number_format($metabox_sale_price);
									echo '</span>';
								}
							} ?>
						</div><!-- .entry-meta -->
						<?php
						endif; ?>
						<?php //the_excerpt(); ?>
						<span class="rating-star">
							<?php mb_grace_post_rating_star($metabox_rating_star); ?>
						</span>
					</div>
					<div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 vcenter mobile-action">
						<div class="view-button-wrap">
							<a class="btn btn-danger view-button" href="<?php the_permalink(); ?>">View Deal</a>
						</div>
					</div>
				</div>
			</div>
			<div class="hidden-xs hidden-sm">
				<div class="view_button-wrap">
					<a class="btn btn-danger btn-lg view_button" href="<?php the_permalink(); ?>">View Details</a>
				</div>
			</div>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
