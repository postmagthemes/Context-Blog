<?php

$context_blog_image_width  = get_theme_mod( 'context_blog_sidebar_about_image_width', 300 );
$context_blog_image_height = get_theme_mod( 'context_blog_sidebar_about_image_height', 300 );
if ( get_theme_mod( 'context_blog_sidebar_about_author_enable', '0' ) ) : ?>
	
	<div class="sidebar-block sidebar-about text-center sidebar-block-title">
		<h3 class="title"><?php echo esc_html( get_theme_mod( 'context_blog_sidebar_about_author_heading' ) ); ?></h3>
		<?php if ( ! context_blog_get_bio_image_url() == null ) : ?>
		<div class="img-holder">
			<img width = "<?php echo esc_attr( $context_blog_image_width ); ?>" height="<?php echo esc_attr( $context_blog_image_height ); ?>"  src="<?php echo esc_url( context_blog_get_bio_image_url() ); ?> " 
			alt="<?php echo esc_attr( get_post_meta( attachment_url_to_postid( context_blog_get_bio_image_url() ), '_wp_attachment_image_alt', true ) ); ?>">
		</div>
		<?php endif; ?>
		<div class= "about-content">
			<p><?php echo esc_html( get_theme_mod( 'context_blog_sidebar_about_author_textarea' ) ); ?></p>
			<?php if ( get_theme_mod( 'context_blog_about_author_social_enable', 1 ) == 1 ) : ?>
				<ul class="social-links">
					<?php context_blog_introduction_social_links_items(); ?>
				</ul>
				<?php
			endif;
			if ( get_theme_mod( 'context_blog_sidebar_about_author_readmore_btn', 1 ) == 1 ) :
				?>
				<a href="<?php echo esc_url( get_theme_mod( 'context_blog_about_author_readmore_url' ) ); ?>" class="btn btn-text"><?php echo esc_html( get_theme_mod( 'context_blog_about_author_readmore_text' ) ); ?></a>
			<?php endif; ?>
		</div>
	</div>
	<?php
endif;?>
