<?php if ( get_theme_mod( 'context_blog_sidebar_quote_enable', '0' ) ) : ?>
<blockquote class="text-center">
  <div class="sidebar-block quote sidebar-block-title">
	<?php if ( get_theme_mod( 'context_blog_sidebar_quote_heading' ) != null ) : ?>
	<h3 class="title"><?php echo esc_html( get_theme_mod( 'context_blog_sidebar_quote_heading' ) ); ?></h3>
	<?php endif; ?>
	<p>
	  <span class="fa fa-quote-left" aria-hidden="true"></span> 
		<?php echo esc_html( get_theme_mod( 'context_blog_sidebar_quote_texarea' ) ); ?> 
	  <span class="fa fa-quote-right" aria-hidden="true"></span>
	</p>
	
  </div>
</blockquote>
	<?php
endif;
