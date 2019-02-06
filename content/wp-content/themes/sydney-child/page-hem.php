<!--

Custom start page for page with slug "hem"
-->

<?php

get_header();



?>


<div id="primary" class="content-area col-md-9">
	<main id="main" class="post-wrap" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

				<!-- content-page.php -->
                <?php get_template_part( 'content', 'page' ); ?>


            <?php endwhile; // end of the loop. ?>


<!-- List latest posts as archive -->
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




	</main>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>