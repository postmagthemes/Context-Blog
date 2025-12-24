<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package context-blog
 */

?>
	<footer class="footer" >
		<div class="footer-news" >
			<div class="container">
				<div class="row">

					<div class="col-lg-4 col-md-6 pt-4 pb-4">
						<div class="f-info">
							<?php if ( get_theme_mod( 'context_blog_logo_location_footer', 1 ) == 1 ) : ?>
								<div class="f-logo">
								<?php the_custom_logo(); ?>
								</div> 
								<?php
							endif;

							if ( get_theme_mod( 'context_blog_footer_content' ) ) :
								?>
								<p><?php echo esc_html( get_theme_mod( 'context_blog_footer_content' ) ); ?></p>
								<?php
							endif;
							if ( get_theme_mod( 'context_blog_footer_readmore_text' ) ) :
								?>
								<a href="<?php echo esc_url( get_theme_mod( 'context_blog_footer_readmore_url' ) ); ?>" class="btn btn-text"><?php echo esc_html( get_theme_mod( 'context_blog_footer_readmore_text' ) ); ?></a>
								<?php
							endif;
							if ( get_theme_mod( 'context_blog_footer_social_enable', 1 ) ) :
								?>
								<ul class="social-links button">
									<?php context_blog_social_links_items(); ?>
								</ul>
							<?php endif; ?>
						</div>
					</div>
					<?php if ( get_theme_mod( 'context_blog_footer_first_list_post', 1 ) == 1 ) : 
						$section_number = 22;
						$show_category  = get_theme_mod( 'context_blog_footer_news1_' . __( 'category', 'context-blog' ), 0 );
						$show_meta      = get_theme_mod( 'context_blog_footer_news1_' . __( 'meta', 'context-blog' ), 1 );
						$show_date      = get_theme_mod( 'context_blog_footer_news1_' . __( 'date', 'context-blog' ), 1 );
						$show_comment   = get_theme_mod( 'context_blog_footer_news1_' . __( 'comment', 'context-blog' ), 0 );
						$show_excerpt   = 0;
						$show_readmore  = 0;
						$show_modal     = 0;
						$args['posts_per_page']      = absint( get_theme_mod( 'context_blog_footer_news1_number', 3 ) );
						$args['ignore_sticky_posts'] = 1;
						$args['cat']       = esc_attr( get_theme_mod( 'context_blog_footer_news1_category_name',0 ) ) ;	
						$args['orderby']             = array(
							esc_attr( get_theme_mod( 'context_blog_footer_news1_order', 'date' ) ) => 'DSC',
							'date' => 'DSC',
						);
						$blogsloop = new WP_Query( $args );
						if ( $blogsloop->have_posts() ) :
							?><div class="col-lg-4 col-md-6 pt-4 pb-4">
								<div class="news1 list-view"><?php
									if ( get_theme_mod( 'context_blog_footer_news1_title' ) ) :
										?> <h2 class="f-title"><?php echo esc_html( get_theme_mod( 'context_blog_footer_news1_title' ) ); ?></h3><?php
									endif;
									while ( $blogsloop->have_posts() ) :
										$blogsloop->the_post();
										context_blog_content_core( $section_number, $show_category, $show_meta, $show_date, $show_comment, $show_excerpt, $show_readmore, $show_modal );
									endwhile;
									wp_reset_postdata();
								?></div>
							</div>
						<?php endif;
				
					endif;
					if ( get_theme_mod( 'context_blog_footer_second_list_post', 1 ) == 1 ) :
						
								$section_number = 22;
								$show_category  = get_theme_mod( 'context_blog_footer_news2_' . __( 'category', 'context-blog' ), 0 );
								$show_meta      = get_theme_mod( 'context_blog_footer_news2' . __( 'meta', 'context-blog' ), 1 );
								$show_date      = get_theme_mod( 'context_blog_footer_news2_' . __( 'date', 'context-blog' ), 0 );
								$show_comment   = get_theme_mod( 'context_blog_footer_news2_' . __( 'comment', 'context-blog' ), 1 );
								$show_excerpt   = 0;
								$show_readmore  = 0;
								$show_modal     = 0;

								$args['posts_per_page']      = absint( get_theme_mod( 'context_blog_footer_news2_number', 3 ) );
								$args['ignore_sticky_posts'] = 1;
								$args['cat']       = esc_attr( get_theme_mod( 'context_blog_footer_news2_category_name',0 ) ) ;	
								$args['orderby']             = array(
									esc_attr( get_theme_mod( 'context_blog_footer_news2_order', 'date' ) ) => 'DSC',
									'date' => 'DSC',
								);

								$blogsloop = new WP_Query( $args );
								if ( $blogsloop->have_posts() ) :
									?>
									<div class="col-lg-4 col-md-6 pt-4 pb-4">
										<div class="news2 list-view">
											<?php if ( get_theme_mod( 'context_blog_footer_news2_title' ) ) :
												?><h2 class="f-title"><?php echo esc_html( get_theme_mod( 'context_blog_footer_news2_title' ) ); ?></h3>
											<?php endif;
											while ( $blogsloop->have_posts() ) :
												$blogsloop->the_post();
												context_blog_content_core( $section_number, $show_category, $show_meta, $show_date, $show_comment, $show_excerpt, $show_readmore, $show_modal );
											endwhile;
											wp_reset_postdata();
											?>
										</div>
									</div>
								<?php endif;
							endif; ?>
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
			</div>
		</div>

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
							<div class="copyright-content text-center">
								<p><i class="fa fa-copyright"></i>
									<?php esc_html_e( 'Proudly powered by WordPress', 'context-blog' ); ?>
									<span class="sep"> | </span>
									<?php esc_html_e( 'postmagthemes.com', 'context-blog' ); ?>
									<span class="sep"> | </span>
									<?php esc_html_e( 'Theme Details', 'context-blog' ); ?>
									<span class="sep"> | </span>
									<a class="text-decoration-underline" href="https://www.postmagthemes.com/downloads/context-blog-free-wordpress-theme/" target="_blank"><?php esc_html_e( 'Context Blog','context-blog')?></a>
								<p>
							</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	 <!-- Modal -->
	 <div class="modal fade" id="modalPostConetentPopup" tabindex="-1" role="dialog" aria-labelledby="modalPostConetentPopupTitle" aria-hidden="true" data-lenis-prevent>
	  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			
		  </div>
		  <div class="modal-body">
			
		  </div>
		  <div class="modal-footer">
				
		  </div>
		</div>
	  </div>
	</div>
</div>

<?php wp_footer(); ?>
</body>

</html>
