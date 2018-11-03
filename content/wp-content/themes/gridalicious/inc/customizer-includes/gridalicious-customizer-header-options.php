<?php
/**
 * The template for adding Additional Header Option in Customizer
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

	// Header Options
	$wp_customize->add_setting( 'gridalicious_theme_options[enable_featured_header_image]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['enable_featured_header_image'],
		'sanitize_callback'	=> 'gridalicious_sanitize_select'
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[enable_featured_header_image]', array(
			'choices'  	=> gridalicious_enable_featured_header_image_options(),
			'label'		=> __( 'Enable Featured Header Image on ', 'gridalicious' ),
			'section'   => 'header_image',
	        'settings'  => 'gridalicious_theme_options[enable_featured_header_image]',
	        'type'	  	=> 'select',
	) );


	$wp_customize->add_setting( 'gridalicious_theme_options[featured_image_size]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_image_size'],
		'sanitize_callback'	=> 'gridalicious_sanitize_select'
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[featured_image_size]', array(
			'choices'  	=> gridalicious_featured_image_size_options(),
			'label'		=> __( 'Page/Post Featured Header Image Size', 'gridalicious' ),
			'section'   => 'header_image',
			'settings'  => 'gridalicious_theme_options[featured_image_size]',
			'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'gridalicious_theme_options[featured_header_image_alt]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_header_image_alt'],
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[featured_header_image_alt]', array(
			'label'		=> __( 'Featured Header Image Alt/Title Tag ', 'gridalicious' ),
			'section'   => 'header_image',
	        'settings'  => 'gridalicious_theme_options[featured_header_image_alt]',
	        'type'	  	=> 'text',
	) );

	$wp_customize->add_setting( 'gridalicious_theme_options[featured_header_image_url]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_header_image_url'],
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[featured_header_image_url]', array(
			'label'		=> __( 'Featured Header Image Link URL', 'gridalicious' ),
			'section'   => 'header_image',
	        'settings'  => 'gridalicious_theme_options[featured_header_image_url]',
	        'type'	  	=> 'text',
	) );

	$wp_customize->add_setting( 'gridalicious_theme_options[featured_header_image_base]', array(
		'capability'		=> 'edit_theme_options',
		'default'	=> $defaults['featured_header_image_url'],
		'sanitize_callback' => 'gridalicious_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[featured_header_image_base]', array(
		'label'    	=> __( 'Check to Open Link in New Window/Tab', 'gridalicious' ),
		'section'  	=> 'header_image',
		'settings' 	=> 'gridalicious_theme_options[featured_header_image_base]',
		'type'     	=> 'checkbox',
	) );
// Header Options End