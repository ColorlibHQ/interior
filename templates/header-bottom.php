<?php 
$id = get_the_ID();
$bgopt = get_post_meta( absint( $id ), '_interior_builderpage_headerimg', true );

$glob_class = ' global-banner';
$setbgurl  = '';

if ( $bgopt == 'featured' ) {
	$setbgurl  = get_the_post_thumbnail_url( absint( $id ) );
	$glob_class = '';
}
?>
<section class="banner-area relative<?php echo esc_attr( $glob_class  ); ?>" <?php echo interior_inline_bg_img( $setbgurl ); ?>>	
	<?php 
	if( interior_opt( 'interior-headeroverlay-toggle-settings' ) ) {
		echo '<div class="overlay overlay-bg"></div>';
	}
	?>
	
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<?php 
				if ( is_archive() ) {
					the_archive_title('<h1>', '</h1>');
				} elseif ( is_home() ) {
					echo '<h1>'.esc_html__( 'Blog', 'interior' ).'</h1>';
				} elseif ( is_search() ) {
					echo '<h1>'.esc_html__( 'Search Result', 'interior' ).'</h1>';
				} else {
					the_title( '<h1>', '</h1>' );
				}
				// breadcrumbs
				echo interior_breadcrumbs();
				?>	
			</div>											
		</div>
	</div>
</section>

<?php 
if( is_home() && interior_opt( 'interior-category-show' ) ) :
?>
<section class="top-category-widget-area pt-90 pb-90 ">
	<div class="container">
		<div class="row">
			<?php 
			$cats = get_categories( array( 'number' => absint( interior_opt( 'interior_cat_number', 3 ) ) ) );

			if( ! empty( $cats ) ):
			foreach( $cats as $cat ):
				$imgId = get_term_meta ( absint( $cat ->term_id ), 'category-image-id', true );
			?>
			<div class="col-lg-4">
				<div class="single-cat-widget">
					<div class="content relative">
						<div class="overlay overlay-bg"></div>
					    <a href="<?php echo esc_url( get_category_link( absint( $cat->term_id ) ) ); ?>" target="_blank">
					      <div class="thumb">
					  		<?php 
							echo wp_get_attachment_image( absint( $imgId ), 'full' , array( 'class' => 'content-image img-fluid d-block mx-auto' )  );
					  		?>
					  	  </div>
					      <div class="content-details">
					        <h4 class="content-title mx-auto text-uppercase"><?php echo esc_html( $cat ->name ) ?></h4>
					        <span></span>								        
					        <?php 
					        if( ! empty( $cat->description ) ) {
					        	echo '<p>' . esc_html( $cat->description ) . '</p>';
					        }
					        ?>
					      </div>
					    </a>
					</div>
				</div>
			</div>
			<?php 
			endforeach;
			endif;
			?>
		</div>
	</div>	
</section>
<?php 
endif;
?>