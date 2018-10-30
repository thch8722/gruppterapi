<?php
/**
* Skeleton WordPress Theme Framework
* Author: Simple Themes
* URL: www.simplethemes.com
 * The template for displaying 404 pages (Not Found).
 *
 * @package Skeleton WordPress Theme Framework
 * @subpackage skeleton
 * @author Simple Themes - www.simplethemes.com
 */
 
get_header(); ?>

	<div id="container">
		<div id="content" role="main">

			<div id="post-0" class="post error404 not-found">
				<h1 class="entry-title"><?php _e( 'Opps!', 'skeleton' ); ?></h1>
				<div class="entry-content">
					<p><?php _e( 'Vi ber om ursäkt, men sidan du försöker nå kan inte hittas. Prova att söka efter den kanske hjälper.', 'skeleton' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</div><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #container -->
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<?php get_footer(); ?>