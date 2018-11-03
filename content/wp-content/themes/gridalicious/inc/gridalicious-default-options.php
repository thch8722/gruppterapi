<?php
/**
 * Implement Default Theme/Customizer Options
 *
 * @package Catch Themes
 * @subpackage Gridalicious
 * @since Gridalicious 0.1
 */

if ( ! defined( 'GRIDALICIOUS_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


/**
 * Returns the default options for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_get_default_theme_options() {

	$default_theme_options = array(
		//Site Title an Tagline
		'logo'												=> trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/headers/logo.png',
		'logo_alt_text' 									=> '',
		'logo_disable'										=> 1,
		'move_title_tagline'								=> 0,

		//Layout
		'theme_layout' 										=> 'right-sidebar',
		'content_layout'									=> 'excerpt-image-left',
		'single_post_image_layout'							=> 'featured',

		//Header Image
		'enable_featured_header_image'						=> 'disabled',
		'featured_image_size'								=> 'featured-header',
		'featured_header_image_url'							=> '',
		'featured_header_image_alt'							=> '',
		'featured_header_image_base'						=> 0,

		//Breadcrumb Options
		'breadcumb_option'									=> 0,
		'breadcumb_onhomepage'								=> 0,
		'breadcrumb_seperator'								=> '&raquo;',

		//Custom CSS
		'custom_css'										=> '',

		//Scrollup Options
		'disable_scrollup'									=> 0,

		//Excerpt Options
		'excerpt_length'									=> '40',
		'excerpt_more_text'									=> esc_html__( 'Read More ...', 'gridalicious' ),

		//Homepage / Frontpage Settings
		'front_page_category'								=> '0',

		//Pagination Options
		'pagination_type'									=> 'default',

		//Promotion Headline Options
		'promotion_headline_option'							=> 'homepage',
		'promotion_headline'								=> esc_html__( 'Gridalicious is a Premium Responsive WordPress Theme', 'gridalicious' ),
		'promotion_subheadline'								=> esc_html__( 'This is promotion headline. You can edit this from Appearance -> Customize -> Theme Options -> Promotion Headline Options', 'gridalicious' ),
		'promotion_headline_button'							=> esc_html__( 'Reviews', 'gridalicious' ),
		'promotion_headline_url'							=> esc_url( 'http://wordpress.org/support/view/theme-reviews/gridalicious' ),
		'promotion_headline_target'							=> 1,

		//Search Options
		'search_text'										=> esc_html__( 'Search...', 'gridalicious' ),

		//Basic Color Options
		'color_scheme' 										=> 'light',

		//Featured Content Options
		'featured_content_option'							=> 'homepage',
		'featured_content_layout'							=> 'layout-three',
		//move_posts_home replaced with featured_content_position from version 1.1
		'move_posts_home'									=> 0,
		'featured_content_position'							=> 0,
		'featured_content_headline'							=> '',
		'featured_content_subheadline'						=> '',
		'featured_content_type'								=> 'demo-featured-content',
		'featured_content_number'							=> '3',
		'featured_content_show'								=> 'excerpt',

		//Featured Grid Content Options
		'featured_grid_content_option'						=> 'homepage',
		'featured_grid_content_type'						=> 'demo-featured-grid-content',
		'featured_grid_content_number'						=> '3',

		//Reset all settings
		'reset_all_settings'								=> 0,
	);

	return apply_filters( 'gridalicious_default_theme_options', $default_theme_options );
}


/**
 * Returns an array of color schemes registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_color_schemes() {
	$color_scheme_options = array(
		'light' => esc_html__( 'Light', 'gridalicious' ),
		'dark'  => esc_html__( 'Dark', 'gridalicious' ),
	);

	return apply_filters( 'gridalicious_color_schemes', $color_scheme_options );
}


/**
 * Returns an array of layout options registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_layouts() {
	$layout_options = array(
		'left-sidebar' 	=> esc_html__( 'Primary Sidebar, Content', 'gridalicious' ),
		'right-sidebar' => esc_html__( 'Content, Primary Sidebar', 'gridalicious' ),
		'no-sidebar'	=> esc_html__( 'No Sidebar ( Content Width )', 'gridalicious' ),
	);
	return apply_filters( 'gridalicious_layouts', $layout_options );
}


/**
 * Returns an array of content layout options registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_get_archive_content_layout() {
	$layout_options = array(
		'excerpt-image-left' => esc_html__( 'Show Excerpt (Image Left)', 'gridalicious' ),
		'full-content'       => esc_html__( 'Show Full Content (No Featured Image)', 'gridalicious' ),
	);

	return apply_filters( 'gridalicious_get_archive_content_layout', $layout_options );
}


/**
 * Returns an array of feature header enable options
 *
 * @since Gridalicious 0.1
 */
function gridalicious_enable_featured_header_image_options() {
	$enable_featured_header_image_options = array(
		'homepage'               => esc_html__( 'Homepage / Frontpage', 'gridalicious' ),
		'exclude-home'           => esc_html__( 'Excluding Homepage', 'gridalicious' ),
		'exclude-home-page-post' => esc_html__( 'Excluding Homepage, Page/Post Featured Image', 'gridalicious' ),
		'entire-site'            => esc_html__( 'Entire Site', 'gridalicious' ),
		'entire-site-page-post'  => esc_html__( 'Entire Site, Page/Post Featured Image', 'gridalicious' ),
		'pages-posts'            => esc_html__( 'Pages and Posts', 'gridalicious' ),
		'disabled'               => esc_html__( 'Disabled', 'gridalicious' ),
	);

	return apply_filters( 'gridalicious_enable_featured_header_image_options', $enable_featured_header_image_options );
}


/**
 * Returns an array of feature image size
 *
 * @since Gridalicious 0.1
 */
function gridalicious_featured_image_size_options() {
	$featured_image_size_options = array(
		'featured-header' => esc_html__( 'Featured Header Size', 'gridalicious' ),
		'featured'        => esc_html__( 'Featured Size', 'gridalicious' ),
		'full-size'       => esc_html__( 'Full Size', 'gridalicious' ),
	);

	return apply_filters( 'gridalicious_featured_image_size_options', $featured_image_size_options );
}


/**
 * Returns an array of content and grid content layout options registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_featured_grid_content_options() {
	$featured_grid_content_content_options = array(
		'homepage'    => esc_html__( 'Homepage / Frontpage', 'gridalicious' ),
		'entire-site' => esc_html__( 'Entire Site', 'gridalicious' ),
		'disabled'    => esc_html__( 'Disabled', 'gridalicious' ),
	);

	return apply_filters( 'gridalicious_featured_grid_content_options', $featured_grid_content_content_options );
}



/**
 * Returns an array of feature content types registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_featured_content_types() {
	$featured_content_types = array(
		'demo-featured-content' => esc_html__( 'Demo', 'gridalicious' ),
		'featured-page-content' => esc_html__( 'Page', 'gridalicious' ),
	);

	return apply_filters( 'gridalicious_featured_content_types', $featured_content_types );
}


/**
 * Returns an array of featured content options registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_featured_content_layout_options() {
	$featured_content_layout_option = array(
		'layout-three' => esc_html__( '3 columns', 'gridalicious' ),
		'layout-four'  => esc_html__( '4 columns', 'gridalicious' ),
	);

	return apply_filters( 'gridalicious_featured_content_layout_options', $featured_content_layout_option );
}

/**
 * Returns an array of featured content show registered for gridalicious.
 *
 * @since Gridalicious 1.1
 */
function gridalicious_featured_content_show() {
	$featured_content_show_option = array(
		'excerpt'      => esc_html__( 'Show Excerpt', 'gridalicious' ),
		'full-content' => esc_html__( 'Show Full Content', 'gridalicious' ),
		'hide-content' => esc_html__( 'Hide Content', 'gridalicious' ),
	);

	return apply_filters( 'gridalicious_featured_content_show', $featured_content_show_option );
}


/**
 * Returns an array of feature grid content types registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_featured_grid_content_types() {
	$featured_grid_content_types = array(
		'demo-featured-grid-content' => esc_html__( 'Demo', 'gridalicious' ),
		'featured-page-grid-content' => esc_html__( 'Page', 'gridalicious' ),
	);

	return apply_filters( 'gridalicious_featured_grid_content_types', $featured_grid_content_types );
}


/**
 * Returns an array of color schemes registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_get_pagination_types() {
	$pagination_types = array(
		'default'                => esc_html__( 'Default(Older Posts/Newer Posts)', 'gridalicious' ),
		'numeric'                => esc_html__( 'Numeric', 'gridalicious' ),
		'infinite-scroll-click'  => esc_html__( 'Infinite Scroll (Click)', 'gridalicious' ),
		'infinite-scroll-scroll' => esc_html__( 'Infinite Scroll (Scroll)', 'gridalicious' ),
	);

	return apply_filters( 'gridalicious_get_pagination_types', $pagination_types );
}


/**
 * Returns an array of content featured image size.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_single_post_image_layout_options() {
	$single_post_image_layout_options = array(
		'featured'  => esc_html__( 'Featured', 'gridalicious' ),
		'full-size' => esc_html__( 'Full Size', 'gridalicious' ),
		'disabled'  => esc_html__( 'Disabled', 'gridalicious' ),
	);
	return apply_filters( 'gridalicious_single_post_image_layout_options', $single_post_image_layout_options );
}


/**
 * Returns list of social icons currently supported
 *
 * @since Gridalicious 0.1
*/
function gridalicious_get_social_icons_list() {
	$gridalicious_social_icons_list = array(
		'facebook_link'		=> array(
			'genericon_class' 	=> 'facebook-alt',
			'label' 			=> esc_html__( 'Facebook', 'gridalicious' )
			),
		'twitter_link'		=> array(
			'genericon_class' 	=> 'twitter',
			'label' 			=> esc_html__( 'Twitter', 'gridalicious' )
			),
		'googleplus_link'	=> array(
			'genericon_class' 	=> 'googleplus-alt',
			'label' 			=> esc_html__( 'Googleplus', 'gridalicious' )
			),
		'email_link'		=> array(
			'genericon_class' 	=> 'mail',
			'label' 			=> esc_html__( 'Email', 'gridalicious' )
			),
		'feed_link'			=> array(
			'genericon_class' 	=> 'feed',
			'label' 			=> esc_html__( 'Feed', 'gridalicious' )
			),
		'wordpress_link'	=> array(
			'genericon_class' 	=> 'wordpress',
			'label' 			=> esc_html__( 'WordPress', 'gridalicious' )
			),
		'github_link'		=> array(
			'genericon_class' 	=> 'github',
			'label' 			=> esc_html__( 'GitHub', 'gridalicious' )
			),
		'linkedin_link'		=> array(
			'genericon_class' 	=> 'linkedin',
			'label' 			=> esc_html__( 'LinkedIn', 'gridalicious' )
			),
		'pinterest_link'	=> array(
			'genericon_class' 	=> 'pinterest',
			'label' 			=> esc_html__( 'Pinterest', 'gridalicious' )
			),
		'flickr_link'		=> array(
			'genericon_class' 	=> 'flickr',
			'label' 			=> esc_html__( 'Flickr', 'gridalicious' )
			),
		'vimeo_link'		=> array(
			'genericon_class' 	=> 'vimeo',
			'label' 			=> esc_html__( 'Vimeo', 'gridalicious' )
			),
		'youtube_link'		=> array(
			'genericon_class' 	=> 'youtube',
			'label' 			=> esc_html__( 'YouTube', 'gridalicious' )
			),
		'tumblr_link'		=> array(
			'genericon_class' 	=> 'tumblr',
			'label' 			=> esc_html__( 'Tumblr', 'gridalicious' )
			),
		'instagram_link'	=> array(
			'genericon_class' 	=> 'instagram',
			'label' 			=> esc_html__( 'Instagram', 'gridalicious' )
			),
		'polldaddy_link'	=> array(
			'genericon_class' 	=> 'polldaddy',
			'label' 			=> esc_html__( 'PollDaddy', 'gridalicious' )
			),
		'codepen_link'		=> array(
			'genericon_class' 	=> 'codepen',
			'label' 			=> esc_html__( 'CodePen', 'gridalicious' )
			),
		'path_link'			=> array(
			'genericon_class' 	=> 'path',
			'label' 			=> esc_html__( 'Path', 'gridalicious' )
			),
		'dribbble_link'		=> array(
			'genericon_class' 	=> 'dribbble',
			'label' 			=> esc_html__( 'Dribbble', 'gridalicious' )
			),
		'skype_link'		=> array(
			'genericon_class' 	=> 'skype',
			'label' 			=> esc_html__( 'Skype', 'gridalicious' )
			),
		'digg_link'			=> array(
			'genericon_class' 	=> 'digg',
			'label' 			=> esc_html__( 'Digg', 'gridalicious' )
			),
		'reddit_link'		=> array(
			'genericon_class' 	=> 'reddit',
			'label' 			=> esc_html__( 'Reddit', 'gridalicious' )
			),
		'stumbleupon_link'	=> array(
			'genericon_class' 	=> 'stumbleupon',
			'label' 			=> esc_html__( 'Stumbleupon', 'gridalicious' )
			),
		'pocket_link'		=> array(
			'genericon_class' 	=> 'pocket',
			'label' 			=> esc_html__( 'Pocket', 'gridalicious' ),
			),
		'dropbox_link'		=> array(
			'genericon_class' 	=> 'dropbox',
			'label' 			=> esc_html__( 'DropBox', 'gridalicious' ),
			),
		'spotify_link'		=> array(
			'genericon_class' 	=> 'spotify',
			'label' 			=> esc_html__( 'Spotify', 'gridalicious' ),
			),
		'foursquare_link'	=> array(
			'genericon_class' 	=> 'foursquare',
			'label' 			=> esc_html__( 'Foursquare', 'gridalicious' ),
			),
		'twitch_link'		=> array(
			'genericon_class' 	=> 'twitch',
			'label' 			=> esc_html__( 'Twitch', 'gridalicious' ),
			),
		'website_link'		=> array(
			'genericon_class' 	=> 'website',
			'label' 			=> esc_html__( 'Website', 'gridalicious' ),
			),
		'phone_link'		=> array(
			'genericon_class' 	=> 'phone',
			'label' 			=> esc_html__( 'Phone', 'gridalicious' ),
			),
		'handset_link'		=> array(
			'genericon_class' 	=> 'handset',
			'label' 			=> esc_html__( 'Handset', 'gridalicious' ),
			),
		'cart_link'			=> array(
			'genericon_class' 	=> 'cart',
			'label' 			=> esc_html__( 'Cart', 'gridalicious' ),
			),
		'cloud_link'		=> array(
			'genericon_class' 	=> 'cloud',
			'label' 			=> esc_html__( 'Cloud', 'gridalicious' ),
			),
		'link_link'		=> array(
			'genericon_class' 	=> 'link',
			'label' 			=> esc_html__( 'Link', 'gridalicious' ),
			),
	);

	return apply_filters( 'gridalicious_social_icons_list', $gridalicious_social_icons_list );
}


/**
 * Returns an array of metabox layout options registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_metabox_layouts() {
	$layout_options = array(
		'default' 	=> array(
			'id' 	=> 'gridalicious-layout-option',
			'value' => 'default',
			'label' => esc_html__( 'Default', 'gridalicious' ),
		),
		'left-sidebar' 	=> array(
			'id' 	=> 'gridalicious-layout-option',
			'value' => 'left-sidebar',
			'label' => esc_html__( 'Primary Sidebar, Content', 'gridalicious' ),
		),
		'right-sidebar' => array(
			'id' 	=> 'gridalicious-layout-option',
			'value' => 'right-sidebar',
			'label' => esc_html__( 'Content, Primary Sidebar', 'gridalicious' ),
		),
		'no-sidebar'	=> array(
			'id' 	=> 'gridalicious-layout-option',
			'value' => 'no-sidebar',
			'label' => esc_html__( 'No Sidebar ( Content Width )', 'gridalicious' ),
		),
	);
	return apply_filters( 'gridalicious_layouts', $layout_options );
}

/**
 * Returns an array of metabox header featured image options registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_metabox_header_featured_image_options() {
	$header_featured_image_options = array(
		'default' => array(
			'id'		=> 'gridalicious-header-image',
			'value' 	=> 'default',
			'label' 	=> esc_html__( 'Default', 'gridalicious' ),
		),
		'enable' => array(
			'id'		=> 'gridalicious-header-image',
			'value' 	=> 'enable',
			'label' 	=> esc_html__( 'Enable', 'gridalicious' ),
		),
		'disable' => array(
			'id'		=> 'gridalicious-header-image',
			'value' 	=> 'disable',
			'label' 	=> esc_html__( 'Disable', 'gridalicious' )
		)
	);
	return apply_filters( 'header_featured_image_options', $header_featured_image_options );
}


/**
 * Returns an array of metabox featured image options registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_metabox_featured_image_options() {
	$featured_image_options = array(
		'default' => array(
			'id'		=> 'gridalicious-featured-image',
			'value' 	=> 'default',
			'label' 	=> esc_html__( 'Default', 'gridalicious' ),
		),
		'featured' => array(
			'id'		=> 'gridalicious-featured-image',
			'value' 	=> 'featured',
			'label' 	=> esc_html__( 'Featured Image', 'gridalicious' )
		),
		'full' => array(
			'id' => 'gridalicious-featured-image',
			'value' => 'full',
			'label' => esc_html__( 'Full Size', 'gridalicious' )
		),
		'disable' => array(
			'id' => 'gridalicious-featured-image',
			'value' => 'disable',
			'label' => esc_html__( 'Disable Image', 'gridalicious' )
		)
	);
	return apply_filters( 'featured_image_options', $featured_image_options );
}


/**
 * Returns gridalicious_contents registered for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_get_content() {
	$theme_data = wp_get_theme();

	$gridalicious_content['left'] 	= sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved. %3$s', '1: Year, 2: Site Title with home URL 3: Privacy Policy Link', 'gridalicious' ), esc_attr( date_i18n( esc_html__( 'Y', 'gridalicious' ) ) ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>', get_the_privacy_policy_link() );

	$gridalicious_content['right']	= esc_attr( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'gridalicious' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_attr( $theme_data->get( 'Author' ) ) .'</a>';

	return apply_filters( 'gridalicious_get_content', $gridalicious_content );
}
