<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package context-blog
 */

get_header();
?> <main id="main" class = "site-main 
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
if ( ( get_theme_mod( 'context_blog_introduction_enable_homepage', 1 ) == 1 and get_option( 'show_on_front' ) == 'posts' )
	|| ( get_theme_mod( 'context_blog_introduction_enable_blogpage', 1 ) == 1 and get_option( 'show_on_front' ) == 'page' )
) :
	get_template_part( 'main-body/introduction', 'section' );
endif;

if ( ( get_theme_mod( 'context_blog_card_slider_enable_homepage', 1 ) == 1 and get_option( 'show_on_front' ) == 'posts' )
	|| ( get_theme_mod( 'context_blog_card_slider_enable_blogpage', 1 ) == 1 and get_option( 'show_on_front' ) == 'page' )
) :
	get_template_part( 'main-body/card-slider', 'section' );
endif;

if ( ( get_theme_mod( 'context_blog_full_screen_slider_enable_homepage', 1 ) == 1 and get_option( 'show_on_front' ) == 'posts' )
	|| ( get_theme_mod( 'context_blog_full_screen_slider_enable_blogpage', 1 ) == 1 and get_option( 'show_on_front' ) == 'page' )
) :
	get_template_part( 'main-body/full-screen-slider', 'section' );
endif;

if ( ( get_theme_mod( 'context_blog_gallery_slider_enable_homepage', 1 ) == 1 and get_option( 'show_on_front' ) == 'posts' )
	|| ( get_theme_mod( 'context_blog_gallery_slider_enable_blogpage', 1 ) == 1 and get_option( 'show_on_front' ) == 'page' ) ) :

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

if ( get_theme_mod( 'context_blog_home_main_blog_enable', 1 ) == 1 ) :

	if ( get_theme_mod( 'context_blog_mainblog_ads_enable', 0 ) == 1 ) :
		if ( ! context_blog_MainblogAdv_image_url() == null ) :
			$context_blog_image_width  = get_theme_mod( 'context_blog_mainblog_ads_image_width', 728 );
			$context_blog_image_height = get_theme_mod( 'context_blog_mainblog_ads_image_height', 90 );
			?>
		<div class= "advertise">
			<a href="<?php echo esc_url( get_theme_mod( 'context_blog_mainblog_ads_image_url' ) ); ?>" target = "_blank">
				<img width = "<?php echo esc_attr( $context_blog_image_width ); ?>" height="<?php echo esc_attr( $context_blog_image_height ); ?>"  src="<?php echo esc_url( context_blog_MainblogAdv_image_url() ); ?> " 
				alt="<?php echo esc_attr( get_post_meta( attachment_url_to_postid( context_blog_MainblogAdv_image_url() ), '_wp_attachment_image_alt', true ) ); ?>">
			</a>

		</div>
			<?php
		endif;
	endif;
	get_template_part( 'main-body/main-blog', 'section' );
endif;
?>
</main> 
<?php
get_footer();
