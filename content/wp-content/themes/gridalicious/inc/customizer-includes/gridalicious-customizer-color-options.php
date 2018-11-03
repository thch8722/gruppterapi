<?php
/**
 * The template for adding color options in Customizer
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
  	//Color Options
  	$wp_customize->add_panel( 'gridalicious_color_options', array(
	    'capability'     => 'edit_theme_options',
	    'description'    => __( 'Color Options', 'gridalicious' ),
	    'priority'       => 300,
	    'title'    		 => __( 'Color Options', 'gridalicious' ),
	) );

	//Basic Color Options
	$wp_customize->add_section( 'gridalicious_color_scheme', array(
		'panel'	   => 'gridalicious_color_options',
		'priority' => 301,
		'title'    => __( 'Basic Color Options', 'gridalicious' ),
	) );

	$wp_customize->add_setting( 'gridalicious_theme_options[color_scheme]', array(
		'capability' 		=> 'edit_theme_options',
		'default'    		=> $defaults['color_scheme'],
		'sanitize_callback'	=> 'gridalicious_sanitize_select'
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[color_scheme]', array(
		'choices'  => gridalicious_color_schemes(),
		'label'    => __( 'Color Scheme', 'gridalicious' ),
		'priority' => 5,
		'section'  => 'gridalicious_color_scheme',
		'settings' => 'gridalicious_theme_options[color_scheme]',
		'type'     => 'radio',
	) );
	//Basic Color Options End