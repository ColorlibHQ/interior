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


// Header menu hook function
if( ! function_exists( 'interior_header_cb' ) ) {
	function interior_header_cb() {
		if( ! is_404() ) {
			$header = get_post_meta( absint( get_the_ID() ) ,'_interior_builderpage_header_show', true );									
			get_template_part( 'templates/header', 'nav' );

			if( ! is_page_template( 'template-builder.php' ) || $header == 'show'  ) {
				get_template_part( 'templates/header', 'bottom' );
			}
			
		}
		
	}
}

// Footer area hook function
if( ! function_exists( 'interior_footer_area' ) ) {
	function interior_footer_area() {

		$footerWidget = interior_opt( 'interior-widget-toggle-settings', false );

		$noWidgets = ! empty( $footerWidget ) ? '' : ' no-widgets';

		if( ! is_404() ) {
			echo '<footer class="footer-area'.esc_attr( $noWidgets ).'">';

			// Footer widget

			if( $footerWidget ) {
				get_template_part( 'templates/footer', 'widgets' );
			}
			
			// Footer bottom
			get_template_part( 'templates/footer', 'bottom' );	

			echo '</footer>';
			
		}
	}
}

// Footer back to top hook function
if( ! function_exists( 'interior_back_to_top' ) ) {
	function interior_back_to_top() {
		$opt = get_theme_mod( 'interior-gototop-toggle-settings' );
					
		if( $opt ):
			?>
			<div class="btn-back-to-top bg0-hov" id="myBtn">
				<span class="symbol-btn-back-to-top">
					<i class="fa fa-angle-double-up" aria-hidden="true"></i>
				</span>
			</div>
			<?php
		endif;
	}
}

// Blog, single, page, search, archive pages wrapper start hook function.
if( ! function_exists( 'interior_wrp_start_cb' ) ) {
	function interior_wrp_start_cb() {
		echo '<section class="blog-posts-area section-gap"><div class="container"><div class="row">';
	}
}
// Blog, single, page, search, archive pages wrapper end hook function.
if( ! function_exists( 'interior_wrp_end_cb' ) ) {
	function interior_wrp_end_cb() {
		echo '</div></div></section>';
	}
}
// Blog, single, search, archive pages column start hook function.
if( ! function_exists( 'interior_blog_col_start_cb' ) ) {
	function interior_blog_col_start_cb() {
		
		$sidebarOpt = interior_sidebar_opt();

		//
		if( ! is_page() ) {

			$pullRight  = interior_pull_right( $sidebarOpt , '3' );

			if( $sidebarOpt != '1' ) {
				$col = '8'.$pullRight;
			} else {
				$col = '10 offset-lg-1';
			}

		} else {
			$col = '8';
		}
		
		echo '<div class="col-lg-'.esc_attr( $col ).' post-list blog-post-list">';
	}
}
// Blog, single, search, archive pages column end hook function.
if( ! function_exists( 'interior_blog_col_end_cb' ) ) {
	function interior_blog_col_end_cb() {
		echo '</div>';
	}
}

// Blog post thumbnail hook function.
if( ! function_exists( 'interior_blog_posts_thumb_cb' ) ) {
	function interior_blog_posts_thumb_cb() {

		// Thumbnail Show
		if( has_post_thumbnail() ) {
					
			if( !is_single() ) {
			
				$html = '';
				$html .= interior_img_tag(
					array(
						'url' => esc_url( get_the_post_thumbnail_url() )
					)
				);
			
			} else {
				
				$html = '';
				$html .= interior_img_tag(
					array(
						'url' => esc_url( get_the_post_thumbnail_url() )
					)
				);

			}

			echo wp_kses_post( $html );
			
		}
		// Thumbnail check and video and audio thumb show
		if( ! is_single() && ! has_post_thumbnail() ) {
			$html = '';
			if( has_post_format( array( 'video' ) ) ) {
				
				$html .= '<div class="post--img blog-post-video">';
				$html .= interior_embedded_media( array( 'video', 'iframe' ) );
				$html .= '</div>';

			} else {

				if( has_post_format( array( 'audio' ) ) ) {
					
					$html .= '<div class="post--img blog-post-audio">';
					$html .= interior_embedded_media( array( 'audio', 'iframe' ) );
					$html .= '</div>';
				}
			}
			
			echo apply_filters( 'interior_audio_embedded_media', $html );

		}
	}
}

