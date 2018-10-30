<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
  	<meta name="description" content="" />
  	<meta name="author" content="" />
  	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
  	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
  	<script type="text/javascript" src="scripts/swfobject.js"></script>
  	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  	<script type="text/javascript" src="scripts/funcionalidades.js"></script>
  	<!--[if lt IE 9]>
    	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    	<script src="scripts/innershiv.min.js"></script>
  	<![endif]-->
  	<!--[if IE 6]><script type="text/javascript" src="scripts/DD_belatedPNG_0.0.8a-min.js"></script><![endif]-->
  	<!--[if lt IE 8]><script src="scripts/font.js"></script><![endif]-->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div id="header-wrap">
	<div id="search"><?php get_search_form(); ?></div>
	<div id="kontakt">Kontakta oss via mail på: <a href="mailto:info@gruppterapi.org">info(a)gruppterapi.org</a></div>
	<header>
		<div id="header-logo"></div>
	</header><!-- #header -->
	</div>

	<div id="main">
	