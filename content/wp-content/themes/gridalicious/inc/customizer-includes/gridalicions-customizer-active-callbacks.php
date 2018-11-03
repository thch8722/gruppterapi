<?php
/**
 * Active callbacks for Theme/Customzer Options
 *
 * @package Catch Themes
 * @subpackage Full Frame
 * @since Full Frame 1.9
 */

if ( ! defined( 'GRIDALICIOUS_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

if( ! function_exists( 'gridalicious_is_grid_content_active' ) ) :
	/**
	* Return true if grid_content is active
	*
	* @since  Full Frame 1.9
	*/
	function gridalicious_is_grid_content_active( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable = $control->manager->get_setting( 'gridalicious_theme_options[featured_grid_content_option]' )->value();

		//return true only if previwed page on customizer matches the type of grid_content option selected
		return ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) );
	}
endif;


if( ! function_exists( 'gridalicious_is_demo_grid_content_inactive' ) ) :
	/**
	* Return true if demo grid_content is inactive
	*
	* @since  Full Frame 1.9
	*/
	function gridalicious_is_demo_grid_content_inactive( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable	= $control->manager->get_setting( 'gridalicious_theme_options[featured_grid_content_option]' )->value();

		$type 	= $control->manager->get_setting( 'gridalicious_theme_options[featured_grid_content_type]' )->value();

		//return true only if previwed page on customizer matches the type of grid_content option selected and is not demo grid_content
		return ( ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) ) && !( 'demo-featured-grid_content' == $type ) );
	}
endif;


if( ! function_exists( 'gridalicious_is_featured_content_active' ) ) :
	/**
	* Return true if featured content is active
	*
	* @since  Full Frame 1.9
	*/
	function gridalicious_is_featured_content_active( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable = $control->manager->get_setting( 'gridalicious_theme_options[featured_content_option]' )->value();

		//return true only if previwed page on customizer matches the type of content option selected
		return ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) );
	}
endif;


if( ! function_exists( 'gridalicious_is_demo_featured_content_inactive' ) ) :
	/**
	* Return true if demo featured content is inactive
	*
	* @since  Full Frame 1.9
	*/
	function gridalicious_is_demo_featured_content_inactive( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable 	= $control->manager->get_setting( 'gridalicious_theme_options[featured_content_option]' )->value();

		$type 	= $control->manager->get_setting( 'gridalicious_theme_options[featured_content_type]' )->value();

		//return true only if previwed page on customizer matches the type of content option selected and is not demo content
		return ( ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable  ) ) && !( 'demo-featured-content' == $type ) );
	}
endif;