// Blog post title hook function.
if( ! function_exists( 'interior_blog_posts_title_cb' ) ) {
	function interior_blog_posts_title_cb() {
		if( get_the_title() ) {
			
			if( ! is_single() ) {
				echo '<a href="'.esc_url( get_the_permalink() ).'"><h1>'.esc_html( get_the_title() ).'</h1></a>';
			} else {
				echo '<h1>'.esc_html( get_the_title() ).'</h1>';
			}

		}
	}
}

// Blog posts meta hook function.
if( ! function_exists( 'interior_blog_posts_meta_cb' ) ) {
	function interior_blog_posts_meta_cb() {
		$tags = interior_post_tags();
		if( $tags ):
		?>
		<ul class="tags">
			<?php 
			echo wp_kses_post( $tags );
			?>
		</ul>
		<?php
		endif;
	}
}

// Blog posts meta hook function.
if( ! function_exists( 'interior_blog_posts_bottom_meta_cb' ) ) {
	function interior_blog_posts_bottom_meta_cb() {

		$date_format = get_option( 'date_format' );

		?>
		<div class="user-details row">

			<p class="user-name col-lg-12 col-md-12 col-6"><a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><?php echo esc_html( get_the_author() ) ?></a> <span class="lnr lnr-user"></span></p>
			<p class="date col-lg-12 col-md-12 col-6"><a href="<?php echo esc_url( interior_blog_date_permalink() ); ?>"><?php echo esc_html( get_the_date( $date_format ) ); ?></a> <span class="lnr lnr-calendar-full"></span></p>
			<?php 
			if( interior_opt('interior-blog-like-toggle') && function_exists('get_simple_likes_button') ) {

				echo '<p class="view col-lg-12 col-md-12 col-6">'.get_simple_likes_button( absint( get_the_ID() ) ).'</p>';
			}
			?>
			<p class="comments col-lg-12 col-md-12 col-6"><?php echo interior_posted_comments(); ?></p>		



		</div>
		<?php
	}
}

// Blog posts excerpt hook function.
if( ! function_exists( 'interior_blog_posts_excerpt_cb' ) ) {
	function interior_blog_posts_excerpt_cb() {
		?>
		<div class="p-b-12">
			<?php 
			// Post excerpt
			echo interior_excerpt_length( esc_html( interior_opt('interior_post_excerpt') ) );

			// Link Pages
			interior_link_pages();
			?>
		</div>	
		<a href="<?php the_permalink(); ?>" class="primary-btn">
			<?php esc_html_e( 'View More', 'interior' ); ?>
		</a>			
		<?php

	}
}

// Blog posts content hook function.
if( ! function_exists( 'interior_blog_posts_content_cb' ) ) {
	function interior_blog_posts_content_cb() {
		the_content();
		// Link Pages
		interior_link_pages();
	}
}

