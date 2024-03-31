<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package context-blog
 */

get_header();
?>

<section class="page-404 error-404 not-found">
	<div class="container">
		<div class="row">
	   
				<header class="page-header">
					<h1 class="page-title m-5"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'context-blog' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content m-5 ">
					<p class="m-5"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'context-blog' ); ?></p>

					<?php
					get_search_form();
					?>

				</div><!-- .page-content -->
	</div>
</section>
<?php
get_footer();
