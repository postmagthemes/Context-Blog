<?php
function context_blog_modal_popup() {
	$postId       = isset( $_POST['postID'] ) ? $_POST['postID'] : 0;
	$FullviewText = __( 'Full view', 'context-blog' );
	$modalHeader  = '<a class="btn btn-primary" href="' . esc_url( get_the_permalink( $postId ) ) . '">' . esc_html( $FullviewText ) . '</a>';
	$content_post = get_post( $postId );
	$modalBody    = $content_post->post_content;
	$closeText    = __( 'Close', 'context-blog' );
	$modalFooter  = '<button type="button" class="btn btn-primary" data-dismiss="modal">' . esc_html( $closeText ) . '</button>';
	$return       = array(
		'modalHeader' => $modalHeader,
		'modalBody'   => $modalBody,
		'modalFooter' => $modalFooter,
	);
	return wp_send_json( $return );
	die();
}
add_action( 'wp_ajax_nopriv_context_blog_modal_popup', 'context_blog_modal_popup' );
add_action( 'wp_ajax_context_blog_modal_popup', 'context_blog_modal_popup' );
