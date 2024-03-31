<?php
/**
 * File to sanitize customizer field
 *
 * @package context-blog
 * @since   1.0.0
 */

if ( ! function_exists( 'context_blog_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 *
	 * @since 1.0.0
	 *
	 * @param  bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function context_blog_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );

	}

endif;

if ( ! function_exists( 'context_blog_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.0
	 *
	 * @param  mixed                $input   The value to sanitize.
	 * @param  WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function context_blog_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;

if ( ! function_exists( 'context_blog_sanitize_image' ) ) :

	/**
	 * Sanitize image.
	 *
	 * @since 1.0.0
	 *
	 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
	 *
	 * @param  string               $image   Image filename.
	 * @param  WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return string The image filename if the extension is allowed; otherwise, the setting default.
	 */
	function context_blog_sanitize_image( $image, $setting ) {

		/**
		 * Array of valid image file types.
		 *
		 * The array includes image mime types that are included in wp_get_mime_types().
		*/
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
			'bmp'          => 'image/bmp',
			'tif|tiff'     => 'image/tiff',
			'ico'          => 'image/x-icon',
		);

		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );

		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );

	}

endif;

/**
 * switch option (show/hide)
 *
 * @since 1.0.0
 */
function context_blog_sanitize_switch_option( $input ) {
	$valid_keys = array(
		'show' => __( 'Show', 'context-blog' ),
		'hide' => __( 'Hide', 'context-blog' ),
	);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

function context_blog_sanitize_category( $input ) {
	$output = intval( $input );
	return $output;
}

/**
 * Drop-down Pages sanitization callback example.
 *
 * - Sanitization: dropdown-pages
 * - Control: dropdown-pages
 *
 * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
 * as an absolute integer, and then validates that $input is the ID of a published page.
 *
 * @see absint() https://developer.wordpress.org/reference/functions/absint/
 * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
 *
 * @param  int                  $page    Page ID.
 * @param  WP_Customize_Setting $setting Setting instance.
 * @return int|string Page ID if the page is published; otherwise, the setting default.
 */
function context_blog_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );

	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function context_blog_sanitize_float( $input ) {
	$input = abs( $input );
	return $input;
}