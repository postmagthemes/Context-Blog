<?php
function context_blog_home_full_screen_slider_enable() {    
	$section_number = 3;
	$show_category  = get_theme_mod( 'context_blog_fullscreen_slider_' . __( 'category', 'context-blog' ), 1 );
	$show_meta      = get_theme_mod( 'context_blog_fullscreen_slider_' . __( 'meta', 'context-blog' ), 1 );
	$show_date      = get_theme_mod( 'context_blog_fullscreen_slider_' . __( 'date', 'context-blog' ), 1 );
	$show_comment   = get_theme_mod( 'context_blog_fullscreen_slider_' . __( 'comment', 'context-blog' ), 1 );
	$show_excerpt   = get_theme_mod( 'context_blog_fullscreen_slider_' . __( 'excerpt', 'context-blog' ), 1 );
	$show_readmore  = get_theme_mod( 'context_blog_fullscreen_slider_readmore', 1 );
	$show_modal     = get_theme_mod( 'context_blog_modal_popup_enable', 1 );
	
	$args['posts_per_page']      = absint( get_theme_mod( 'context_blog_full_screen_slider_number_of_display', 2 ) );
	$args['ignore_sticky_posts'] = 1;
	$args['cat']       = esc_attr( get_theme_mod( 'context_blog_full_screen_slider_category_name',0 ) ) ;	
	$args['orderby']             = array(
		esc_attr( get_theme_mod( 'context_blog_full_screen_slider_order', 'date' ) ) => 'DSC',
		'date' => 'DSC',
	);
	$context_blog_word_limit = get_theme_mod( 'context_blog_full_screen_slider_excerpt_limit', 25 );
	$blogsloop               = new WP_Query( $args );
	if ( $blogsloop->have_posts() ) :
		?><section class="home-section full-blog" >
		<?php if ( get_theme_mod( 'context_blog_home_full_screen_slider_title' ) ) :
			?><div class="container">
				<h2 class="main-title text-left"><?php echo esc_html( get_theme_mod( 'context_blog_home_full_screen_slider_title' ) ); ?></h2>
			</div>
		<?php endif; ?>
			<div class="full-blog-holder"  data-aos="fade-in">
			<?php
			while ( $blogsloop->have_posts() ) :
				$blogsloop->the_post();
				context_blog_content_core( $section_number, $show_category, $show_meta, $show_date, $show_comment, $show_excerpt, $show_readmore, $show_modal );
			endwhile;
			wp_reset_postdata(); 
		?> </div>
		</section> <?php
	endif;
}
context_blog_home_full_screen_slider_enable();