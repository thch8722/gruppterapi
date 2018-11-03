<?php
/**
 * The template for displaying custom menus
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


if ( ! function_exists( 'gridalicious_primary_menu' ) ) :
/**
 * Shows the Primary Menu
 *
 * default load in sidebar-header-right.php
 */
function gridalicious_primary_menu() {
    ?>
	<nav class="nav-primary search-enabled" role="navigation">
        <div class="wrapper">
            <h1 class="assistive-text"><?php _e( 'Primary Menu', 'gridalicious' ); ?></h1>
            <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'gridalicious' ); ?>"><?php _e( 'Skip to content', 'gridalicious' ); ?></a></div>
            <?php
                if ( has_nav_menu( 'primary' ) ) {
                    $gridalicious_primary_menu_args = array(
                        'theme_location'    => 'primary',
                        'menu_class'        => 'menu gridalicious-nav-menu',
                        'container'         => false
                    );
                    wp_nav_menu( $gridalicious_primary_menu_args );
                }
                else {
                    wp_page_menu( array( 'menu_class'  => 'menu gridalicious-nav-menu' ) );
                }

                ?>
                <div id="search-toggle" class="genericon">
                    <a class="screen-reader-text" href="#search-container"><?php esc_html_e( 'Search', 'gridalicious' ); ?></a>
                </div>

                <div id="search-container" class="displaynone">
                    <?php get_Search_form(); ?>
                </div>
    	</div><!-- .wrapper -->
    </nav><!-- .nav-primary -->
    <?php
}
endif; //gridalicious_primary_menu
add_action( 'gridalicious_after_header', 'gridalicious_primary_menu', 20 );


if ( ! function_exists( 'gridalicious_secondary_menu' ) ) :
/**
 * Shows the Secondary Menu
 *
 * default load in sidebar-header-right.php
 */
function gridalicious_secondary_menu() {
    if ( has_nav_menu( 'secondary' ) ) {
	?>
    	<nav class="nav-secondary" role="navigation">
            <div class="wrapper">
                <h1 class="assistive-text"><?php _e( 'Secondary Menu', 'gridalicious' ); ?></h1>
                <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'gridalicious' ); ?>"><?php _e( 'Skip to content', 'gridalicious' ); ?></a></div>
                <?php
                    $gridalicious_secondary_menu_args = array(
                        'theme_location'    => 'secondary',
                        'menu_class' => 'menu gridalicious-nav-menu'
                    );
                    wp_nav_menu( $gridalicious_secondary_menu_args );
                ?>
        	</div><!-- .wrapper -->
        </nav><!-- .nav-secondary -->

<?php
    }
}
endif; //gridalicious_secondary_menu
add_action( 'gridalicious_after_header', 'gridalicious_secondary_menu', 30 );


if ( ! function_exists( 'gridalicious_mobile_menus' ) ) :
/**
 * This function loads Mobile Menus
 *
 * @uses gridalicious_after action to add the code in the footer
 */
function gridalicious_mobile_menus() {
    //For primary menu, check if primary menu exists, if not, page menu
    echo '<nav id="mobile-header-left-nav" class="mobile-menu" role="navigation">';
        if ( has_nav_menu( 'primary' ) ) {
            $args = array(
                'theme_location'    => 'primary',
                'container'         => false,
                'items_wrap'        => '<ul id="header-left-nav" class="menu">%3$s</ul>'
            );
            wp_nav_menu( $args );
        }
        else {
            wp_page_menu( array( 'menu_class'  => 'menu' ) );
        }
    echo '</nav><!-- #mobile-header-left-nav -->';

    //For Secondary Menu
    if ( has_nav_menu( 'secondary' ) ) {
        echo '<nav id="mobile-header-right-nav" class="mobile-menu" role="navigation">';
            $args = array(
                'theme_location'    => 'secondary',
                'container'         => false,
                'items_wrap'        => '<ul id="header-right-nav" class="menu">%3$s</ul>'
            );
            wp_nav_menu( $args );
        echo '</nav><!-- #mobile-header-right-nav -->';
    }
}
endif; //gridalicious_mobile_menus

add_action( 'gridalicious_after', 'gridalicious_mobile_menus', 20 );


if ( ! function_exists( 'gridalicious_mobile_header_nav_anchor' ) ) :
/**
 * This function loads Mobile Menus Left Anchor
 *
 * @uses gridalicious_header action to add in the Header
 */
function gridalicious_mobile_header_nav_anchor() {

    // Header Left Mobile Menu Anchor
    if ( has_nav_menu( 'primary' ) ) {
        $classes = "mobile-menu-anchor primary-menu";
    }
    else {
        $classes = "mobile-menu-anchor page-menu";
    }
    ?>

    <div id="mobile-header-left-menu" class="<?php echo $classes; ?>">
        <a href="#mobile-header-left-nav" id="header-left-menu" class="genericon genericon-menu">
            <span class="mobile-menu-text"><?php _e( 'Menu', 'gridalicious' );?></span>
        </a>
    </div><!-- #mobile-header-menu -->
    <?php
}
endif; //gridalicious_mobile_menus
add_action( 'gridalicious_header', 'gridalicious_mobile_header_nav_anchor', 30 );


if ( ! function_exists( 'gridalicious_mobile_secondary_nav_anchor' ) ) :
/**
 * This function loads Mobile Menus Footer Anchor
 * @uses gridalicious_header action to add in the Header
 */
function gridalicious_mobile_secondary_nav_anchor() {
    if ( has_nav_menu( 'secondary' ) ) {
        ?>
        <div id="mobile-header-right-menu" class="mobile-menu-anchor secondary-menu">
            <a href="#mobile-header-right-menu" id="secondary-menu" class="genericon genericon-menu">
                <span class="mobile-menu-text"><?php _e( 'Menu', 'gridalicious' );?></span>
            </a>
        </div><!-- #mobile-header-menu -->
    <?php
    }
}
endif; //gridalicious_mobile_secondary_nav_anchor
add_action( 'gridalicious_header', 'gridalicious_mobile_secondary_nav_anchor', 50 );
