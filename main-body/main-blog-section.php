<?php

function context_blog_home_main_blog_enable() {
	 global $context_blog_count_mainblog;
	$count_for_desgin2 = '';
	?>
<section class="main-blog" data-aos="fade-up" data-aos-mirror="false">
	<div class="container">
		<div class="home-section main-blog-holder list-page">
			
			<div class="row" id="row-article">
				<?php
					$section_number         = 20;
					$show_category          = get_theme_mod( 'context_blog_main_blog_' . __( 'category', 'context-blog' ), 1 );
					$show_meta              = get_theme_mod( 'context_blog_main_blog_' . __( 'meta', 'context-blog' ), 1 );
					$show_date              = get_theme_mod( 'context_blog_main_blog_' . __( 'date', 'context-blog' ), 1 );
					$show_comment           = get_theme_mod( 'context_blog_main_blog_' . __( 'comment', 'context-blog' ), 1 );
					$show_excerpt           = get_theme_mod( 'context_blog_main_blog_' . __( 'excerpt', 'context-blog' ), 1 );
					$show_readmore          = get_theme_mod( 'context_blog_main_blog_readmore', 1 );
					$show_modal             = get_theme_mod( 'context_blog_modal_popup_enable', 1 );
					$default_posts_per_page = get_option( 'posts_per_page' );

				if ( ( get_theme_mod( 'context_blog_sidebar_enable_homepage', 1 ) == 1 and get_option( 'show_on_front' ) == 'posts' )
					|| ( get_theme_mod( 'context_blog_sidebar_enable_blogpage', 1 ) == 1 and get_option( 'show_on_front' ) == 'page' ) ) :

					if ( ! is_active_sidebar( 'sidebar-1' )
						and get_theme_mod( 'context_blog_sidebar_about_author_enable', 1 ) == 0
						and get_theme_mod( 'context_blog_sidebar_latest_blog_enable', 1 ) == 0
						and get_theme_mod( 'context_blog_sidebar_quote_enable', 1 ) == 0
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
				if ( get_theme_mod( 'context_blog_home_main_blog_title' ) ) :
					?>
							<h2 class="main-title"><?php echo esc_html( get_theme_mod( 'context_blog_home_main_blog_title' ) ); ?></h2>
						<?php
						endif;
						$context_blog_count_mainblog = 1;
						$count_for_desgin2           = 'absent';

				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						if ( $context_blog_count_mainblog == 1 ) :
							if ( get_theme_mod( 'context_blog_main_blog_design', 2 ) == 1 || get_theme_mod( 'context_blog_main_blog_design', 2 ) == 2 ) :
								?>
										<div class="single-blog">
									<?php
									endif;
							if ( get_theme_mod( 'context_blog_main_blog_design', 2 ) == 3 ) :
								?>
										<div class="masionary-view bordered hello " >
									<?php
									endif;
						endif;

						if ( $context_blog_count_mainblog == 2 ) :
							if ( get_theme_mod( 'context_blog_main_blog_design', 2 ) == 2 ) :
								?>
										<div class="masionary-view bordered me">
											<?php
											$count_for_desgin2 = 'present';
									endif;
						endif;
						context_blog_content_core( $section_number, $show_category, $show_meta, $show_date, $show_comment, $show_excerpt, $show_readmore, $show_modal );

						if ( $default_posts_per_page == 1 && get_theme_mod( 'context_blog_main_blog_design', 2 ) != 3 ) :
							?>
									<div class="masionary-view bordered"> </div>
							   <?php
							   endif;
						$context_blog_count_mainblog++;

					endwhile;

					if ( get_theme_mod( 'context_blog_main_blog_design', 2 ) == 2 && $count_for_desgin2 == 'present' ) :
						?>
										</div >
							<?php endif; ?>
										</div>      
						<?php endif; ?>
							<div class="pagination text-center">
							<?php

								the_posts_pagination(
									array(
										'pre_text'  => __( 'Previous', 'context-blog' ),
										'next_text' => __( 'Next', 'context-blog' ),
									)
								);

							?>
						</div>      
						</div>  <!-- this div is for line 31,33,36 closing-->
					<?php
					if ( ( get_theme_mod( 'context_blog_sidebar_enable_homepage', 1 ) == 1 and get_option( 'show_on_front' ) == 'posts' )
						|| ( get_theme_mod( 'context_blog_sidebar_enable_blogpage', 1 ) == 1 and get_option( 'show_on_front' ) == 'page' )
					) :

						if ( is_active_sidebar( 'sidebar-1' )
							or get_theme_mod( 'context_blog_sidebar_about_author_enable', 1 ) == 1
							or get_theme_mod( 'context_blog_sidebar_latest_blog_enable', 1 ) == 1
							or get_theme_mod( 'context_blog_sidebar_quote_enable', 1 ) == 1
							or get_theme_mod( 'context_blog_sidebar_stay_connected_enable', 1 ) == 1
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
</section>
	<?php
}

context_blog_home_main_blog_enable();
