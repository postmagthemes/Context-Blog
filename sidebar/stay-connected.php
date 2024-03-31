<?php if ( get_theme_mod( 'context_blog_sidebar_stay_connected_enable', 1 ) ) :
	$context_blog_heading = get_theme_mod( 'context_blog_stay_connected_heading' );
	?>
	<div class="sidebar-block social context sidebar-block-title">
		
	<?php if ( $context_blog_heading ) : ?>
			<h3 class="title"><?php echo esc_html( $context_blog_heading ); ?></h3>
	<?php endif; ?>
		
	<ul class="social-links bordered">
		<?php context_blog_social_links_items(); ?>
	</ul>
	</div>
<?php endif; ?>
