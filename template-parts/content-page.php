<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package context-blog
 */


$context_blog_meta    = get_theme_mod( 'context_blog_singlepage_' . __( 'meta', 'context-blog' ), 1 );
$context_blog_date    = get_theme_mod( 'context_blog_singlepage_' . __( 'date', 'context-blog' ), 1 );
$context_blog_comment = get_theme_mod( 'context_blog_singlepage_' . __( 'comment', 'context-blog' ), 1 );

if ( is_home() || is_front_page() ) : ?>
	<section class="home-section static-page">
		<div class="
		<?php
		if ( get_theme_mod( 'context_blog_sidebar_enable_homepage', 1 ) == 1 ) :
			echo 'container';
else :
	echo 'no-sidebar no-container';
	   endif;
?>
		">
		<div class="detail-page ">
			
			<div class="row">
			
			<?php
			if ( get_theme_mod( 'context_blog_sidebar_enable_homepage', 1 ) == 1 ) :
				if ( ! is_active_sidebar( 'sidebar-1' )
					and get_theme_mod( 'context_blog_sidebar_about_author_enable', 1 ) == 0
					and get_theme_mod( 'context_blog_sidebar_latest_blog_enable', 1 ) == 0
					and get_theme_mod( 'context_blog_sidebar_quote_enable', 1 ) == 0
					and get_theme_mod( 'context_blog_sidebar_stay_connected_enable', 1 ) == 0
				) :
					?>
					 <div class="col-lg-12 col-md-12 detail-page-body"> 
					<?php
					else :
						?>
						<div class="col-lg-8 col-md-8 detail-page-body"> 
						<?php
					endif;
				else :
					?>
					 <div class="col-lg-12 col-md-12 detail-page-body"> 
					<?php
				endif;
else :
	?>
	<div class="inside-page">
	<div class="
	<?php
	if ( get_theme_mod( 'context_blog_sidebar_enable_page_detail', 1 ) == 1 ) :
		echo 'container';
else :
	echo 'no-sidebar no-container';
   endif;
?>
	">
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
					 <div class="col-lg-12 col-md-12 detail-page-body"> 
					<?php
				else :
					?>
					<div class="col-lg-8 col-md-8 detail-page-body"> 
					<?php
				endif;
			else :
				?>
				 <div class="col-lg-12 col-md-12 detail-page-body"> 
				<?php
			endif;
endif;

while ( have_posts() ) :
		the_post();
	?>
		<div class="detail-holder">
			<?php if ( is_home() || is_front_page() ) : ?>
				<h2 class="main-title"><?php the_title(); ?></h2> 
				<?php
			endif;
			if ( has_post_thumbnail() ) :
				?>
				<div class="img-holder">
				<?php the_post_thumbnail(); ?>
				</div>
				<?php
			endif;
			if ( ! ( ( is_home() || is_front_page() ) ) ) :
				context_blog_content_core_meta( $context_blog_meta, $context_blog_date, $context_blog_comment );
			endif;
			?>
			<div class = 'content'> 
			<?php
			the_content();
			?>
			 </div> 
			<?php
			wp_link_pages(
				array(
					'before'      => '<div class="text-center">' . __( 'Pages :', 'context-blog' ),
					'after'       => '</div>',
					'link_before' => '',
					'link_after'  => '',
				)
			);
			?>
			<div class="clearfix"> </div>
			
		</div>
		<?php if ( ! ( ( is_home() || is_front_page() ) ) ) : ?>
		<div class="detail-author-block">
			<h3 class="other-title"><?php esc_html_e( 'Author', 'context-blog' ); ?></h3>
			<div class="media">
				<div class="img-holder">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
				</div>
				<div class="media-body">
					<div class="title-share">
						<p class="mt-0"><?php the_author_meta( 'user_email' ); ?></p>
					</div>
			<?php the_author_meta( 'description' ); ?>
				</div>
			</div>
		</div>
			<?php
		endif;

		if ( get_edit_post_link() ) :

			edit_post_link(
				sprintf(
					wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'context-blog' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<div><span class="edit-link">',
				'</span></div>'
			);

		endif;
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
endwhile; // End of the loop.
?>
		</div>
		<?php if ( is_home() || is_front_page() ) : ?>
			<?php
			if ( get_theme_mod( 'context_blog_sidebar_enable_homepage', 1 ) == 1 ) :

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
		else :
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

		endif;
		?>
		</div>
		</div>
		</div>

<?php if ( is_home() || is_front_page() ) : ?>
	</section>
<?php else : ?>
</div >
<?php endif; ?>
