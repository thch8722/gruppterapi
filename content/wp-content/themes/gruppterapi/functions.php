<?php
/* Tell WordPress to run child_theme_setup()
when the 'after_setup_theme' hook is run.
*/
add_action( 'after_setup_theme', 'child_theme_setup' );

/* This function will hold our new calls and over-rides */
if ( !function_exists( 'child_theme_setup' ) ):
function child_theme_setup() {
/*We want a Second Navigation Bar in the sidebar
This theme uses wp_nav_menu() in two locations.
*/
register_nav_menus( array(
	'secondary' => __( 'Sidebar Menu', 'twentyten' ),
) );
}
endif;
/* Adds a secondary sidebar */
if ( function_exists ('register_sidebar')) { 
    register_sidebar ('custom'); 
} 
	
function child_theme_setup_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'child_theme_setup' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'child_theme_setup' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'child_theme_setup' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'child_theme_setup' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'child_theme_setup' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'child_theme_setup' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'child_theme_setup' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'child_theme_setup' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'child_theme_setup' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'child_theme_setup' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'child_theme_setup' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'child_theme_setup' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'child_theme_setup_widgets_init' );
	
function yourchildtheme_remove_twenty_ten_headers(){ //source: http://aaron.jorb.in/blog/2010/07/remove-all-default-header-images-in-a-twenty-ten-child-theme/
    unregister_default_headers( array(
        'berries',
        'cherryblossom',
        'concave',
        'fern',
        'forestfloor',
        'inkwell',
        'path',
        'sunset')
    );
}
add_action( 'after_setup_theme', 'yourchildtheme_remove_twenty_ten_headers', 11 );
	
if ( ! function_exists( 'skeleton_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Skeleton 1.0
 */
function skeleton_posted_on() {
	printf( __( '<span class="%1$s">Inlaggt den</span> %2$s <span class="meta-sep">by</span> %3$s', 'skeleton' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'Visa all a poster av %s', 'skeleton' ), get_the_author() ),
			get_the_author()
		)
	);
}

endif;	

if ( ! function_exists( 'skeleton_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Skeleton 1.0
 */
function skeleton_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'Detta inlägg skrevs i %1$s & med etiketter %2$s. Lägg till <a href="%3$s" title="Permalink to %4$s" rel="bookmark">länken</a> som favorit.', 'skeleton' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'Detta inlägg skrevs i %1$s & med etiketter %2$s. Lägg till <a href="%3$s" title="Permalink to %4$s" rel="bookmark">länken</a> som favorit.', 'skeleton' );
	} else {
		$posted_in = __( 'Lägg till <a href="%3$s" title="Permalink to %4$s" rel="bookmark">länken</a> som favorit.', 'skeleton' );
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

endif;


function oddeven_post_class ( $classes ) {
   global $current_class;
   $classes[] = $current_class;
   $current_class = ($current_class == 'odd') ? 'even' : 'odd';
   return $classes;
}
add_filter ( 'post_class' , 'oddeven_post_class' );
global $current_class;
$current_class = 'odd';


// include Admin Files
locate_template('/includes/admin/theme-settings.php', true);
locate_template('/includes/admin/theme-functions.php', true);
locate_template('/includes/admin/theme-admin.php', true);

// include Plugin Files
locate_template('/includes/plugins/theme_ads_widget.php', true);

// Custom searchform
function my_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Sök på den här webbplatsen') .'" />
    </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'my_search_form' );

// adding custom fields to WP user profile
function custom_fields_profiles( $contactmethods ) {
    unset($contactmethods['aim']);
  	unset($contactmethods['jabber']);
  	unset($contactmethods['yim']);
  
    // Add Adress
    $contactmethods['hem_adress'] = 'Hem adress';
    $contactmethods['hem_postnr'] = 'Postnr';
    $contactmethods['hem_postadress'] = 'Ort';
    $contactmethods['mobile'] = 'Mobilnr';
    // Add Twitter
    $contactmethods['twitter'] = 'Twitter ID';
    //add Facebook
    $contactmethods['facebook'] = 'Facebook Profile URL';
 	
    return $contactmethods;
    }
    add_filter('user_contactmethods','custom_fields_profiles',10,1);
// end of adding custom fields to WP user profile
