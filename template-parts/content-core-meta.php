<?php
function context_blog_content_core_meta( $meta, $date, $comment ) {
	if ( $meta == 1 ) : ?>
	<ul class="extra-info">
		<?php if ( $date == 1 ) : ?>
			<li><span class="far fa-calendar" ></span> <?php context_blog_posted_on(); ?></li>
			<?php
		endif;
		if ( $comment == 1 ) :
			?>
			<li><span class="far fa-comment" ></span> <?php context_blog_post_comment(); ?></li>
		<?php endif; ?>
	</ul>
		<?php
endif;

}
