<?php
/* 
child theme definition:
*/
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/* 
kill function U dislike in parent theme:
*/
function kill_parent_functions() {
	remove_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );
	remove_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );
}
add_action( 'after_setup_theme', 'kill_parent_functions' );
//add_action( 'wp_loaded', 'kill_parent_functions' );



/* Continue reading -> Läs mer */
function twentyten_child_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyten_child_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_child_auto_excerpt_more' );

function twentyten_child_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyten_child_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_child_custom_excerpt_more' );

function twentyten_child_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Läs mer <span class="meta-nav">&rarr;</span>', 'twentyten' ) . '</a>';
}


/* Post meta data overriden from parent theme */
function twentyten_posted_on() {
	printf( __( '<span class="meta-sep">av</span> %2$s', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentyten' ), get_the_author() ) ),
			get_the_author()
		)
	);
}
function twentyten_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( '%1$s, tagged %2$s. Bokmärk <a href="%3$s" title="Permalink to %4$s" rel="bookmark">sidan</a>.', 'twentyten' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( '%1$s. Bokmärk <a href="%3$s" title="Permalink to %4$s" rel="bookmark">sidan</a>.', 'twentyten' );
	} else {
		$posted_in = __( 'Bokmärk <a href="%3$s" title="Permalink to %4$s" rel="bookmark">sidan</a>.', 'twentyten' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}

?>