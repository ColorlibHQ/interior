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
 * General Section Fields
 ***********************************/


// Theme Main Color Picker
Epsilon_Customizer::add_field(
    'interior_themecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Main Color.', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_general_options_section',
        'default'     => '#c6b069',
    )
);
// Google map api key field
$url = 'https://developers.google.com/maps/documentation/geocoding/get-api-key';

Epsilon_Customizer::add_field(
    'interior_map_apikey',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Google map api key', 'interior' ),
        'description'       => sprintf( __( 'Set google map api key. To get api key %s click here %s.', 'interior' ), '<a target="_blank" href="'.esc_url( $url  ).'">', '</a>' ),
        'section'           => 'interior_general_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
        
    )
);

// Instagram api key field
$url = 'https://www.instagram.com/developer/authentication/';

Epsilon_Customizer::add_field(
    'interior_igaccess_token',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Instagram Access Token', 'interior' ),
        'description'       => sprintf( __( 'Set instagram access token. To get access token %s click here %s.', 'interior' ), '<a target="_blank" href="'.esc_url( $url  ).'">', '</a>' ),
        'section'           => 'interior_general_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
        
    )
);

/***********************************
 * Header Section Fields
 ***********************************/
// Header top email text
Epsilon_Customizer::add_field(
    'interior_header_email',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Header Top Left Text', 'interior' ),
        'section'     => 'interior_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => esc_html__( 'info@example.com', 'interior' ),
    )
);
// Header top phone text
Epsilon_Customizer::add_field(
    'interior_header_phone',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Header Top Phone Number', 'interior' ),
        'section'     => 'interior_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => esc_html__( '+880 123 12 658 439', 'interior' ),
    )
);
// Header Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'interior_header_navbar_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Background Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_headertop_options_section',
        'default'     => 'rgba(255, 255, 255, 0)',
    )
);
// Header Sticky  Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'interior_header_navbarsticky_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Sticky Nav Bar Background Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_headertop_options_section',
        'default'     => 'rgba(34,34,34,0.9)',
    )
);
// Header Nav Bar Menu Color Picker
Epsilon_Customizer::add_field(
    'interior_header_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header Nav Bar Menu Hover Color Picker
Epsilon_Customizer::add_field(
    'interior_header_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Hover Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header sticky nav bar menu color picker
Epsilon_Customizer::add_field(
    'interior_header_sticky_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header sticky nav bar menu hover color picker
Epsilon_Customizer::add_field(
    'interior_header_sticky_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Hover Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_headertop_options_section',
        'default'     => '#fff',
    )
);
// Page Header Background Color Picker
Epsilon_Customizer::add_field(
    'interior_headerbgcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#c6b069',
    )
);
// Page Header text Color Picker
Epsilon_Customizer::add_field(
    'interior_headertextcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Text Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#fff',
    )
);
// Header overlay switch field
Epsilon_Customizer::add_field(
    'interior-headeroverlay-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Toggle header overlay', 'interior' ),
        'section'     => 'colors',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
// Header overlay color
Epsilon_Customizer::add_field(
    'interior_headeroverlaycolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Overlay Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => 'rgba(0, 0, 0, 0.7)',
    )
);

/***********************************
 * Blog Section Fields
 ***********************************/


// Post excerpt length field
Epsilon_Customizer::add_field(
    'interior_post_excerpt',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Post Excerpt', 'interior' ),
        'description' => esc_html__( 'Set post excerpt length.', 'interior' ),
        'section'     => 'interior_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);
// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'interior-blog-sidebar-settings',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'interior' ),
        'section'  => 'interior_blog_options_section',
        'description' => esc_html__( 'Select the option to set blog page sidebar position.', 'interior' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 1,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);
if( defined( 'INTERIOR_COMPANION_VERSION' ) ) {

    // Header social switch field
    Epsilon_Customizer::add_field(
        'interior-blog-social-share-toggle',
        array(
            'type'        => 'epsilon-toggle',
            'label'       => esc_html__( 'Blog Social Share Show/Hide', 'interior' ),
            'section'     => 'interior_blog_options_section',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    // Header social switch field
    Epsilon_Customizer::add_field(
        'interior-blog-like-toggle',
        array(
            'type'        => 'epsilon-toggle',
            'label'       => esc_html__( 'Blog Like Button Show/Hide', 'interior' ),
            'section'     => 'interior_blog_options_section',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

}

// Header featured category switch field
Epsilon_Customizer::add_field(
    'interior-category-show',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Featured Category Show/Hide', 'interior' ),
        'section'     => 'interior_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

// Cat number
Epsilon_Customizer::add_field(
    'interior_cat_number',
    array(
        'type'        => 'epsilon-slider',
        'label'       => esc_html__( 'Featured Category Number', 'interior' ),
        'description' => esc_html__( 'Set how many featured categories you want to show in blog page top.', 'interior' ),
        'section'     => 'interior_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '3',
    )
);

/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'interior_fof_text_one',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'interior' ),
        'section'           => 'interior_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Ooops 404 Error !'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'interior_fof_text_two',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'interior' ),
        'section'           => 'interior_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Either something went wrong or the page dosen\'t exist anymore.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'interior_fof_textonecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_fof_options_section',
        'default'     => '#404551', 
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'interior_fof_texttwocolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_fof_options_section',
        'default'     => '#abadbe',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'interior_fof_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_fof_options_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'interior-widget-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'interior' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'interior' ),
        'section'     => 'interior_footer_options_section',
        'default'     => false,
    )
);

// Footer copy right text add settings

// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s. Copyright &copy; %s  |  All rights reserved', 'interior' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

Epsilon_Customizer::add_field(
    'interior-copyright-text-settings',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'interior' ),
        'section'     => 'interior_footer_options_section',
        'default'     => wp_kses_post( $copyText ),
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'interior_footer_bgimg_settings',
    array(
        'type'        => 'epsilon-image',
        'label'       => esc_html__( 'Footer Widget Background Image', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_footer_options_section',
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'interior_footer_widget_bgColor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Background Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_footer_options_section',
        'default'     => '#fff',
    )
);
// Footer widget text color field
Epsilon_Customizer::add_field(
    'interior_footer_widget_color_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Text Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_footer_options_section',
        'default'     => '#777',
    )
);
// Footer widget title color field
Epsilon_Customizer::add_field(
    'interior_footer_widgettitlecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widgets Title Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_footer_options_section',
        'default'     => '#222',
    )
);
// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'interior_footer_widget_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_footer_options_section',
        'default'     => '#777',
    )
);
// Footer widget anchor hover Color
Epsilon_Customizer::add_field(
    'interior_footer_widget_anchorhovcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Hover Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_footer_options_section',
        'default'     => '#04091e',
    )
);

// Footer bottom text Color
Epsilon_Customizer::add_field(
    'interior_footer_bottom_textcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Text Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_footer_options_section',
        'default'     => '#777',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'interior_footer_bottom_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_footer_options_section',
        'default'     => '#c6b069',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'interior_footer_bottom_anchorhovercolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Hover Color', 'interior' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'interior_footer_options_section',
        'default'     => '#777777',
    )
);
