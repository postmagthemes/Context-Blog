<?php
// here is the content core for all the sections including blog post

function context_blog_content_core( $section, $category, $meta, $date, $comment, $excerpt, $readmore, $modal ) {
// section 2 = card slider, 3 = full width slider , 4 = gallery slider, 5 = leaflet slider, 6 = left news, 7 = right news, 8 = center news, 9 = scroll news,
	// 10 = grid column news 11 = more grid column, 13 = roll slide, 14 = mix grid, 20 = main blog, 21 = sidebar full width, 22 = footer news , 23 = archive , 24 = search, 25 = related post
	global $context_blog_count_mainblog;
	global $context_blog_count_post;

	$context_blog_word_limit_related = get_theme_mod( 'context_blog_related_posts_limit', 22 ); ?>

	<div class=" hover-trigger flex-container
		<?php
		if ( $section == 2 || $section == 6 || $section == 7 || $section == 8 || $section == 9 ||  $section == 10 ||  $section == 14 || $section == 12 || $section == 21 || $section == 25 ) :
			echo 'blog-snippet';
				elseif ( $section == 3 ) :
					echo 'item';
				elseif ( $section == 4 ) :
					echo 'blog-snippet md align-items-center';
				elseif ( $section == 20 or $section == 23 or $section == 24 ) :
					echo 'blog-snippet md main-blog-snippet item';
				elseif ( $section == 22 ) :
					echo 'blog-snippet xs';
					if ( has_post_thumbnail() ) :
						echo ' hasImage';
					endif;
				endif;
				?>
				 " >
		<?php
		if ( $section == 2 ) :
			$context_blog_word_limit = get_theme_mod( 'context_blog_card_slider_excerpt_limit', 22 );
			if ( has_post_thumbnail() ) :
				?>
				<a href="<?php the_permalink(); ?>" class="img-holder" aria-label='<?php the_title(); ?>' >
					<?php the_post_thumbnail( 'context-blog-card-slider-382X271' ); ?>
				</a>
				<?php

			endif;
		elseif ( $section == 3 ) :
			$context_blog_word_limit = get_theme_mod( 'context_blog_full_screen_slider_excerpt_limit', 25 );
			if ( has_post_thumbnail() ) :
				?>
				<a href="<?php the_permalink(); ?>" class="img-holder">
					<?php the_post_thumbnail( 'context-blog-full-screen-slider-1440X550' ); ?>
			</a>
				<?php

			endif;
			
		elseif ( $section == 4 ) :
			$context_blog_word_limit = get_theme_mod( 'context_blog_gallery_slider_excerpt_limit', 25 );
			if ( has_post_thumbnail() ) :
				?>
				<a href="<?php the_permalink(); ?>" class="img-holder" aria-label='<?php the_title(); ?>'>
					<?php the_post_thumbnail( 'context-blog-gallery-slider-1-510X497' ); ?>                    
				</a>
				<?php
			endif;
		elseif ( $section == 8) :
			$context_blog_word_limit = get_theme_mod( 'context_blog_centernews_excerpt_limit', 22 );
			if ( has_post_thumbnail() ) :
				?>
				<div class = "wrapper_centernews">
					<a href="<?php the_permalink(); ?>" class="img-holder" aria-label='<?php the_title(); ?>'>
						<?php the_post_thumbnail('context-blog-center-image-785X485'); ?>
					</a>
				</div>
				<?php
			endif;
		elseif ( $section == 10 ) :
			$context_blog_word_limit = get_theme_mod( 'context_blog_grid_column_excerpt_limit', 22 );
			if ( has_post_thumbnail() ) :
				?>
				<a href="<?php the_permalink(); ?>" class="img-holder" aria-label='<?php the_title(); ?>'>
					<?php the_post_thumbnail('context-blog-center-image-785X485'); ?>
				</a>
				<?php
			endif;
		elseif ( $section == 14 ) :
			$context_blog_word_limit = get_theme_mod( 'context_blog_max_grid_column_excerpt_limit', 22 );
			if ( has_post_thumbnail() ) :
				?>
				<a href="<?php the_permalink(); ?>" class="img-holder" aria-label='<?php the_title(); ?>'>
					<?php the_post_thumbnail('context-blog-center-image-785X485'); ?>
				</a>
				<?php
			endif;
		elseif ( $section == 20 or $section == 23 or $section == 24 ) :
			$context_blog_word_limit = get_theme_mod( 'context_blog_main_blog_excerpt_limit', 22 );
			if ( has_post_thumbnail() ) :
				?>
				<a href="<?php the_permalink(); ?>" class="img-holder" aria-label='<?php the_title(); ?>'>
					<?php
					if ( get_theme_mod( 'context_blog_main_blog_design', 2 ) == 1 || ( get_theme_mod( 'context_blog_main_blog_design', 2 ) == 2 and $context_blog_count_mainblog == 1 ) ) :
						the_post_thumbnail( 'context-blog-main-blog-1-1200X630' );
					else :
						the_post_thumbnail( 'context-blog-main-blog-2-538X382' );
					endif;
					?>
				</a>
				<?php
			endif;
		elseif ( $section == 21 ) :
			if ( has_post_thumbnail() ) :
				?>
				<a href="<?php the_permalink(); ?>" class="img-holder" aria-label='<?php the_title(); ?>'>
					<?php the_post_thumbnail( 'context-blog-leaflet-slider-sidbarlatest-510X724' ); ?>                    
				</a>
				<?php
				else : ?>
				<a href="<?php the_permalink(); ?>" class="img-holder" aria-label='<?php the_title(); ?>'>

				<img  class="img-holder" src = "<?php echo esc_url( get_template_directory_uri() ); ?>/images/leaflet-slider.jpg " >
                    
				</a><?php
			endif;
		elseif ( $section == 22 ) :
			if ( has_post_thumbnail() ) :
				?>
				<a href="<?php the_permalink(); ?>" class="img-holder" aria-label='<?php the_title(); ?>'>
					<?php the_post_thumbnail( 'thumbnail' ); ?>                    
				</a>
				<?php
			endif;
		elseif ( $section == 9 ) :
			if ( has_post_thumbnail() ) :
				?>
				<a href="<?php the_permalink(); ?>" class="img-holder" aria-label='<?php the_title(); ?>'>
					<?php the_post_thumbnail( 'thumbnail' ); ?>                    
				</a>
				<?php
			endif;
		elseif ( $section == 7 || $section == 6 ) :
			if ( has_post_thumbnail() ) :
				?>
				<a href="<?php the_permalink(); ?>" class="img-holder" aria-label='<?php the_title(); ?>'>
					<?php the_post_thumbnail( 'thumbnail' ); ?>                    
				</a>
				<?php
			endif;
		elseif ( $section == 25 ) :
			$context_blog_word_limit = get_theme_mod( 'context_blog_related_posts_limit', 22 );
			if ( has_post_thumbnail() ) :
				?>
				<a href="<?php the_permalink(); ?>" class="img-holder" aria-label='<?php the_title(); ?>'>
					<?php the_post_thumbnail( 'context-blog-main-blog-2-538X382' ); ?>                    
				</a>
				<?php
			endif;
		endif;

		if ( has_post_thumbnail() ):
			if ( $section == 2 or $section == 4 or $section == 5 or $section == 6 or $section == 7 or $section == 8 or $section == 9 or $section == 10 or  $section == 14 or $section == 12 or $section == 20 or $section == 21 or $section == 22 or $section == 23 or $section == 24 or $section == 25 ) :
				?> <div class="blog-content yes_image"> <?php
			
			elseif ( $section == 3 ) :
			
				?> <div class="caption yes_image"> <?php
			
			endif;

		else :
			if ( $section == 2 or $section == 4 or $section == 5 or $section == 6 or $section == 7 or $section == 8 or $section == 9 or $section == 10 or  $section == 14 or $section == 12 or $section == 20 or $section == 21 or $section == 22 or $section == 23 or $section == 24 or $section == 25 ) :
				?> <div class="blog-content no_image"> <?php
			
			elseif ( $section == 3 ) :
			
				?> <div class="caption no_image"> <?php
			
			endif;
		endif;
		// this is for more post of grid column only even though there is image but need to stop showing it
		if ($section == 11) :
			?> <div class="blog-content no_image"> <?php
		endif;

		if ( $category == 1 ) : ?>
			<div class="category-tag">
				<?php
				esc_html_e( 'In', 'context-blog' );
				the_category();
				?>
			</div>
		<?php endif; 

		if ($section == 6 || $section == 7 ) : ?>
			<div class = "left-right-countnews">
				<p class="count-news"><?php echo esc_html($context_blog_count_post)?></p>
				<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			</div>
		<?php else : ?>
			<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php endif;
		
		context_blog_content_core_meta( $meta, $date, $comment ); 
		if ( $excerpt == 1 ) :
			context_blog_word_limit( $context_blog_word_limit );
		endif;
		if ( $category == 1 ) : 
			if ( get_the_tags()): ?>
			<div class="category-tag d-flex">
				<?php the_tags( '<ul class="m-0"><li>', '</li><li>', '</li></ul>' ); ?>
			</div>
			<?php endif;
		endif;
		if ( $readmore == 1 ) :
			?>
			<a href="<?php the_permalink(); ?>" aria-label=' <?php esc_html_e( 'Read out all', 'context-blog' ); ?>' class="
			<?php if ( $modal == 1 ) : echo 'readmore-modal'; endif; ?> btn 
			<?php if ( $section == 2 or $section == 4 or $section == 10 or $section == 14 or $section == 11 or $section == 12 or $section == 20 or $section == 23 or $section == 24 or $section == 25 ) :
			echo 'btn-text'; elseif ( $section == 3 ) : echo 'btn-outline-primary'; endif; ?> " data-modal="<?php echo absint( get_the_ID() ); ?>">
			<?php esc_html_e( 'Read out all', 'context-blog' ); ?> </a>
		<?php endif ?>
		</div> 
	</div> 
	<?php $context_blog_count_post = $context_blog_count_post +1;
};
