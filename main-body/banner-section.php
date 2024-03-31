<?php
 /**
  * template about banner header image
  */
?>
<section class="banner-author">

	<div class="banner-author-holder" >
		<div class="img-holder custom-header 
		<?php
		if ( ! has_header_video() ) :
			echo 'no-video';
else :
	echo 'yes-video';
	   endif;
?>
	   " style="background-image: url(
	   <?php
		if ( ! has_header_video() ) :
			echo esc_url( get_header_image() );
	   endif
		?>
	   )" >
			<?php
			if ( has_header_video() ) :
				?>
			<div class="custom-header-media">
				<?php the_custom_header_markup(); ?>
			</div>
				<?php
			endif;
			if ( get_theme_mod( 'context_blog_logo_location_onHeaderImage', '0' ) == 1 || get_theme_mod( 'context_blog_headerimagesite_title_location', 1 ) == 1 ) :
				?>
					
			<div class="banner-author-info 
				<?php
				if ( has_header_video() ) :
					echo 'has_video';
		   endif;
				?>
		   ">                
							
					<?php
					if ( is_front_page() || is_home() ) :
						if ( has_custom_logo() ) :
							if ( get_theme_mod( 'context_blog_logo_location_onHeaderImage', '0' ) == 1 ) :
								?>
								<div class="logo">
									<?php the_custom_logo(); ?>
								</div>
								<?php
							endif;
						endif;
						if ( get_theme_mod( 'context_blog_headerimagesite_title_location', 1 ) == 1 ) :
							$context_blog_description = get_bloginfo( 'description', 'display' );
							if ( $context_blog_description || is_customize_preview() ) :
								?>
							<p class="site-description" ><?php echo esc_html( $context_blog_description ); ?></p>
							<?php endif; ?>
							<h1 class="site-title " ><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						endif;
					endif;
					?>
			</div>
			<?php endif; ?>
		</div>
				
	</div>

</section>
