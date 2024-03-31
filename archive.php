<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package context-blog
 */

get_header();
	context_blog_simple_breadcrumb();
	global $context_blog_count_mainblog;
	$count_for_desgin2 = '';
?>
	<div class="inside-page archive">
		<div class="container">
			<div class="list-page">
				<div class="row">
					<?php
					$context_blog_section_number = 23;
					$context_blog_category       = 1;
					$context_blog_meta           = 1;
					$context_blog_date           = 0;
					$context_blog_comment        = 0;
					$context_blog_excerpt        = 0;
					$context_blog_readmore       = 0;
					$context_blog_modal          = 0;
					if ( ( get_theme_mod( 'context_blog_sidebar_enable_homepage', '1' ) == 1 and get_option( 'show_on_front' ) == 'posts' )
						|| ( get_theme_mod( 'context_blog_sidebar_enable_blogpage', '1' ) == 1 and get_option( 'show_on_front' ) == 'page' )
					) :

						if ( ! is_active_sidebar( 'sidebar-1' )
							and get_theme_mod( 'context_blog_sidebar_about_author_enable', '1' ) == 0
							and get_theme_mod( 'context_blog_sidebar_latest_blog_enable', 1 ) == 0
							and get_theme_mod( 'context_blog_sidebar_quote_enable', '1' ) == 0
							and get_theme_mod( 'context_blog_sidebar_stay_connected_enable', 1 ) == 0
						) :
							?>
							 <div class="col-lg-12 col-md-12 main-blog-body"> 
							<?php
						else :
							?>
							<div class="col-lg-8 col-md-7 main-blog-body"> 
							<?php
						endif;
					else :
						?>
						 <div class="col-lg-12 col-md-12 main-blog-body"> 
						<?php
					endif;
						$context_blog_count_mainblog = 1;
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							if ( $context_blog_count_mainblog == 1 ) :
								if ( get_theme_mod( 'context_blog_main_blog_design', '2' ) == 1 || get_theme_mod( 'context_blog_main_blog_design', '2' ) == 2 ) :
									?>
											<div class="single-blog">
									<?php
								endif;
								if ( get_theme_mod( 'context_blog_main_blog_design', '2' ) == 3 ) :
									?>
											<div class="masionary-view bordered">
											   <?php elseif ( get_theme_mod( 'context_blog_main_blog_design', '2' ) == 4 ) : ?>
											<div class="list-view ">
												   <?php
											   endif;
							endif;

							if ( $context_blog_count_mainblog == 2 ) :
								if ( get_theme_mod( 'context_blog_main_blog_design', '2' ) == 2 ) :
									?>
											<div class="masionary-view bordered">
										   <?php
											$count_for_desgin2 = 'present';
								endif;

							endif;

							context_blog_content_core( $context_blog_section_number, $context_blog_category, $context_blog_meta, $context_blog_date, $context_blog_comment, $context_blog_excerpt, $context_blog_readmore, $context_blog_modal );

							$context_blog_count_mainblog++;

						endwhile;
				if ( get_theme_mod( 'context_blog_main_blog_design', '2' ) == 2 && $count_for_desgin2 == 'present' ) :
							?>
										</div > <!-- this div is for closing in case design 2 is select which has opening from line 52 -->
								<?php endif; ?>
								
										</div> <!-- this div is for line 40 or 43 or 46 closing-->
								
									<!-- Start Pagination -->
									<div class="pagination-main">
										<?php
										the_posts_pagination(
											array(
												'mid_size' => 2,
												'prev_text' => __( 'Previous', 'context-blog' ),
												'next_text' => __( 'Next', 'context-blog' ),
											)
										);
										?>
									<!--/ End Pagination -->
									</div>
							<?php
							else :
								get_template_part( 'template-parts/content', 'none' );
							endif;
							?>
						</div> <!-- this div is for line 26 or 28 or 31 closing-->
						<?php
						if ( ( get_theme_mod( 'context_blog_sidebar_enable_homepage', '1' ) == 1 and get_option( 'show_on_front' ) == 'posts' )
							|| ( get_theme_mod( 'context_blog_sidebar_enable_blogpage', '1' ) == 1 and get_option( 'show_on_front' ) == 'page' )
						) :

							if ( is_active_sidebar( 'sidebar-1' )
								or get_theme_mod( 'context_blog_sidebar_about_author_enable', '1' ) == 1
								or get_theme_mod( 'context_blog_sidebar_latest_blog_enable', '1' ) == 1
								or get_theme_mod( 'context_blog_sidebar_quote_enable', '1' ) == 1
								or get_theme_mod( 'context_blog_sidebar_stay_connected_enable', '1' ) == 1
							) :
							?>
								 
							<div class="col-lg-4 col-md-5">
								<?php get_sidebar(); ?>
							</div>                    
								<?php
							endif;
						endif;
						?>
				</div>
			</div>
		</div>
	</div>
<?php

get_footer();
