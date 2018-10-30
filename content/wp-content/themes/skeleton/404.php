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

get_header();
st_before_content($columns='');
?>
	<h1><?php _e( 'Opps!', 'skeleton' ); ?></h1>
	<p><?php _e( 'Vi ber om ursäkt, men sidan du försöker nå kan inte hittas. Prova att söka efter den kanske hjälper.', 'skeleton' ); ?></p>
	<?php get_search_form(); ?>
	
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<?php
st_after_content();
get_sidebar();
get_footer();
?>