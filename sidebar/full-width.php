<?php if ( get_theme_mod( 'context_blog_sidebar_fullwidth_enable', 1 ) ) :
	function context_blog_sidebar_fullwidth_enable() {

		$section_number              = 21;
		$show_category               = get_theme_mod( 'context_blog_sidebar_fullwidth_slider_' . __( 'category', 'context-blog' ), 1 );
		$show_meta                   = get_theme_mod( 'context_blog_sidebar_fullwidth_slider_' . __( 'meta', 'context-blog' ), 1 );
		$show_date                   = get_theme_mod( 'context_blog_sidebar_fullwidth_slider_' . __( 'date', 'context-blog' ), 1 );
		$show_comment                = get_theme_mod( 'context_blog_sidebar_fullwidth_slider_' . __( 'comment', 'context-blog' ), 1 );
		$show_excerpt                = 0;
		$show_readmore               = 0;
		$show_modal                  = 0;
		$args['posts_per_page']      = absint( get_theme_mod( 'context_blog_sidebar_fullwidth_number_of_display', 2 ) );
		$args['ignore_sticky_posts'] = 1;
		$args['cat']       = esc_attr( get_theme_mod( 'context_blog_sidebar_fullwidth_category_name',0 ) ) ;	
		$args['orderby']             = array(
			esc_attr( get_theme_mod( 'context_blog_sidebar_fullwidth_order', 'date' ) ) => 'DSC',
			'date' => 'DSC',
		);
		$count                       = 1;
		$blogsloop                   = new WP_Query( $args );

		if ( $blogsloop->have_posts() ) :
			?><div class ="latest-sider full-width ">
				<div class="sidebar-block sidebar-slider-content image-inner-content"> <?php
					while ( $blogsloop->have_posts() ) :
						$blogsloop->the_post();
						context_blog_content_core( $section_number, $show_category, $show_meta, $show_date, $show_comment, $show_excerpt, $show_readmore, $show_modal );
					endwhile;
					wp_reset_postdata();
				?></div>
			</div>
		<?php endif;
	}
	context_blog_sidebar_fullwidth_enable();
endif;?>
