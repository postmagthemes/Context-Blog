<?php
function context_blog_home_gallery_slider_enable() {    

	$section_number = 4;
	$show_category  = get_theme_mod( 'context_blog_gallery_slider_' . __( 'category', 'context-blog' ), 1 );
	$show_meta      = get_theme_mod( 'context_blog_gallery_slider_' . __( 'meta', 'context-blog' ), 1 );
	$show_date      = get_theme_mod( 'context_blog_gallery_slider_' . __( 'date', 'context-blog' ), 1 );
	$show_comment   = get_theme_mod( 'context_blog_gallery_slider_' . __( 'comment', 'context-blog' ), 1 );
	$show_excerpt   = get_theme_mod( 'context_blog_gallery_slider_' . __( 'excerpt', 'context-blog' ), 1 );
	$show_readmore  = get_theme_mod( 'context_blog_gallery_slider_readmore', 1 );
	$show_modal     = get_theme_mod( 'context_blog_modal_popup_enable', 1 );
	//below args and checkpost are used to just check the post present or not.
	$checkargs['cat']       = esc_attr( get_theme_mod( 'context_blog_gallery_slider_category_name',0 ) ) ;
	$checkpost               = new WP_Query( $checkargs );
	if ( $checkpost->have_posts() ) :

		?><section class="home-section inline-blog list-view onlygallery">
			<div class="container" >
			<?php if ( get_theme_mod( 'context_blog_home_gallery_slider_title' ) ) :
				?><h2 class="main-title text-left"><?php echo esc_html( get_theme_mod( 'context_blog_home_gallery_slider_title' ) ); ?></h2>
			<?php endif; ?>
				<div class="row">
					<div class="col-lg-8">
						<div class="blog-slider-main" data-aos="fade-left">
							<?php
							$args['posts_per_page']      = absint( get_theme_mod( 'context_blog_gallery_slider_number_of_display' ) );
							$args['ignore_sticky_posts'] = 1;
							$args['cat']       = esc_attr( get_theme_mod( 'context_blog_gallery_slider_category_name',0 ) ) ;
							$args['orderby']             = array(
								esc_attr( get_theme_mod( 'context_blog_gallery_slider_order', 'date' ) ) => 'DSC',
								'date' => 'DSC',
							);

							$context_blog_word_limit = get_theme_mod( 'context_blog_gallery_slider_excerpt_limit', 25 );
							$blogsloop               = new WP_Query( $args );
							if ( $blogsloop->have_posts() ) :
								while ( $blogsloop->have_posts() ) :
									$blogsloop->the_post();
									context_blog_content_core( $section_number, $show_category, $show_meta, $show_date, $show_comment, $show_excerpt, $show_readmore, $show_modal );

								endwhile;
								wp_reset_postdata();
							endif;
							?>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="blog-slider-thmb" data-aos="fade-up">
							<?php
							$args['posts_per_page']      = absint( get_theme_mod( 'context_blog_gallery_slider_number_of_display', '4' ) );
							$args['ignore_sticky_posts'] = 1;
							$args['cat']       = esc_attr( get_theme_mod( 'context_blog_gallery_slider_category_name',0 ) ) ;	
							$args['orderby']             = 'date';
							$args['order']               = 'DESC';
							$blogsloop                   = new WP_Query( $args );
							if ( $blogsloop->have_posts() ) :
								while ( $blogsloop->have_posts() ) :
									$blogsloop->the_post();
									?>
							<div class="blog-snippet xs">
									<?php
									if ( has_post_thumbnail() ) :
										?>
									<a href="<?php the_permalink(); ?>" class="img-holder" aria-label='<?php the_title(); ?>'>
										<?php the_post_thumbnail( 'context-blog-gallery-slider-2-footer-news-100X98' ); ?>
									</a>
									<?php endif; ?>
								<div class="blog-content <?php if ( !has_post_thumbnail() ) : echo " no_image"; endif; ?>">
									<?php if ( $show_category == 1 ) : ?>
										<div class="category-tag">
										<?php
										esc_html_e( 'In', 'context-blog' );
										$categories = get_the_category();
										if ( ! empty( $categories ) ) {
											echo '<ul><li><a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' ." " .esc_html( $categories[0]->name ) . '</a></li></ul>';
										}
										?>
										</div>
									<?php endif; ?>
									<h3 class="title">
										<a href="<?php the_permalink(); ?>" aria-label='<?php context_blog_the_title(); ?>'><?php context_blog_the_title(); ?></a>
									</h3>
								</div>
							</div>
									<?php
								endwhile;
								wp_reset_postdata();
							endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif;
}
context_blog_home_gallery_slider_enable();
