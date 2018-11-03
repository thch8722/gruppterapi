<?php
/**
 * The template for displaying Social Icons
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


if ( ! function_exists( 'gridalicious_get_social_icons' ) ) :
/**
 * Generate social icons.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_get_social_icons(){
	if( ( !$output = get_transient( 'gridalicious_social_icons' ) ) ) {
		$output	= '';

		$options 	= gridalicious_get_theme_options(); // Get options

		//Pre defined Social Icons Link Start
		$pre_def_social_icons 	=	gridalicious_get_social_icons_list();

		foreach ( $pre_def_social_icons as $key => $item ) {
			if( isset( $options[ $key ] ) && '' != $options[ $key ] ) {
				$value = $options[ $key ];

				if ( 'email_link' == $key  ) {
					$output .= '<a class="genericon_parent genericon genericon-'. sanitize_key( $item['genericon_class'] ) .'" target="_blank" title="'. esc_attr__( 'Email', 'gridalicious') . '" href="mailto:'. antispambot( sanitize_email( $value ) ) .'"><span class="screen-reader-text">'. __( 'Email', 'gridalicious') . '</span> </a>';
				}
				else if ( 'skype_link' == $key  ) {
					$output .= '<a class="genericon_parent genericon genericon-'. sanitize_key( $item['genericon_class'] ) .'" target="_blank" title="'. esc_attr( $item['label'] ) . '" href="'. esc_attr( $value ) .'"><span class="screen-reader-text">'. esc_attr( $item['label'] ). '</span> </a>';
				}
				else if ( 'phone_link' == $key || 'handset_link' == $key ) {
					$output .= '<a class="genericon_parent genericon genericon-'. sanitize_key( $item['genericon_class'] ) .'" target="_blank" title="'. esc_attr( $item['label'] ) . '" href="tel:' . preg_replace( '/\s+/', '', esc_attr( $value ) ) . '"><span class="screen-reader-text">'. esc_attr( $item['label'] ) . '</span> </a>';
				}
				else {
					$output .= '<a class="genericon_parent genericon genericon-'. sanitize_key( $item['genericon_class'] ) .'" target="_blank" title="'. esc_attr( $item['label'] ) .'" href="'. esc_url( $value ) .'"><span class="screen-reader-text">'. esc_attr( $item['label'] ) .'</span> </a>';
				}
			}
		}
		//Pre defined Social Icons Link End

		//Custom Social Icons Link End
		set_transient( 'gridalicious_social_icons', $output, 86940 );
	}
	return $output;
} // gridalicious_get_social_icons
endif;