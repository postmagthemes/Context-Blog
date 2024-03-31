<?php

	$context_blog_section_number = 25;
	$context_blog_category       = get_theme_mod( 'context_blog_main_blog_' . __( 'category', 'context-blog' ), 1 );
	$context_blog_meta           = get_theme_mod( 'context_blog_main_blog_' . __( 'meta', 'context-blog' ), 1 );
	$context_blog_date           = get_theme_mod( 'context_blog_main_blog_' . __( 'date', 'context-blog' ), 1 );
	$context_blog_comment        = get_theme_mod( 'context_blog_main_blog_' . __( 'comment', 'context-blog' ), 1 );
	$context_blog_excerpt        = get_theme_mod( 'context_blog_main_blog_' . __( 'excerpt', 'context-blog' ), 1 );
	$context_blog_readmore       = get_theme_mod( 'context_blog_main_blog_readmore', 1 );
	$context_blog_modal          = get_theme_mod( 'context_blog_modal_popup_enable', 1 );
	$context_blog_tags           = get_the_category( $post->ID );
	if ( $context_blog_tags ) {
	$context_blog_tag_ids = array();
	foreach ( $context_blog_tags as $context_blog_individual_tag ) {
		$context_blog_tag_ids[] = $context_blog_individual_tag->term_id;
	}
	$context_blog_args     = array(
		'category__in'        => $context_blog_tag_ids,
		'orderby'             => 'date',
		'post__not_in'        => array( $post->ID ),
		'posts_per_page'      => 6,
		'ignore_sticky_posts' => 1,
	);
	$context_blog_my_query = new wp_query( $context_blog_args );
	if ( $context_blog_my_query->have_posts() ) { ?> 
		<div class="related-post-block">
				<h2 class="other-title"><?php echo esc_html( get_theme_mod( 'context_blog_single_page_related_post_text', __( 'Related Posts', 'context-blog' ) ) ); ?></h2> 
				<div class="related-post bordered">
					<?php
					while ( $context_blog_my_query->have_posts() ) {
						$context_blog_my_query->the_post();
						context_blog_content_core( $context_blog_section_number, $context_blog_category, $context_blog_meta, $context_blog_date, $context_blog_comment, $context_blog_excerpt, $context_blog_readmore, $context_blog_modal );

					}
					wp_reset_postdata();
					?>
				</div>                   
			</div> 
		<?php
	}
}
