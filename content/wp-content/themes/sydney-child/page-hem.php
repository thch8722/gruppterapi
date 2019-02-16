<!--

Custom start page for page with slug "hem"
-->

<?php

get_header();



?>


<div id="primary" class="content-area col-md-9">
	<main id="main" class="post-wrap hem-head" role="main">

        <h1 class="h1-hem"><?php print_r($wp_query->post->post_title); ?></h1>



			<!-- List latest posts as archive -->
			<div class="posts-layout">
				<?php

					$args = array('posts_per_page' => 3);

					$the_query = new WP_Query( $args );

					// The Loop
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
      						$the_query->the_post();

						    get_template_part( 'content', get_post_format() );
	  						// Do Stuff
						} // end while
					} // endif
					// Reset Post Data
					wp_reset_postdata();

				?>



		</div>
	</main>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>