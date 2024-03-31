<?php
function context_blog_home_introduction_enable() {
	$latestid                                     = 0;
	$context_blog_introduction_section_page_id[0] = get_theme_mod( 'context_blog_introduction_section_info', context_blog_pages( $latestid ) );
	   $args                                      = array(
		   'post_type'     => 'page',
		   'post_per_page' => 1,
		   'post__in'      => $context_blog_introduction_section_page_id,
		   'orderby'       => 'post__in',
	   );
	   $context_blog_word_limit                   = get_theme_mod( 'context_blog_introduction_section_excerpt_limit', 30 );
	   $aboutloop                                 = new WP_Query( $args );
	   if ( $aboutloop->have_posts() ) :
		   while ( $aboutloop->have_posts() ) :
			   $aboutloop->the_post(); ?>
  
	<section class="home-section about-author-1">
		<div class ="introduction-holder-right <?php if( get_background_image() ==null ): echo 'no_bg_image'; endif; ?> "></div>
		<div class ="introduction-holder-left <?php if( get_background_image() ==null ): echo 'no_bg_image'; endif; ?>"></div>
		<div class="container">
		<!-- <div class ="banner-author-holder-right"></div> -->
			<div class="about-author-holder">
						  <?php if ( has_post_thumbnail() ) : ?>
				<div class="img-holder">
								<?php the_post_thumbnail( 'context-blog-aboutme-350X350' ); ?>
				</div>
			   <?php endif; ?>
				<div class="info-holder">
					<h2 class="about-author-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>
						  <?php
							context_blog_content_core_meta( 1, 1, 0 );
							context_blog_word_limit( $context_blog_word_limit );
							?>
					
				</div>
			</div>
		</div>

	</section>
						  <?php
	   endwhile;
	   endif;
	   wp_reset_postdata();
}
context_blog_home_introduction_enable();
