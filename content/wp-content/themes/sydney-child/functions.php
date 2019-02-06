<?php
/* 
child theme definition:
*/
/*
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
function enqueue_child_theme_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
*/


/* overriding footer function in parent theme - we dont want edit link */
function sydney_entry_footer() {
    // Hide category and tag text for pages.
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', __( '', 'sydney' ) );
        if ( $tags_list && is_single() ) {
            printf( '<span class="tags-links">' . __( ' %1$s', 'sydney' ) . '</span>', $tags_list );
        }
    }
    // edit_post_link( __( 'Edit', 'sydney' ), '<span class="edit-link">', '</span>' );
}

// https://wordpress.stackexchange.com/questions/207895/how-to-display-a-pages-featured-image
function wpse207895_featured_image() {
   //Execute if singular
    if ( is_singular() ) {

        $id = get_queried_object_id ();

        // Check if the post/page has featured image
        if ( has_post_thumbnail( $id ) ) {

            // Change thumbnail size, but I guess full is what you'll need
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );

            $url = $image[0];

        } else {

            //Set a default image if Featured Image isn't set
            $url = '';

        }
    }

    if ($url != ''){
        printf('<img src="' . $url . '" />');
    } else {
        printf('else');
    } 
}


function my_theme_enqueue_styles() {

    $parent_style = 'sydney-style'; // parent style need to be loaded first

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/css/ie9.css' );
    wp_style_add_data( 'sydney-ie9', 'conditional', 'lte IE 9' );
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/fonts/font-awesome.min.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


?>