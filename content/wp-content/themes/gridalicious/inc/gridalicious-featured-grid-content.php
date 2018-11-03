<?php
/**
 * The template for displaying the Grid Content
 *
 * @package Catch Themes
 * @subpackage Gridalicious Pro
 * @since Gridalicious 0.1
 */

if ( ! defined( 'GRIDALICIOUS_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


if( !function_exists( 'gridalicious_featured_grid_content' ) ) :
/**
 * Add grid_content.
 *
 * @uses action hook gridalicious_before_content.
 *
 * @since Gridalicious 0.1
 */
function gridalicious_featured_grid_content() {
	global $post, $wp_query;
	//gridalicious_flush_transients();
	// get data value from options
	$options 		= gridalicious_get_theme_options();
	$enablegrid_content 	= $options['featured_grid_content_option'];
	$grid_contentselect 	= $options['featured_grid_content_type'];

	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();

	// Front page displays in Reading Settings
	$page_on_front = get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');

	if ( 'entire-site' == $enablegrid_content  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enablegrid_content  ) ) {
		if( ( !$gridalicious_featured_grid_content = get_transient( 'gridalicious_featured_grid_content' ) ) ) {
			echo '<!-- refreshing cache -->';

			$gridalicious_featured_grid_content = '
				<section id="featured-grid-content" class="'. $grid_contentselect .'">
					<div class="wrapper">';

							// Select Grid Content
							if ( 'demo-featured-grid-content' == $grid_contentselect  && function_exists( 'gridalicious_demo_grid_content' ) ) {
								$gridalicious_featured_grid_content .=  gridalicious_demo_grid_content();
							}
							elseif ( 'featured-page-grid-content' == $grid_contentselect  && function_exists( 'gridalicious_page_grid_content' ) ) {
								$gridalicious_featured_grid_content .=  gridalicious_page_grid_content( $options );
							}

			$gridalicious_featured_grid_content .= '
					</div><!-- .wrapper -->
				</section><!-- #feature-grid-content -->';

			set_transient( 'gridalicious_featured_grid_content', $gridalicious_featured_grid_content, 86940 );
		}
		echo $gridalicious_featured_grid_content;
	}
}
endif;
add_action( 'gridalicious_before_content', 'gridalicious_featured_grid_content', 10 );


if ( ! function_exists( 'gridalicious_demo_grid_content' ) ) :
/**
 * This function to display featured demo grid_content
 *
 * @since Gridalicious 0.1
 *
 */
function gridalicious_demo_grid_content() {
	$gridalicious_demo_grid_content ='
								<a class="grid-box first" title="Grid Content Image 1" href="'. esc_url( home_url( '/' ) ) .'">
									<img src="' . trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/grid-800x450.jpg" class="wp-post-image" alt="Grid Content Image 1" title="Grid Content Image 1">
									<div class="caption">
										<span class="vcenter">
											<span class="entry-title">
												Grid Content Image 1
											</span>
											<span class="more">
												Read More ...
											</span>
										</span><!-- .vcenter -->
									</div><!-- .caption -->
								</a><!-- .grid-box -->

								<a class="grid-box" title="Grid Content Image 2" href="'. esc_url( home_url( '/' ) ) .'">
									<img src="' . trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/grid-800x450-2.jpg" class="wp-post-image" alt="Grid Content Image 2" title="Grid Content Image 2">
									<div class="caption">
										<span class="vcenter">
											<span class="entry-title">
												Grid Content Image 2
											</span>
											<span class="more">
												Read More ...
											</span>
										</span><!-- .vcenter -->
									</div><!-- .caption -->
								</a><!-- .grid-box -->

								<a class="grid-box" title="Grid Content Image 3" href="'. esc_url( home_url( '/' ) ) .'">
									<img src="' . trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/grid-800x450-3.jpg" class="wp-post-image" alt="Grid Content Image 3" title="Grid Content Image 3">
									<div class="caption">
										<span class="vcenter">
											<span class="entry-title">
												Grid Content Image 3
											</span>
											<span class="more">
												Read More ...
											</span>
										</span><!-- .vcenter -->
									</div><!-- .caption -->
								</a><!-- .grid-box -->';
	return $gridalicious_demo_grid_content;
}
endif; // gridalicious_demo_grid_content


if ( ! function_exists( 'gridalicious_page_grid_content' ) ) :
/**
 * This function to display featured page grid_content
 *
 * @param $options: gridalicious_theme_options from customizer
 *
 * @since Gridalicious 0.1
 */
function gridalicious_page_grid_content( $options ) {
	$quantity		= $options['featured_grid_content_number'];

	global $post;

    $gridalicious_page_grid_content = '';
    $number_of_page 		= 0; 		// for number of pages
	$page_list				= array();	// list of valid page ids

	//Get number of valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if( isset ( $options['featured_grid_content_page_' . $i] ) && $options['featured_grid_content_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	array_merge( $page_list, array( $options['featured_grid_content_page_' . $i] ) );
		}

	}

	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$loop = new WP_Query( array(
			'posts_per_page'	=> $quantity,
			'post_type'			=> 'page',
			'post__in'			=> $page_list,
			'orderby' 			=> 'post__in'
		));

		$i=1;

		while ( $loop->have_posts() ) {

			$loop->the_post();

			$title_attribute = the_title_attribute( 'echo=0' );

			$classes = 'page pageid-' . $post->ID;

			if ( 1 == $i ) {
				$classes .= ' first';
			}
			else if ( 1 == $i%3 ) {
				$classes .= ' first-cols';
			}

			$gridalicious_page_grid_content .=
			'<a class="grid-box '. $classes .'" title="' . the_title_attribute( array( 'before' => __( 'Permalink to:', 'gridalicious' ), 'echo' => false ) ) . '" href="' . esc_url( get_permalink() ) . '">';

			if ( has_post_thumbnail() ) {
				$gridalicious_page_grid_content .= get_the_post_thumbnail( $post->ID, 'gridalicious-featured-grid', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class'	=> 'pngfix' ) );
			}
			else {
				//Default value if there is no first image
				$gridalicious_image =
					'<img class="no-image pngfix" src="'.esc_url( get_template_directory_uri() ).'/images/gallery/no-featured-image-1200x514.jpg" />';

				//Get the first image in page, returns false if there is no image
				$gridalicious_first_image = gridalicious_get_first_image( $post->ID, 'medium', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class' => 'pngfix' ) );

				//Set value of image as first image if there is an image present in the post
				if ( '' != $gridalicious_first_image ) {
					$gridalicious_image =	$gridalicious_first_image;
				}

				$gridalicious_page_grid_content .= $gridalicious_image;
			}

			$gridalicious_page_grid_content .= '
				<div class="caption">
					<span class="vcenter">
						<span class="entry-title">
							' . the_title('', '', false) . '
						</span>
						<span class="more">';

						$gridalicious_page_grid_content .=  $options['excerpt_more_text'];

				$gridalicious_page_grid_content .= '
						</span><!-- .more -->
					</span><!-- .vcenter -->
				</div><!-- .caption -->
			</a><!-- .grid-box -->';

			$i++;
		}

		wp_reset_postdata();
	}

	return $gridalicious_page_grid_content;
}
endif; // gridalicious_page_grid_content
