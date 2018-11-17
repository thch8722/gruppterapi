<?php
/*
 * The default template for displaying pages.
 */
?>

<?php get_header(); ?>
<div id="content">
	<?php while ( have_posts() ) : the_post(); ?>
		<h1 class="page-title"><?php the_title(); ?></h1>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail('single', array('class' => 'single-image')); 
		} ?>

		<?php the_content(); ?>

		<?php wp_link_pages( array(
			'before' => '<div class="pagelink">' . __( 'Pages:', 'onecolumn' ),
			'after'  => '</div>',
		) ); ?>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<?php edit_post_link( __( 'Edit', 'onecolumn' ), '<div class="edit-link">', '</div>' ); ?>
</div>	
<?php get_sidebar(); ?>
<?php get_footer(); ?>