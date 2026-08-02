<?php
function context_blog_modal_popup() {

    // 1. At the top of your AJAX handler, verify it before doing anything
    if ( ! check_ajax_referer( 'context_blog_nonce', 'nonce', false ) ) {
        wp_send_json_error( array( 'message' => __( 'Security check failed.', 'context-blog' ) ) );
        die();
    }
    $postId = isset( $_POST['postID'] ) ? intval( $_POST['postID'] ) : 0;
    if ( ! $postId ) {
        wp_send_json_error( array( 'message' => __( 'Invalid post ID.', 'context-blog' ) ) );
        die();
    }

    $content_post = get_post( $postId );
    if ( ! $content_post ) {
        wp_send_json_error( array( 'message' => __( 'Post not found.', 'context-blog' ) ) );
        die();
    }

    // block access to password-protected posts
    if ( post_password_required( $content_post ) ) {
        wp_send_json_error( array( 'message' => __( 'Password protected. Please view in detail to enter password ', 'context-blog' ) ) );
        die();
    }
    // Only allow published posts for unauthenticated users
    if ( 'publish' !== $content_post->post_status ) {
        if ( ! current_user_can( 'edit_post', $postId ) ) {
            wp_send_json_error( array( 'message' => __( 'Unauthorized access.', 'context-blog' ) ) );
            die();
        }
    }

    $FullviewText = __( 'Full view', 'context-blog' );
    $modalHeader  = '<a class="btn btn-primary" href="' . esc_url( get_the_permalink( $postId ) ) . '">' . esc_html( $FullviewText ) . '</a>';
    $modalBody    = $content_post->post_content;
    $closeText    = __( 'Close', 'context-blog' );
    $modalFooter  = '<button type="button" class="btn btn-primary" data-dismiss="modal">' . esc_html( $closeText ) . '</button>';
    $return       = array(
        'modalHeader' => $modalHeader,
        'modalBody'   => $modalBody,
        'modalFooter' => $modalFooter,
    );
    wp_send_json( $return );
    die();
}
add_action( 'wp_ajax_nopriv_context_blog_modal_popup', 'context_blog_modal_popup' );
add_action( 'wp_ajax_context_blog_modal_popup', 'context_blog_modal_popup' );