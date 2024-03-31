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


if ( ! ( is_home() || is_front_page() ) ) :
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( ! is_home() && ( ! is_front_page() ) ) : ?>
			<header class="header">
			<?php context_blog_simple_breadcrumb(); ?>
			</header>    

		<?php
		endif;

		get_template_part( 'template-parts/content', 'page' );
		?>

	</article>
	<?php

else :
	?>
	<main id="main" class = "site-main 
	<?php
	if ( get_option( 'show_on_front' ) == 'page' and is_front_page() ) :
			echo 'its-static-page';
	elseif ( ! ( is_front_page() || is_home() ) ) :
		echo 'its-detail-page';
	else :
		echo 'its-blog-page';
	endif;
	?>
	"> 
	<?php

	if ( get_theme_mod( 'context_blog_introduction_enable_homepage', 1 ) == 1 ) :
		get_template_part( 'main-body/introduction', 'section' );
	endif;

	if ( get_theme_mod( 'context_blog_card_slider_enable_homepage', 1 ) == 1 ) :
		get_template_part( 'main-body/card-slider', 'section' );
	endif;

	if ( get_theme_mod( 'context_blog_full_screen_slider_enable_homepage', 1 ) == 1 ) :
		get_template_part( 'main-body/full-screen-slider', 'section' );
	endif;


	if ( get_theme_mod( 'context_blog_gallery_slider_enable_homepage', 1 ) == 1 ) :

		if ( get_theme_mod( 'context_blog_gallery_ads_enable', 0 ) == 1 ) :
			if ( ! context_blog_gallertAdv_image_url() == null ) :
				$context_blog_image_width  = get_theme_mod( 'context_blog_gallery_ads_image_width', 728 );
				$context_blog_image_height = get_theme_mod( 'context_blog_gallery_ads_image_height', 90 );
				?>
		<div class= "advertise">
			<a href="<?php echo esc_url( get_theme_mod( 'context_blog_gallery_ads_image_url' ) ); ?>" target = "_blank">
				<img width = "<?php echo esc_attr( $context_blog_image_width ); ?>" height="<?php echo esc_attr( $context_blog_image_height ); ?>"  src="<?php echo esc_url( context_blog_gallertAdv_image_url() ); ?> " 
				alt="<?php echo esc_attr( get_post_meta( attachment_url_to_postid( context_blog_gallertAdv_image_url() ), '_wp_attachment_image_alt', true ) ); ?>">
			</a>

		</div>
				<?php
			endif;
		endif;
		get_template_part( 'main-body/gallery-slider', 'section' );
	endif;

	dynamic_sidebar( 'frontpage-body' );

	get_template_part( 'template-parts/content', 'page' );
	?>

	</div>
	</main> 
	<?php
endif;
get_footer();