<?php
/**
 * The default template for displaying header
 *
 * @package Catch Themes
 * @subpackage Gridalicious
 * @since Gridalicious 0.1 
 */

	/** 
	 * gridalicious_doctype hook
	 *
	 * @hooked gridalicious_doctype -  10
	 *
	 */
	do_action( 'gridalicious_doctype' );?>

<head>
<?php	
	/** 
	 * gridalicious_before_wp_head hook
	 *
	 * @hooked gridalicious_head -  10
	 * 
	 */
	do_action( 'gridalicious_before_wp_head' );

	wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
	/** 
     * gridalicious_before_header hook
     *
     */
    do_action( 'gridalicious_before' );
	
	/** 
	 * gridalicious_header hook
	 *
	 * @hooked gridalicious_page_start -  10
	 * @hooked gridalicious_header_start- 20
	 * @hooked gridalicious_mobile_header_nav_anchor - 30
	 * @hooked gridalicious_mobile_secondary_nav_anchor - 40
	 * @hooked gridalicious_site_branding - 50
	 * @hooked gridalicious_header_right - 60
	 * @hooked gridalicious_header_end - 100
	 * 
	 */
	do_action( 'gridalicious_header' );

	/** 
     * gridalicious_after_header hook
     *
     * @hooked gridalicious_primary_menu - 20
     * @hooked gridalicious_secondary_menu - 30
	 * @hooked gridalicious_featured_overall_image - 40
     * @hooked gridalicious_add_breadcrumb - 50
     */
	do_action( 'gridalicious_after_header' ); 

	/** 
	 * gridalicious_before_content hook
	 *
	 * @hooked gridalicious_grid_content - 10
	 * @hooked gridalicious_promotion_headline - 30
	 * @hooked gridalicious_featured_content_display (move featured content above homepage posts - default option) - 40
	 */
	do_action( 'gridalicious_before_content' );
	
	/** 
     * gridalicious_content hook
     *
     *  @hooked gridalicious_content_start - 10
     *  @hooked gridalicious_add_breadcrumb - 20
     *  @hooked gridalicious_content_sidebar_wrap_start - 40
     *
     */
	do_action( 'gridalicious_content' );	