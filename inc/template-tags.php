<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package context-blog
 */

if ( ! function_exists( 'context_blog_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function context_blog_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( get_option( 'date_format' ) ) ),
			esc_html( get_the_date( get_option( 'date_format' ) ) )
		);

		$posted_on = sprintf(
		/* translators: %s: post date. */
			esc_html( '%s', 'post date' ),
			'<a href="' . esc_url( get_month_link( esc_html( get_the_time( 'Y' ) ), esc_html( get_the_time( 'm' ) ) ) ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on ">' . $posted_on . '</span>';
	}
endif;

if ( ! function_exists( 'context_blog_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function context_blog_posted_by() {
		$byline = sprintf(
		/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'context-blog' ),
			'<span class="author vcard mr-auto">
			<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '&nbsp' . '</span>';

	}
endif;
if ( ! function_exists( 'context_blog_post_comment' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function context_blog_post_comment() {

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( __( '0', 'context-blog' ), __( '1', 'context-blog' ), __( '%', 'context-blog' ) );
			echo '</span>';
		} else {
			echo '<span class="comments-link">';
			echo ( absint( get_comments_number() ) );
			echo '</span>';
		}

	}
endif;
