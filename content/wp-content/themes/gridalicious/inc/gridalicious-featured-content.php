<?php
/**
 * The template for displaying the Featured Content
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


if( !function_exists( 'gridalicious_featured_content_display' ) ) :
/**
* Add Featured content.
*
* @uses action hook gridalicious_before_content.
*
* @since Gridalicious 0.1
*/
function gridalicious_featured_content_display() {
	//gridalicious_flush_transients();

	global $post, $wp_query;

	// get data value from options
	$options 		= gridalicious_get_theme_options();
	$enablecontent 	= $options['featured_content_option'];
	$contentselect 	= $options['featured_content_type'];

	// Front page displays in Reading Settings
	$page_on_front 	= get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');


	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	if ( 'entire-site' == $enablecontent  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enablecontent  ) ) {
		if( ( !$gridalicious_featured_content = get_transient( 'gridalicious_featured_content_display' ) ) ) {
			$layouts 	 = $options['featured_content_layout'];
			$headline 	 = $options['featured_content_headline'];
			$subheadline = $options['featured_content_subheadline'];

			echo '<!-- refreshing cache -->';

			if ( !empty( $layouts ) ) {
				$classes = $layouts ;
			}

			if( 'demo-featured-content' == $contentselect  ) {
				$classes 		.= ' demo-featured-content' ;
				$headline 		= __( 'Featured Content', 'gridalicious' );
				$subheadline 	= __( 'Here you can showcase the x number of Featured Content. You can edit this Headline, Subheadline and Feaured Content from "Appearance -> Customize -> Featured Content Options".', 'gridalicious' );
			}
			elseif ( 'featured-page-content' == $contentselect  ) {
				$classes .= ' featured-page-content' ;
			}

			//Check Featured Content Position
			if ( isset( $options['featured_content_position'] ) ) {
				$featured_content_position = $options['featured_content_position'];
			}
			// Providing Backward Compatible with Version 1.0
			else {
				$featured_content_position =  $options['move_posts_home'];
			}

			if ( '1' == $featured_content_position ) {
				$classes .= ' border-top' ;
			}

			$gridalicious_featured_content ='
				<section id="featured-content" class="' . $classes . '">
					<div class="wrapper">';
						if ( !empty( $headline ) || !empty( $subheadline ) ) {
							$gridalicious_featured_content .='<div class="featured-heading-wrap">';
								if ( !empty( $headline ) ) {
									$gridalicious_featured_content .='<h1 id="featured-heading" class="entry-title">' . wp_kses_post( $headline ) . '</h1>';
								}
								if ( !empty( $subheadline ) ) {
									$gridalicious_featured_content .='<p>' . wp_kses_post( $subheadline ) . '</p>';
								}
							$gridalicious_featured_content .='</div><!-- .featured-heading-wrap -->';
						}
						$gridalicious_featured_content .='
						<div class="featured-content-wrap">';

							// Select content
							if ( 'demo-featured-content' == $contentselect   && function_exists( 'gridalicious_demo_content' ) ) {
								$gridalicious_featured_content .= gridalicious_demo_content( $options );
							}
							elseif ( 'featured-page-content' == $contentselect  && function_exists( 'gridalicious_page_content' ) ) {
								$gridalicious_featured_content .= gridalicious_page_content( $options );
							}

			$gridalicious_featured_content .='
						</div><!-- .featured-content-wrap -->
					</div><!-- .wrapper -->
				</section><!-- #featured-content -->';
		set_transient( 'gridalicious_featured_content', $gridalicious_featured_content, 86940 );
		}
	echo $gridalicious_featured_content;
	}
}
endif;


if ( ! function_exists( 'gridalicious_featured_content_display_position' ) ) :
/**
 * Homepage Featured Content Position
 *
 * @action gridalicious_content, gridalicious_after_secondary
 *
 * @since Gridalicious 0.1
 */
function gridalicious_featured_content_display_position() {
	// Getting data from Theme Options
	$options 		= gridalicious_get_theme_options();

	//Check Featured Content Position
	if ( isset( $options['featured_content_position'] ) ) {
		$featured_content_position = $options['featured_content_position'];
	}
	// Providing Backward Compatible with Version 1.0
	else {
		$featured_content_position =  $options['move_posts_home'];
	}

	if ( '1' != $featured_content_position ) {
		add_action( 'gridalicious_before_content', 'gridalicious_featured_content_display', 40 );
	} else {
		add_action( 'gridalicious_after_content', 'gridalicious_featured_content_display', 40 );
	}

}
endif; // gridalicious_featured_content_display_position
add_action( 'gridalicious_before', 'gridalicious_featured_content_display_position' );


if ( ! function_exists( 'gridalicious_demo_content' ) ) :
/**
 * This function to display featured posts content
 *
 * @get the data value from customizer options
 *
 * @since Gridalicious 0.1
 *
 */
