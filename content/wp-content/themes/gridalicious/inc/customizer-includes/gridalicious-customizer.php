<?php
/**
 * The main template for implementing Theme/Customzer Options
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
 * Implements Gridalicious theme options into Theme Customizer.
 *
 * @param $wp_customize Theme Customizer object
 * @return void
 *
 * @since Gridalicious 0.1
 */
function gridalicious_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport			= 'postMessage';

	/**
	  * Set priority of blogname (Site Title) to 1.
	  *  Strangly, if more than two options is added, Site title is moved below Tagline. This rectifies this issue.
	  */
	$wp_customize->get_control( 'blogname' )->priority			= 1;

	$wp_customize->get_setting( 'blogdescription' )->transport	= 'postMessage';

	$options  = gridalicious_get_theme_options();

	$defaults = gridalicious_get_default_theme_options();

	//Custom Controls
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/gridalicious-customizer-custom-controls.php';

	//@remove Remove this block when WordPress 4.8 is released
	if ( ! function_exists( 'has_custom_logo' ) ) {
		// Custom Logo (added to Site Title and Tagline section in Theme Customizer)
		$wp_customize->add_setting( 'gridalicious_theme_options[logo]', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults['logo'],
			'sanitize_callback'	=> 'gridalicious_sanitize_image'
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
			'label'		=> __( 'Logo', 'gridalicious' ),
			'priority'	=> 100,
			'section'   => 'title_tagline',
	        'settings'  => 'gridalicious_theme_options[logo]',
	    ) ) );

	    $wp_customize->add_setting( 'gridalicious_theme_options[logo_disable]', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults['logo_disable'],
			'sanitize_callback' => 'gridalicious_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'gridalicious_theme_options[logo_disable]', array(
			'label'    => __( 'Check to disable logo', 'gridalicious' ),
			'priority' => 101,
			'section'  => 'title_tagline',
			'settings' => 'gridalicious_theme_options[logo_disable]',
			'type'     => 'checkbox',
		) );

		$wp_customize->add_setting( 'gridalicious_theme_options[logo_alt_text]', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults['logo_alt_text'],
			'sanitize_callback'	=> 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'gridalicious_logo_alt_text', array(
			'label'    	=> __( 'Logo Alt Text', 'gridalicious' ),
			'priority'	=> 102,
			'section' 	=> 'title_tagline',
			'settings' 	=> 'gridalicious_theme_options[logo_alt_text]',
			'type'     	=> 'text',
		) );
	}

	$wp_customize->add_setting( 'gridalicious_theme_options[move_title_tagline]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['move_title_tagline'],
		'sanitize_callback' => 'gridalicious_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[move_title_tagline]', array(
		'label'    => __( 'Check to move Site Title and Tagline before logo', 'gridalicious' ),
		'priority' => function_exists( 'has_custom_logo' ) ? 10 : 103,
		'section'  => 'title_tagline',
		'settings' => 'gridalicious_theme_options[move_title_tagline]',
		'type'     => 'checkbox',
	) );
	// Custom Logo End

	// Color Scheme
	$wp_customize->add_setting( 'gridalicious_theme_options[color_scheme]', array(
		'capability' 		=> 'edit_theme_options',
		'default'    		=> $defaults['color_scheme'],
		'sanitize_callback'	=> 'gridalicious_sanitize_select'
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[color_scheme]', array(
		'choices'  => gridalicious_color_schemes(),
		'label'    => __( 'Color Scheme', 'gridalicious' ),
		'priority' => 5,
		'section'  => 'colors',
		'settings' => 'gridalicious_theme_options[color_scheme]',
		'type'     => 'radio',
	) );
	//End Color Scheme

	// Header Options (added to Header section in Theme Customizer)
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/gridalicious-customizer-header-options.php';

	//Theme Options
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/gridalicious-customizer-theme-options.php';

	//Featured Content Setting
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/gridalicious-customizer-featured-content-setting.php';

	//Featured Grid Content
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/gridalicious-customizer-featured-grid-content.php';

	//Social Links
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/gridalicious-customizer-social-icons.php';

	// Reset all settings to default
	$wp_customize->add_section( 'gridalicious_reset_all_settings', array(
		'description'	=> __( 'Caution: Reset all settings to default. Refresh the page after save to view full effects.', 'gridalicious' ),
		'priority' 		=> 700,
		'title'    		=> __( 'Reset all settings', 'gridalicious' ),
	) );

	$wp_customize->add_setting( 'gridalicious_theme_options[reset_all_settings]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['reset_all_settings'],
		'sanitize_callback' => 'gridalicious_sanitize_checkbox',
		'transport'			=> 'postMessage',
	) );

	$wp_customize->add_control( 'gridalicious_theme_options[reset_all_settings]', array(
		'label'    => __( 'Check to reset all settings to default', 'gridalicious' ),
		'section'  => 'gridalicious_reset_all_settings',
		'settings' => 'gridalicious_theme_options[reset_all_settings]',
		'type'     => 'checkbox',
	) );
	// Reset all settings to default end

	//Important Links
	$wp_customize->add_section( 'important_links', array(
		'priority' 		=> 999,
		'title'   	 	=> __( 'Important Links', 'gridalicious' ),
	) );

	/**
	 * Has dummy Sanitizaition function as it contains no value to be sanitized
	 */
	$wp_customize->add_setting( 'important_links', array(
		'sanitize_callback'	=> 'gridalicious_sanitize_important_link',
	) );

	$wp_customize->add_control( new Gridalicious_Important_Links( $wp_customize, 'important_links', array(
        'label'   	=> __( 'Important Links', 'gridalicious' ),
         'section'  	=> 'important_links',
        'settings' 	=> 'important_links',
        'type'     	=> 'important_links',
    ) ) );
    //Important Links End
}
add_action( 'customize_register', 'gridalicious_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously for gridalicious.
 * And flushes out all transient data on preview
 *
 * @since Gridalicious 0.1
 */
function gridalicious_customize_preview() {
	wp_enqueue_script( 'gridalicious_customizer', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/gridalicious-customizer.min.js', array( 'customize-preview' ), '20120827', true );

	//Flush transients on preview
	gridalicious_flush_transients();
}
add_action( 'customize_preview_init', 'gridalicious_customize_preview' );


/**
 * Custom scripts and styles on customize.php for gridalicious.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_customize_scripts() {
	wp_enqueue_script( 'gridalicious_customizer_custom', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/gridalicious-customizer-custom-scripts.min.js', array( 'jquery' ), '20131028', true );

	$gridalicious_data = array(
		'reset_message'	=> esc_html__( 'Refresh the customizer page after saving to view reset effects', 'gridalicious' )
	);

	wp_localize_script( 'gridalicious_customizer_custom', 'gridalicious_data', $gridalicious_data );
}
add_action( 'customize_controls_enqueue_scripts', 'gridalicious_customize_scripts');


/**
 * Function to reset date with respect to condition
 */
function gridalicious_reset_data() {
	$options  = gridalicious_get_theme_options();
    if( $options['reset_all_settings'] ) {
    	remove_theme_mods();

        // Flush out all transients	on reset
        gridalicious_flush_transients();

        return;
    }
}
add_action( 'customize_save_after', 'gridalicious_reset_data' );

//Active callbacks for customizer
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/gridalicions-customizer-active-callbacks.php';


//Sanitize functions for customizer
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/gridalicions-customizer-sanitize-functions.php';

// Add Upgrade to Pro Button.
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/upgrade-button/class-customize.php';
