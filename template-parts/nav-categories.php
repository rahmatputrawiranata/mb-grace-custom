<?php

$categories = get_categories( array(
    'orderby' => 'name',
    'parent'  => 0
) );
echo '<ul class="nav nav-tabs nav-categories">';
if (is_home()) {
	echo '<li role="presentation" class="active"><a>All Posts</a></li>';
}
foreach ( $categories as $category ) {
    printf( '<li role="presentation"><a href="%1$s">%2$s</a></li>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_html( $category->name )
    );
}
echo '</ul>';
?>