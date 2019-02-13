<?php 
/**
 * @Packge     : Interior
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

/**
 * Footer Area
 *
 * @Footer
 * @Back To Top Button
 *
 * @Hook interior_footer
 *
 * @Hooked  interior_footer_area 10
 * @Hooked  interior_back_to_top 20 
 *
 */

do_action( 'interior_footer' );

wp_footer(); 
?>
</body>
</html>