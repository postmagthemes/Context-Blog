<?php
function context_blog_home_card_slider_enable() {   ?>
	<?php
	$section_number = 2;
	$show_category  = get_theme_mod( 'context_blog_card_slider_' . __( 'category', 'context-blog' ), 1 );
	$show_meta      = get_theme_mod( 'context_blog_card_slider_' . __( 'meta', 'context-blog' ), 0 );
	$show_date      = get_theme_mod( 'context_blog_card_slider_' . __( 'date', 'context-blog' ), 0 );
	$show_comment   = get_theme_mod( 'context_blog_card_slider_' . __( 'comment', 'context-blog' ), 0 );
	$show_excerpt   = get_theme_mod( 'context_blog_card_slider_' . __( 'excerpt', 'context-blog' ), 0 );
	$show_readmore  = get_theme_mod( 'context_blog_card_slider_readmore', 0 );
	$show_modal     = get_theme_mod( 'context_blog_modal_popup_enable', 1 );

		$args['posts_per_page']      = absint( get_theme_mod( 'context_blog_card_slider_number_of_display', '4' ) );
		$args['ignore_sticky_posts'] = 1;
		$args['cat'] = esc_attr( get_theme_mod( 'context_blog_card_slider_category_name',0 ) ) ;		
		$args['orderby']   = array(
			esc_attr( get_theme_mod( 'context_blog_card_slider_order', 'date' ) ) => 'DSC',
			'date' => 'DSC',
		);
		$blogsloop = new WP_Query( $args );
		if ( $blogsloop->have_posts() ) :
			?> <section class="home-section thumb-blog slide-excerpt">
				<div class="container">
					<?php if ( get_theme_mod( 'context_blog_home_card_slider_title' ) ) :
						?> <h2 class="main-title text-center" ><?php echo esc_html( get_theme_mod( 'context_blog_home_card_slider_title' ) ); ?></h2> <?php
					endif; ?>
					<div class="thumb-block fade-left">
						<?php
						while ( $blogsloop->have_posts() ) :
							$blogsloop->the_post();
							context_blog_content_core( $section_number, $show_category, $show_meta, $show_date, $show_comment, $show_excerpt, $show_readmore, $show_modal );
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</section>
		<?php endif;
}
context_blog_home_card_slider_enable();