function gridalicious_demo_content( $options ) {
	$gridalicious_demo_content = '
		<article id="featured-post-1" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Central Park" class="wp-post-image" src="'.trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/featured1-400x225.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						Central Park
					</h1>
				</header>
				<div class="entry-content">
					Central Park is is the most visited urban park in the United States as well as one of the most filmed locations in the world. It was opened in 1857 and is expanded in 843 acres of city-owned land.
				</div>
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-2" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Antique Clock" class="wp-post-image" src="'.trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/featured2-400x225.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						Antique Clock
					</h1>
				</header>
				<div class="entry-content">
					Antique clocks increase in value with the rarity of the design, their condition, and appeal in the market place. Many different materials were used in antique clocks.
				</div>
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-3" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Vespa Scooter" class="wp-post-image" src="'.trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/featured3-400x225.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						Vespa Scooter
					</h1>
				</header>
				<div class="entry-content">
					The Vespa has evolved from a single model motor scooter manufactured in 1946 by Piaggio & Co. S.p.A. of Pontedera, Italy-to a full line of scooters, today owned by Piaggio.
				</div>
			</div><!-- .entry-container -->
		</article>';

	if( 'layout-four' == $options['featured_content_layout']) {
		$gridalicious_demo_content .= '
		<article id="featured-post-4" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img alt="Dhulikhel" class="wp-post-image" src="'.trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/featured4-400x225.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h1 class="entry-title">
						Dhulikhel
					</h1>
				</header>
				<div class="entry-content">
					Dhulikhel is a popular place to observe the high Himalaya - A Tourist Paradise: The spectacular snowfed mountains seen from Dhuklikhel must be one of the finest panoramic views in the world.
				</div>
			</div><!-- .entry-container -->
		</article>';
	}

	return $gridalicious_demo_content;
}
endif; // gridalicious_demo_content


if ( ! function_exists( 'gridalicious_page_content' ) ) :
/**
 * This function to display featured page content
 *
 * @param $options: gridalicious_theme_options from customizer
 *
 * @since Gridalicious 0.1
 */
function gridalicious_page_content( $options ) {
	global $post;

	$quantity 					= $options['featured_content_number'];

	$more_link_text				= $options['excerpt_more_text'];

	$show_content				= isset( $options['featured_content_show'] ) ? $options['featured_content_show'] : 'excerpt';

	$output 	= '';

   	$number_of_page 			= 0; 		// for number of pages

	$page_list					= array();	// list of valid pages ids

	//Get valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if( isset ( $options['featured_content_page_' . $i] ) && $options['featured_content_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	array_merge( $page_list, array( $options['featured_content_page_' . $i] ) );
		}

	}
	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$loop = new WP_Query( array(
                    'posts_per_page' 		=> $number_of_page,
                    'post__in'       		=> $page_list,
                    'orderby'        		=> 'post__in',
                    'post_type'				=> 'page',
                ));

		$i=0;
		while ( $loop->have_posts()) : $loop->the_post(); $i++;
			$title_attribute = the_title_attribute( 'echo=0' );

			$excerpt = get_the_excerpt();

			$output .= '
				<article id="featured-post-' . $i . '" class="post hentry featured-page-content">';
				if ( has_post_thumbnail() ) {
					$output .= '
					<figure class="featured-homepage-image">
						<a href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute( array( 'before' => __( 'Permalink to:', 'gridalicious' ), 'echo' => false ) ) . '">
						'. get_the_post_thumbnail( $post->ID, 'medium', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class' => 'pngfix' ) ) .'
						</a>
					</figure>';
				}
				else {
					$gridalicious_first_image = gridalicious_get_first_image( $post->ID, 'medium', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class' => 'pngfix' ) );

					if ( '' != $gridalicious_first_image ) {
						$output .= '
						<figure class="featured-homepage-image">
							<a href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute( array( 'before' => __( 'Permalink to:', 'gridalicious' ), 'echo' => false ) ) . '">
								'. $gridalicious_first_image .'
							</a>
						</figure>';
					}
				}
				$output .= '
					<div class="entry-container">
						<header class="entry-header">
							<h1 class="entry-title">
								<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . the_title( '','', false ) . '</a>
							</h1>
						</header>';
						if ( 'excerpt' == $show_content ) {
							$output .= '<div class="entry-excerpt"><p>' . $excerpt . '</p></div><!-- .entry-excerpt -->';
						}
						elseif ( 'full-content' == $show_content ) {
							$content = apply_filters( 'the_content', get_the_content() );
							$content = str_replace( ']]>', ']]&gt;', $content );
							$output .= '<div class="entry-content">' . wp_kses_post( $content ) . '</div><!-- .entry-content -->';
						}
						$output .= '
					</div><!-- .entry-container -->
				</article><!-- .featured-post-'. $i .' -->';
		endwhile;

		wp_reset_postdata();
	}

	return $output;
}
endif; // gridalicious_page_content
