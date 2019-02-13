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

//  Call Header
get_header();

/**
 * 404 page
 * @Hook interior_fof
 * @Hooked interior_fof_cb
 *
 */

do_action( 'interior_fof' );

// Call Footer
get_footer();
