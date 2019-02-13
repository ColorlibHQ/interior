<?php 
/**
 * @Packge 	   : Interior
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

// Sidebar
if( is_active_sidebar( 'interior-post-sidebar' ) ) {
	echo '<div class="col-lg-4 sidebar"><div class="widget-wrap">';
		dynamic_sidebar( 'interior-post-sidebar' );
	echo '</div></div>';
}
