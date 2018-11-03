<?php
/**
 * The template for Social Links in Customizer
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

	// Social Icons
	$wp_customize->add_panel( 'gridalicious_social_links', array(
	    'capability'     => 'edit_theme_options',
	    'description'	=> __( 'Note: Enter the url for correponding social networking website', 'gridalicious' ),
	    'priority'       => 600,
		'title'    		 => __( 'Social Links', 'gridalicious' ),
	) );

	$wp_customize->add_section( 'gridalicious_social_links', array(
		'panel'			=> 'gridalicious_social_links',
		'priority' 		=> 1,
		'title'   	 	=> __( 'Social Links', 'gridalicious' ),
	) );

	$gridalicious_social_icons 	=	gridalicious_get_social_icons_list();

	foreach ( $gridalicious_social_icons as $key => $value ){
		if( 'skype_link' == $key ){
			$wp_customize->add_setting( 'gridalicious_theme_options['. $key .']', array(
					'capability'		=> 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',
				) );

			$wp_customize->add_control( 'gridalicious_theme_options['. $key .']', array(
				'description'	=> __( 'Skype link can be of formats:<br>callto://+{number}<br> skype:{username}?{action}. More Information in readme file', 'gridalicious' ),
				'label'    		=> $value['label'],
				'section'  		=> 'gridalicious_social_links',
				'settings' 		=> 'gridalicious_theme_options['. $key .']',
				'type'	   		=> 'url',
			) );
		}
		else {
			if( 'email_link' == $key ){
				$wp_customize->add_setting( 'gridalicious_theme_options['. $key .']', array(
						'capability'		=> 'edit_theme_options',
						'sanitize_callback' => 'sanitize_email',
					) );
			}
			else if( 'handset_link' == $key || 'phone_link' == $key ){
				$wp_customize->add_setting( 'gridalicious_theme_options['. $key .']', array(
						'capability'		=> 'edit_theme_options',
						'sanitize_callback' => 'sanitize_text_field',
					) );
			}
			else {
				$wp_customize->add_setting( 'gridalicious_theme_options['. $key .']', array(
						'capability'		=> 'edit_theme_options',
						'sanitize_callback' => 'esc_url_raw',
					) );
			}

			$wp_customize->add_control( 'gridalicious_theme_options['. $key .']', array(
				'label'    => $value['label'],
				'section'  => 'gridalicious_social_links',
				'settings' => 'gridalicious_theme_options['. $key .']',
				'type'	   => 'url',
			) );
		}
	}
	// Social Icons End