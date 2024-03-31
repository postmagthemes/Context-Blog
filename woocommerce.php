<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package context-blog
 */

get_header();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<div class="container">
			<div class="inside-page">
				<div class="detail-page ">
					<div class="row">
						<?php
						if ( get_theme_mod( 'context_blog_sidebar_enable_page_detail', 1 ) == 1 ) :
							if ( ! is_active_sidebar( 'sidebar-1' )
								and get_theme_mod( 'context_blog_sidebar_about_author_enable', 1 ) == 0
								and get_theme_mod( 'context_blog_sidebar_latest_blog_enable', 1 ) == 0
								and get_theme_mod( 'context_blog_sidebar_quote_enable', 1 ) == 0
								and get_theme_mod( 'context_blog_sidebar_stay_connected_enable', 1 ) == 0
							) :
								?>
								<div class="col-lg-12 col-md-12"> 
								<?php
							else :
								?>
								<div class="col-lg-8 col-md-8"> 
								<?php
							endif;
						else :
							?>
								<div class="col-lg-12 col-md-12"> 
								<?php
						endif;
						?>
									<div class="detail-holder">
										<?php woocommerce_content(); ?>
									</div> 
								</div>
						<?php
						if ( get_theme_mod( 'context_blog_sidebar_enable_page_detail', 1 ) == 1 ) :

							if ( is_active_sidebar( 'sidebar-1' )
								or get_theme_mod( 'context_blog_sidebar_about_author_enable', 1 ) == 1
								or get_theme_mod( 'context_blog_sidebar_latest_blog_enable', 1 ) == 1
								or get_theme_mod( 'context_blog_sidebar_quote_enable', 1 ) == 1
								or get_theme_mod( 'context_blog_sidebar_stay_connected_enable', 1 ) == 1
							) :
								?>
								 
									<div class="col-lg-4 col-md-4">
										<?php get_sidebar(); ?>
									</div>                    
								<?php
							endif;
						endif;
						?>
					</div>
				</div>
			</div>
		</div >
</article>
<?php
get_footer();
