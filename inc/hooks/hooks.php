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

/**
 *
 * Before Wrapper
 *
 * @Preloader
 *
 */
add_action( 'interior_preloader', 'interior_site_preloader', 10 );

/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 * 
 */

add_action( 'interior_header', 'interior_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'interior_footer', 'interior_footer_area', 10 );
add_action( 'interior_footer', 'interior_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'interior_wrp_start', 'interior_wrp_start_cb', 10 );
add_action( 'interior_wrp_end', 'interior_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'interior_blog_col_start', 'interior_blog_col_start_cb', 10 );
add_action( 'interior_blog_col_end', 'interior_blog_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'interior_blog_posts_thumb', 'interior_blog_posts_thumb_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'interior_blog_posts_title', 'interior_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'interior_blog_posts_meta', 'interior_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts bottom meta.
 */
add_action( 'interior_blog_posts_bottom_meta', 'interior_blog_posts_bottom_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'interior_blog_posts_excerpt', 'interior_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'interior_blog_posts_content', 'interior_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'interior_blog_sidebar', 'interior_blog_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'interior_blog_posts_share', 'interior_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'interior_blog_single_meta', 'interior_blog_single_meta_cb', 10 );

/**
 * Hook for blog single footer nav next - previous link and comments form.
 */
add_action( 'interior_blog_single_footer_nav', 'interior_blog_single_footer_nav_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'interior_page_content', 'interior_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'interior_fof', 'interior_fof_cb', 10 );
