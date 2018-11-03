<?php
/**
 * The template for displaying the footer
 *
 * @package Catch Themes
 * @subpackage Gridalicious
 * @since Gridalicious 0.1 
 */
?>

<?php 
    /** 
     * gridalicious_after_content hook
     *
     * @hooked gridalicious_content_end - 30
     * @hooked gridalicious_featured_content_display (move featured content below homepage posts) - 40 
     *
     */
    do_action( 'gridalicious_after_content' ); 
?>
            
<?php                
    /** 
     * gridalicious_footer hook
     *
     * @hooked gridalicious_footer_content_start - 30
     * @hooked gridalicious_footer_sidebar - 40
     * @hooked gridalicious_get_footer_content - 100
     * @hooked gridalicious_footer_content_end - 110
     * @hooked gridalicious_page_end - 200
     *
     */
    do_action( 'gridalicious_footer' );
?>

<?php               
/** 
 * gridalicious_after hook
 *
 * @hooked gridalicious_scrollup - 10
 * @hooked gridalicious_mobile_menus- 20
 *
 */
do_action( 'gridalicious_after' );?>

<?php wp_footer(); ?>

</body>
</html>