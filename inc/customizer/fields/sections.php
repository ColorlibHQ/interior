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

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'interior_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'interior' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'interior_general_options_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'interior' ),
            'panel'    => 'interior_options_panel',
            'priority' => 1,
        ),
    ),
    /**
     * Header Section
     */
    array(
        'id'   => 'interior_headertop_options_section',
        'args' => array(
            'title'    => esc_html__( 'Header Top', 'interior' ),
            'panel'    => 'interior_options_panel',
            'priority' => 2,
        ),
    ),
    /**
     * Blog Section
     */
    array(
        'id'   => 'interior_blog_options_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'interior' ),
            'panel'    => 'interior_options_panel',
            'priority' => 3,
        ),
    ),

    /**
     * 404 Page Section
     */
    array(
        'id'   => 'interior_fof_options_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'interior' ),
            'panel'    => 'interior_options_panel',
            'priority' => 6,
        ),
    ),
    /**
     * Footer Section
     */
    array(
        'id'   => 'interior_footer_options_section',
        'args' => array(
            'title'    => esc_html__( 'Footer', 'interior' ),
            'panel'    => 'interior_options_panel',
            'priority' => 7,
        ),
    ),

);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );
