<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package context-blog
 */

get_header();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! is_home() && ( ! is_front_page() ) ) : ?>
		<header class="header">
		<?php context_blog_simple_breadcrumb(); ?>
		</header>

		<?php
	endif;
	?>

	<div class="inside-page">
	<!-- Here no-container class is added for no sidebar thus alignfull will be shown in full width   -->
		<div class="
		<?php
		if ( get_theme_mod( 'context_blog_sidebar_enable_page_detail', 1 ) == 1 ) :
			echo 'container';
else :
	echo 'no-sidebar no-container';
	   endif;
?>
		">
			<div class="detail-page">
				<div class="row">
					<?php
					if ( get_theme_mod( 'context_blog_sidebar_enable_page_detail', 1 ) == 1 ) :
						if ( ! is_active_sidebar( 'sidebar-1' )
							&& get_theme_mod( 'context_blog_sidebar_about_author_enable', 1 ) == 0
							&& get_theme_mod( 'context_blog_sidebar_latest_blog_enable', 1 ) == 0
							&& get_theme_mod( 'context_blog_sidebar_quote_enable', 1 ) == 0
							&& get_theme_mod( 'context_blog_sidebar_stay_connected_enable', 1 ) == 0
						) :
							?>
							<div class="col-lg-12 detail-page-body"> 
							<?php
						else :
							?>
							<div class="col-lg-8 col-md-8 detail-page-body"> 
							<?php
						endif;
					else :
						?>
							<div class="col-lg-12 detail-page-body"> 
							<?php
					endif;
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'single' );

							the_post_navigation(
								array(
									'next_text' => __( 'Next post', 'context-blog' ),
									'prev_text' => __( 'Previous post', 'context-blog' ),
								)
							);

						endwhile; // End of the loop.
					endif;
					?>
							</div>
					<?php
					if ( get_theme_mod( 'context_blog_sidebar_enable_page_detail', 1 ) == 1 ) :

						if ( is_active_sidebar( 'sidebar-1' )
							|| get_theme_mod( 'context_blog_sidebar_about_auth||_enable', 1 ) == 1
							|| get_theme_mod( 'context_blog_sidebar_latest_blog_enable', 1 ) == 1
							|| get_theme_mod( 'context_blog_sidebar_quote_enable', 1 ) == 1
							|| get_theme_mod( 'context_blog_sidebar_stay_connected_enable', 1 ) == 1
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
	</div>
	
</article>
<?php
get_footer();