// Page content hook function.
if( ! function_exists( 'interior_page_content_cb' ) ) {
	function interior_page_content_cb() {
		?>
		<div class="page--content">
			<?php 
			the_content();

			// Link Pages
			interior_link_pages();
			?>

		</div>
		<?php
		// comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
}

// Blog page sidebar hook function.
if( ! function_exists( 'interior_blog_sidebar_cb' ) ) {
	function interior_blog_sidebar_cb() {
		
		$sidebarOpt = interior_sidebar_opt();
		
		if( $sidebarOpt != '1'  || is_page()  ) {
			get_sidebar();
		}
	
			
	}
}


// Blog single post  social share hook function.
if( ! function_exists( 'interior_blog_posts_share_cb' ) ) {
	function interior_blog_posts_share_cb() {
					
		if( function_exists( 'interior_social_sharing_buttons' ) ) {
			interior_social_sharing_buttons();
		}			
	}
}

/**
 * Blog single post meta category, tag, next-previous link, comments form and biography hook function.
 */
if( ! function_exists('interior_blog_single_meta_cb') ) {
	function interior_blog_single_meta_cb() {

		$date_format = get_option( 'date_format' );
		?>


            <p class="user-name col-lg-12 col-md-12 col-6"><a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><?php echo esc_html( get_the_author() ) ?></a> <span class="lnr lnr-user"></span></p>
            <p class="date col-lg-12 col-md-12 col-6"><a href="<?php echo esc_url( interior_blog_date_permalink() ); ?>"><?php echo esc_html( get_the_date( $date_format ) ) ?></a> <span class="lnr lnr-calendar-full"></span></p>

			<?php
			if( interior_opt( 'interior-blog-like-toggle' ) && function_exists( 'get_simple_likes_button' ) ) {

				echo '<p class="view col-lg-12 col-md-12 col-6">'.get_simple_likes_button( absint( get_the_ID() ) ).'</p>';
			}
			?>
            <p class="comments col-lg-12 col-md-12 col-6"><?php echo interior_posted_comments(); ?></p>

			
			<?php 
			if( interior_opt( 'interior-blog-social-share-toggle' ) && function_exists( 'interior_social_sharing_buttons' ) ) {
				echo '<div class="social-links col-lg-12 col-md-12 col-6">'.interior_social_sharing_buttons().'</div>';
			}
			//
			$cats = interior_post_cats();
			if( $cats ) {
				echo '<div class="category">' . $cats . '</div>';
			}

	}
}


/**
 * Blog single footer nav
 */
if( ! function_exists('interior_blog_single_footer_nav_cb') ) {
	function interior_blog_single_footer_nav_cb() {

		// Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ):
		?>
		<div class="navigation-area pt-50 pb-50">
            <div class="row justify-content-between">
            	<?php 
            	$offset = ' offset-sm-6';
            	if( get_next_post_link() ):
            		$offset = '';
            		$nextPost = get_next_post();
            	?>
                <div class="col-sm-6 nav-left justify-content-start d-flex">
                    <div class="thumb">
                    	<?php
                    	$url = get_the_post_thumbnail_url( absint( $nextPost->ID ), 'interior-np-thumb' );
                    	echo interior_img_tag(
                    		array(
                    			'url'	=> esc_url( $url ),
                    		)
                    	);
                    	?>
                    </div>
                    <div class="post-details">
                        <p><?php esc_html_e( 'Next Post', 'interior' ); ?></p>
                        <h4 class="text-uppercase"><?php echo get_next_post_link( '%link', '%title', false ); ?></h4>
                    </div>
                </div>
				<?php 
				endif;
				//
            	if( get_previous_post_link() ):
            		$prevPost = get_previous_post();
				?>

                <div class="col-sm-6<?php echo esc_attr( $offset ); ?> nav-right justify-content-end d-flex">
                    <div class="post-details">
                        <p><?php esc_html_e( 'Prev Post', 'interior' ); ?></p>
                        <h4 class="text-uppercase"><?php echo get_previous_post_link( '%link', '%title','', false ); ?></h4>
                    </div>             
                    <div class="thumb">
                    	<?php 
                    	$url = get_the_post_thumbnail_url( absint( $prevPost->ID ), 'interior-np-thumb' );
                    	echo interior_img_tag(
                    		array(
                    			'url' 	 => esc_url( $url ),
                    		)
                    	);
                    	?>
                    </div>                         
                </div>
				<?php 
				endif;
				?>
            </div>   
        </div>
		<?php
		endif;

		// Author biography
		if( '' !== get_the_author_meta( 'description' ) ) {
			get_template_part( 'templates/biography' );
		}
	}
}

// Blog 404 page hook function.
if( ! function_exists( 'interior_fof_cb' ) ) {
	function interior_fof_cb() {
		get_template_part( 'templates/404' );			
	}
}

