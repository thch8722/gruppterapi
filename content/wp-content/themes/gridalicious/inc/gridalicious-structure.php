<?php
/**
 * The template for Managing Theme Structure
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


if ( ! function_exists( 'gridalicious_doctype' ) ) :
	/**
	 * Doctype Declaration
	 *
	 * @since Gridalicious 0.1
	 *
	 */
	function gridalicious_doctype() {
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<?php
	}
endif;
add_action( 'gridalicious_doctype', 'gridalicious_doctype', 10 );


if ( ! function_exists( 'gridalicious_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Gridalicious 0.1
	 *
	 */
	function gridalicious_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
endif;
add_action( 'gridalicious_before_wp_head', 'gridalicious_head', 10 );


if ( ! function_exists( 'gridalicious_doctype_start' ) ) :
	/**
	 * Start div id #page
	 *
	 * @since Gridalicious 0.1
	 *
	 */
	function gridalicious_page_start() {
		?>
		<div id="page" class="hfeed site">
		<?php
	}
endif;
add_action( 'gridalicious_header', 'gridalicious_page_start', 10 );


if ( ! function_exists( 'gridalicious_page_end' ) ) :
	/**
	 * End div id #page
	 *
	 * @since Gridalicious 0.1
	 *
	 */
	function gridalicious_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'gridalicious_footer', 'gridalicious_page_end', 200 );


if ( ! function_exists( 'gridalicious_header_start' ) ) :
	/**
	 * Start Header id #masthead and class .wrapper
	 *
	 * @since Gridalicious 0.1
	 *
	 */
	function gridalicious_header_start() {
		?>
		<header id="masthead" role="banner">
    		<div class="wrapper">
		<?php
	}
endif;
add_action( 'gridalicious_header', 'gridalicious_header_start', 20 );


if ( ! function_exists( 'gridalicious_header_end' ) ) :
	/**
	 * End Header id #masthead and class .wrapper
	 *
	 * @since Gridalicious 0.1
	 *
	 */
	function gridalicious_header_end() {
		?>
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;
add_action( 'gridalicious_header', 'gridalicious_header_end', 100 );


if ( ! function_exists( 'gridalicious_content_start' ) ) :
	/**
	 * Start div id #content and class .wrapper
	 *
	 * @since Gridalicious 0.1
	 *
	 */
	function gridalicious_content_start() {
		?>
		<div id="content" class="site-content">
			<div class="wrapper">
	<?php
	}
endif;
add_action('gridalicious_content', 'gridalicious_content_start', 10 );

if ( ! function_exists( 'gridalicious_content_end' ) ) :
	/**
	 * End div id #content and class .wrapper
	 *
	 * @since Gridalicious 0.1
	 */
	function gridalicious_content_end() {
		?>
			</div><!-- .wrapper -->
	    </div><!-- #content -->
		<?php
	}

endif;
add_action( 'gridalicious_after_content', 'gridalicious_content_end', 30 );


if ( ! function_exists( 'gridalicious_content_sidebar_wrap_start' ) ) :
	/**
	 * Start div id #content_sidebar_wrap
	 *
	 * @since Gridalicious 0.1
	 */
	function gridalicious_content_sidebar_wrap_start() {
		?>
			<div id="content_sidebar_wrap">
		<?php
	}
endif;


if ( ! function_exists( 'gridalicious_content_sidebar_wrap_end' ) ) :
	/**
	 * End div id #content_sidebar_wrap
	 *
	 * @since Gridalicious 0.1
	 */
	function gridalicious_content_sidebar_wrap_end() {
		?>
			</div><!-- #content_sidebar_wrap -->
		<?php
	}
endif;


if ( ! function_exists( 'gridalicious_sidebar_secondary' ) ) :
	/**
	 * Secondary Sidebar
	 *
	 * @since Gridalicious 0.1
	 */
	function gridalicious_sidebar_secondary() {
		get_sidebar( 'secondary' );
	}
endif;


if ( ! function_exists( 'gridalicious_footer_content_start' ) ) :
/**
 * Start footer id #colophon
 *
 * @since Gridalicious 0.1
 */
function gridalicious_footer_content_start() {
	?>
	<footer id="colophon" class="site-footer" role="contentinfo">
    <?php
}
endif;
add_action( 'gridalicious_footer', 'gridalicious_footer_content_start', 30 );


if ( ! function_exists( 'gridalicious_footer_sidebar' ) ) :
/**
 * Footer Sidebar
 *
 * @since Gridalicious 0.1
 */
function gridalicious_footer_sidebar() {
	get_sidebar( 'footer' );
}
endif;
add_action( 'gridalicious_footer', 'gridalicious_footer_sidebar', 40 );


if ( ! function_exists( 'gridalicious_footer_content_end' ) ) :
/**
 * End footer id #colophon
 *
 * @since Gridalicious 0.1
 */
function gridalicious_footer_content_end() {
	?>
	</footer><!-- #colophon -->
	<?php
}
endif;
add_action( 'gridalicious_footer', 'gridalicious_footer_content_end', 110 );


if ( ! function_exists( 'gridalicious_header_right' ) ) :
/**
 * Shows Header Right Social Icon
 *
 * @since Gridalicious 0.1
 */
function gridalicious_header_right() { ?>
	<aside class="sidebar sidebar-header-right widget-area">
		<?php if ( '' != ( $gridalicious_social_icons = gridalicious_get_social_icons() ) ) { ?>
			<section class="widget widget_gridalicious_social_icons" id="header-right-social-icons">
				<div class="widget-wrap">
					<?php echo $gridalicious_social_icons; ?>
				</div><!-- .widget-wrap -->
			</section><!-- #header-right-social-icons -->
		<?php
		} ?>
	</aside><!-- .sidebar .header-sidebar .widget-area -->
<?php
}
endif;
add_action( 'gridalicious_header', 'gridalicious_header_right', 60 );
