<?php
/*
 * Because sidebar.php is required it's used for displaying footer widgets.
 */
?>

<?php if ( is_active_sidebar( 'footer-right' ) || is_active_sidebar( 'footer-left' ) ) { ?>
<div id="footer-widgets">
	<div class="footer-right"> 
		<?php dynamic_sidebar( 'footer-right' ); ?>
	</div>

	<div class="footer-left"> 
		<?php dynamic_sidebar( 'footer-left' ); ?>
	</div>
</div>
<?php } ?>
