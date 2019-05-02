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
        printf('');
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

function clash_city_user($user) {
    $a = '<li>';

    $a .= '<h2>' . $user->first_name . ' ' . $user->last_name . '</h2>';

    if ($user->description) {
        $a .= '<p class="description">' . $user->description . '</p>';
    }
    if ($user->mobile) {
        $a .= '<div class="phone"><span>tel: </span>' . $user->mobile . '</div>';
    }
    if ($user->user_email) {
        $a .= '<a href="mailto:' . $user->user_email . '" class="email">' . $user->user_email . '</a>';
    }
    if ($user->user_url) {
        $a .= '<a href="' . $user->user_url . '" class="webbplats" target=_blank>' . $user->user_url . '</a>';
    }
    $a .= '</li>';

    return $a;
} 

//[clash-city-rockers]
function clash_city_rockers( $atts ){
    $a = shortcode_atts( array(
        'list' => ''
    ), $atts );

    if (!$a['list']) {
        return '[error] ange lista';
    }

    $user_query = new WP_User_Query(array( 'meta_key' => '_tern_wp_member_list', 'meta_value' => $a['list'] ));
    $result = $user_query->get_results();

    if (empty($result)) {
        return 'inga användare i listan';
    }

    $output = '<ul class="personlista">';

    foreach ($result as $user) {
        $output .= clash_city_user($user);
    }

    $output .= '</ul>';

    return $output;

    //return "GO GO Claaash city rockez";
}
add_shortcode( 'clash-city-rockers', 'clash_city_rockers' );


?>