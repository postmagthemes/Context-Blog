<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package context-blog
 */

?>    
	<div class="detail-holder">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="img-holder">
			<?php the_post_thumbnail(); ?>
			</div>
			<?php
		endif;
		$context_blog_meta    = get_theme_mod( 'context_blog_singlepage_' . __( 'meta', 'context-blog' ), 1 );
		$context_blog_date    = get_theme_mod( 'context_blog_singlepage_' . __( 'date', 'context-blog' ), 1 );
		$context_blog_comment = get_theme_mod( 'context_blog_singlepage_' . __( 'comment', 'context-blog' ), 1 );
		?>
		<div class="category-tag">
			<?php
			esc_html_e( 'In', 'context-blog' );
			the_category();
			?>
		</div>
		<?php
		context_blog_content_core_meta( $context_blog_meta, $context_blog_date, $context_blog_comment );
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
	<?php if ( get_edit_post_link() ) : ?>
		<?php
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
		?>
	<?php endif; ?>
	<div class="category-tag d-block mt-2 mb-2">
		<?php
		the_tags( '<ul class="m-auto"><li>', '</li><li>', '</li></ul>' );
		?>
	</div>
	<div class="comments-form"> 
		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>
		</div>
	<div class="detail-author-block">
		<h2 class="other-title"><?php esc_html_e( 'Author', 'context-blog' ); ?></h2>
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
	
	<?php get_template_part( 'inc/related-post' ); ?>
