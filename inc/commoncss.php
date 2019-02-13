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

// enqueue css
function interior_common_custom_css() {
    
    wp_enqueue_style( 'interior-common', get_template_directory_uri().'/assets/css/common.css' );
		
		$headerBg          =  ! empty( get_header_image() ) ? 'url(' . esc_url( get_header_image() ) . ')' : '';
		$headerTextColor   = esc_attr( interior_opt( 'interior_headertextcolor', '#fff' ) );
		$headerbgcolor     = esc_attr( interior_opt( 'interior_headerbgcolor' ) );
		$headerOverlay     = esc_attr( interior_opt( 'interior_headeroverlaycolor' ) );
		$navbarbg 		   = esc_attr( interior_opt( 'interior_header_navbar_bgColor', 'rgba(255, 255, 255, 0)' ) );
		$stickynavbarbg    = esc_attr( interior_opt( 'interior_header_navbarsticky_bgColor', 'rgba(34,34,34,0.9)' ) );
		$navmenuColor 			= esc_attr( interior_opt( 'interior_header_navbar_menuColor', '#fff' ) );
		$navmenuHovColor 		= esc_attr( interior_opt( 'interior_header_navbar_menuHovColor', '#fff' ) );
		$stickynavmenuColor 	= esc_attr( interior_opt( 'interior_header_sticky_navbar_menuColor', '#fff' ) );
		$stickynavmenuHovColor 	= esc_attr( interior_opt( 'interior_header_sticky_navbar_menuHovColor', '#fff' ) );
		$foftext1     	   = esc_attr( interior_opt( 'interior_fof_textonecolor_settings' ) );
		$foftext2     	   = esc_attr( interior_opt( 'interior_fof_texttwocolor_settings' ) );
		$fofbgcolor        = esc_attr( interior_opt( 'interior_fof_bgcolor_settings' ) );
		$footerbgImg       = interior_opt( 'interior_footer_bgimg_settings' );

		$footerbgImg = json_decode( $footerbgImg );

		$footerbgImgAttr = '';

		if( ! empty( $footerbgImg->url ) ) {
			$footerbgImgAttr = 'background-image:url( ' .esc_url( $footerbgImg->url ). ' );';
		}

		$footerbgColor     = esc_attr( interior_opt( 'interior_footer_widget_bgColor_settings', '#fff' ) );
		$footerTextColor   = esc_attr( interior_opt( 'interior_footer_widget_color_settings', '#777' ) );
		$anchorcolor 	   = esc_attr( interior_opt( 'interior_footer_widget_anchorcolor_settings', '#777' ) );
		$anchorhovcolor    = esc_attr( interior_opt( 'interior_footer_widget_anchorhovcolor_settings', '#c6b069' ) );
		$widgettitlecolor  = esc_attr( interior_opt( 'interior_footer_widgettitlecolor_settings', '#222' ) );
		$themecolor  	   = esc_attr( interior_opt( 'interior_themecolor' ) );

		$footerbtomtextcolor 		= esc_attr( interior_opt( 'interior_footer_bottom_textcolor_settings', '#777' ) );
		$footerbtomanchorcolor 		= esc_attr( interior_opt( 'interior_footer_bottom_anchorcolor_settings', '#c6b069' ) );
		$footerbtomanchorhovercolor = esc_attr( interior_opt( 'interior_footer_bottom_anchorhovercolor_settings', '#777777' ) );


        $customcss ="
			.genric-btn.primary,
			.genric-btn.primary-border:hover,
			.default-switch input + label,
			.primary-switch input:checked + label:before,
			.top-head-btn,
			.primary-btn,
			.image-carusel-area .owl-dot.active,
			.testomial-area .owl-dot.active,
			.generic-banner,
			.blog-posts-area .single-blog-post .primary-btn:hover,
			.blog-pagination .page-item.active .page-link,
			.blog-pagination .page-link:hover,
			.search-widget form.search-form input[type=text],
			.search-widget form.search-form button,
			.single-sidebar-widget .popular-post-widget .popular-title,
			.single-sidebar-widget .category-title,
			.widget-wrap .newsletter-widget .newsletter-title,
			.widget-wrap .newsletter-widget .bbtns,
			.widget-wrap .tag-cloud-widget .tagcloud-title,
			.widget-wrap .tag-cloud-widget ul li:hover,
			.comments-area .btn-reply:hover,
			.pagination a.active-pagination,
			.pagination a:hover,
			.blog-detail-txt [type='submit'],
			.page-links a span:hover,
			.content--area .page-links a span:hover,
			.tagcloud a:hover,
			.footer-area .primary-btn,
			.footer-area .copyright-text .footer-social a:hover,
			.tags-widget ul li:hover,
			.testimonial-area .owl-dot.active,
			.blog-area .owl-dot.active,
			.footer-widget .newsletter-widget .bbtns, 
			.widget-wrap .newsletter-widget .bbtns,
			.global-banner {
				background-color: {$themecolor};
			}

			b, 
			sup, 
			sub, 
			u,
			del,
			.genric-btn.primary:hover,
			.genric-btn.primary-border,
			.ordered-list li,
			.ordered-list-alpha li,
			.ordered-list-roman li,
			.default-select .nice-select .list .option.selected,
			.default-select .nice-select .list .option:hover,
			.form-select .nice-select .list .option.selected,
			.form-select .nice-select .list .option:hover,
			.header-top .header-top-left a:hover i,
			.nav-menu ul li:hover > a,
			#mobile-nav ul .menu-has-children i.fa-chevron-up,
			#mobile-nav ul .menu-item-active,
			.primary-btn.white:hover,
			.primary-btn.white:hover span,
			.about-video-left h6,
			.feature-area .single-feature:hover h4, .feature-area .single-feature:hover .fa,
			.process-area .single-process:hover .fa,
			.single-testimonial:hover h4,
			.footer-area .single-footer-widget .footer-nav li a:hover,
			.footer-area .copyright-text a,
			.footer-area .copyright-text .footer-social a:hover,
			.contact-page-area .form-area .primary-btn:hover,
			.contact-page-area .single-contact-address .fa,
			.blog-posts-area .single-blog-post .meta-details .tags li a:hover,
			.blog-posts-area .single-blog-post .user-name a:hover, 
			.blog-posts-area .single-blog-post .date a:hover, 
			.blog-posts-area .single-blog-post .view a:hover, 
			.blog-posts-area .single-blog-post .comments a:hover,
			.protfolio-widget .social-links li a:hover,
			.single-widget ul li:hover p,
			.single-blog-post .social-links li a:hover,
			.single-blog-post .tags li:first-child:after,
			.single-blog-post .tags li:hover a,
			.single-blog-post .tags li:hover a,
			.single-footer-widget a:hover,
			.single-footer-widget ul li a:hover,
			.footer-social a:hover i,
			.footer-bottom a:hover,
			.single-footer-widget ul li a:hover,
			a:hover {
				color: {$themecolor};
			}
			.genric-btn.primary:hover,
			.genric-btn.primary-border,
			blockquote,
			.generic-blockquote,
			.unordered-list li:before,
			.single-input-primary:focus,
			#header #logo h1 a, #header #logo h1 a:hover,
			.primary-btn:hover,
			.contact-page-area .form-area .primary-btn:hover,
			.single-widget ul li:hover,
			.pagination a,
			.blog-post-list  .single-blog-post.sticky,
			.blog-detail-txt [type='submit'],
			.page-links a span,
			.page-links span:not(:first-child), 
			.content--area .page-links a span, 
			.gallery-area .single-gallery .content .content-overlay,
			.gallery-area .single-gallery .content-title,
			.content--area .page-links span:not(:first-child) {
				border-color: {$themecolor};
			}
			.global-banner {
				background-image: {$headerBg};
			}
			.banner-area .overlay-bg,
			.global-banner .overlay-bg {
				background-color: {$headerOverlay}
			}
			.about-content h1, 
			.about-content a,
			.bread-crumb.link-nav {
				color: {$headerTextColor};
			}
			.global-banner {
				background-color: {$headerbgcolor}
			}

			#f0f{
				background-color: {$fofbgcolor}
			}
			.inner-child-fof .h1 {
				color: {$foftext1}
			}
			.inner-child-fof a,
			.inner-child-fof p {
				color: {$foftext2}
			}
			.footer-area{
				{$footerbgImgAttr}
				background-color: {$footerbgColor};
				color: {$footerTextColor};
			}
			caption,
			footer-widget p,
			.single-footer-widget,
			footer {
				color: {$footerTextColor};
			}
			.single-footer-widget a,
			.footer-widget a {
				color: {$anchorcolor};
			}
			.single-footer-widget a:hover,
			.single-footer-widget ul li a:hover,
			.footer-bottom a:hover{
				color: {$anchorhovcolor};
			}
			.footer-area .single-footer-widget h6{
				color: {$widgettitlecolor};
			}
			.footer-area .copyright-text {
				color: {$footerbtomtextcolor};
			}
			.footer-area .copyright-text .footer-social a,
			.footer-area .copyright-text a {
				color: {$footerbtomanchorcolor};
			}
			.footer-area .copyright-text .footer-social a:hover,
			.footer-area .copyright-text a:hover {
				color: {$footerbtomanchorhovercolor};
			}
			#header {
				background-color: {$navbarbg};
			}
			#header.header-scrolled {
				background: {$stickynavbarbg};
			}
			.nav-menu a {
				color: {$navmenuColor};
			}
			.nav-menu li:hover > a, 
			.nav-menu > .menu-active > a,
			.nav-menu a:hover {
				color: {$navmenuHovColor};
			}
			.header-scrolled .nav-menu a {
				color: {$stickynavmenuColor};
			}
			.header-scrolled .nav-menu a:hover {
				color: {$stickynavmenuHovColor};
			}


        ";
       
    wp_add_inline_style( 'interior-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'interior_common_custom_css', 50 );