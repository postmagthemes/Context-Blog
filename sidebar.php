<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package context-blog
 */

if ( ! is_active_sidebar( 'sidebar-1' )
	and get_theme_mod( 'context_blog_sidebar_about_author_enable', 1 ) == 0
	and get_theme_mod( 'context_blog_sidebar_latest_blog_enable', 1 ) == 0
	and get_theme_mod( 'context_blog_sidebar_quote_enable', 1 ) == 0
	and get_theme_mod( 'context_blog_sidebar_stay_connected_enable', 1 ) == 0
) :
	return;
endif;
?>

<aside id="secondary" class="sidebar widget-area">
	<?php get_template_part( 'sidebar/full-width', 'slider' ); ?>
	<?php get_template_part( 'sidebar/about-author', 'section' ); ?>
	<?php get_template_part( 'sidebar/stay', 'connected' ); ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php get_template_part( 'sidebar/quote' ); ?>
</aside><!-- #secondary -->
