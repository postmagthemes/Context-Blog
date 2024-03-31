<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package context-blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param  array $classes Classes for the body element.
 * @return array
 */
function context_blog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'context_blog_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function context_blog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'context_blog_pingback_header' );

// Social Links
if ( ! function_exists( 'context_blog_social_links_items' ) ) :
	function context_blog_social_links_items() {
		$defaults     = array(
			array(
				'font' => 'fab fa-facebook-f',
				'link' => '#',
			),
			array(
				'font' => 'fab fa-instagram',
				'link' => '#',
			),
			array(
				'font' => 'fab fa-linkedin',
				'link' => '#',
			),
			array(
				'font' => 'fab fa-behance',
				'link' => '#',
			),
		);
		$social_items = get_theme_mod( 'social_links_items', $defaults );
		if ( $social_items ) {
			foreach ( $social_items as $social ) {
				$strip_social = substr( $social['font'], 7 );
				?>
				<li><a href="<?php echo esc_url( $social['link'] ); ?>"  aria-label='<?php echo esc_attr( $strip_social ); ?>'><span class="<?php echo esc_attr( $social['font'] ); ?>" aria-hidden="true"></span></a></li>
				<?php
			}
		}
	}
endif;


if ( ! function_exists( 'context_blog_introduction_social_links_items' ) ) :
	function context_blog_introduction_social_links_items() {
		$defaults = array(
			array(
				'font' => 'fab fa-facebook',
				'link' => '#',
			),
			array(
				'font' => 'fab fa-instagram',
				'link' => '#',
			),
			array(
				'font' => 'fab fa-linkedin',
				'link' => '#',
			),

		);
		$social_items = get_theme_mod( 'context_blog_introduction_social_links_items', $defaults );
		if ( $social_items ) {
			foreach ( $social_items as $social ) {
				$strip_social = substr( $social['font'], 7 );
				?>
				<li><a href="<?php echo esc_url( $social['link'] ); ?>" aria-label='<?php echo esc_attr( $strip_social ); ?>'><span class="<?php echo esc_attr( $social['font'] ); ?>" aria-hidden="true"></span></a></li>
				<?php
			}
		}
	}
endif;

function context_blog_category_title( $title ) {
	/**
	   * Hide category word from archive title.
	   */
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'context_blog_category_title' );

if ( ! function_exists( 'context_blog_word_limit' ) ) :
	function context_blog_word_limit( $context_blog_word_limit ) {
		?>
		 <p class="excerpt text-justify" > <?php echo esc_html( wp_trim_words( get_the_excerpt(), absint( $context_blog_word_limit ), '...' ) ); ?> </p> 
		<?php
	}
endif;


if ( ! function_exists( 'context_blog_simple_breadcrumb' ) ) :
	/**
	 * Simple breadcrumb.
	 */
	function context_blog_simple_breadcrumb() {
		?>
		<div class="breadcrumb-holder" >
				<div class="container">
					<div id="expandable" >
		<?php
		if ( is_archive() ) {
			if ( get_bloginfo( 'name' ) == '' ) :
				the_archive_title( '<h1 class="entry-title bread-title">', '</h1>' );
		 else :
			 the_archive_title( '<h2 class="entry-title bread-title">', '</h2>' );

		 endif;
		} elseif ( is_search() ) {
			?>
			 <h2 class = " entry-title bread-title" > 
			<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Result For: %s', 'context-blog' ), '<span>' . get_search_query() . '</span>' );
			?>
</h2> 
			<?php
		} else {
			?>
							
							<h1  class="title bread-title"><?php the_title(); ?></h2>
							
		<?php } ?> 

					</div>
											
					<nav aria-label="breadcrumb">
		<?php context_blog_breadcrumb_trail(); ?>
					</nav>
				</div>
			</div> 
			<?php
	}
endif;

if ( ! function_exists( 'context_blog_pages' ) ) :
	function context_blog_pages( $latestid ) {
		/**
		   * get page id sort by alphabettically DESC (which is the bottom in page list)
		   */
		$pages = get_pages();
		foreach ( $pages as $page ) {
			$latestid = $page->ID;
		}
		return $latestid;
	}
endif;

function context_blog_get_bio_image_url() {
	 /**
	   * get cropped image fo about author
	   */
	if ( get_theme_mod( 'context_blog_sidebar_about_image' ) > 0 ) {
		return wp_get_attachment_url( get_theme_mod( 'context_blog_sidebar_about_image' ) );
	}
}
function context_blog_headerAdv_image_url() {
	/**
		* get cropped image fo about author
		*/
	if ( get_theme_mod( 'context_blog_top_header_ads_image' ) > 0 ) {
		return wp_get_attachment_url( get_theme_mod( 'context_blog_top_header_ads_image' ) );
	}
}

function context_blog_gallertAdv_image_url() {
	/**
		 * get cropped image fo about author
		 */
	if ( get_theme_mod( 'context_blog_gallery_ads_image' ) > 0 ) {
		return wp_get_attachment_url( get_theme_mod( 'context_blog_gallery_ads_image' ) );
	}
}

function context_blog_MainblogAdv_image_url() {
	 /**
	   * get cropped image fo about author
	   */
	if ( get_theme_mod( 'context_blog_mainblog_ads_image' ) > 0 ) {
		return wp_get_attachment_url( get_theme_mod( 'context_blog_mainblog_ads_image' ) );
	}
}

function context_blog_video_controls( $settings ) {
	 $settings['l10n']['play'] = '';
	$settings['l10n']['pause'] = '';
	$settings['minWidth']      = '50';
	$settings['minHeight']     = '50';
	return $settings;
}
add_filter( 'header_video_settings', 'context_blog_video_controls' );

function context_blog_editor_styles() {
	$classic_editor_styles = array(
		'/assets/css/editor-style.css',
	);

	add_editor_style( $classic_editor_styles );
}

add_action( 'init', 'context_blog_editor_styles' );

/**
 * Here we are displaying the header video in all pages:
 */
function context_blog_video_header_pages( $active ) {
	return true;
}

add_filter( 'is_header_video_active', 'context_blog_video_header_pages' );


// Remove issues with prefetching adding extra views.
if ( is_admin() ) {
	// Load about.

	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/class-about.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/about.php';
}

// Menu Icons

function context_blog_nav_menu_css_class( $classes ) {

	if ( is_array( $classes ) ) {
		$tmp_classes = preg_grep( '/^(fa)(-\S+)?$/i', $classes );
		if ( ! empty( $tmp_classes ) ) {
			$classes = array_values( array_diff( $classes, $tmp_classes ) );
		}
	}
	return $classes;
}

/*************** menu title and icon *************************/

function context_blog_walker_nav_menu_start_el( $item_output, $item, $depth, $args ) {
	if ( is_array( $item->classes ) ) {
		$classes = preg_grep( '/^(fa)(-\S+)?$/i', $item->classes );
		if ( ! empty( $classes ) ) {
			$item_output = context_blog_replace_item( $item_output, $classes );
		}
	}

	if ( 'primary' == $args->theme_location && $item->attr_title ) {
		$item_output = str_replace( '</a>', '<span class="menu-description">' . $item->attr_title . '</span></a>', $item_output );
	}

	return $item_output;
}


function context_blog_replace_item( $item_output, $classes ) {

	$spacer = '';

	if ( ! in_array( 'fa', $classes ) ) {
		array_unshift( $classes, 'fa' );
	}

	$before = true;
	if ( in_array( 'fa-after', $classes ) ) {
		$classes = array_values( array_diff( $classes, array( 'fa-after' ) ) );
		$before  = false;
	}

	$icon = '<i class="' . implode( ' ', $classes ) . '"></i>';

	preg_match( '/(<a.+>)(.+)(<\/a>)/i', $item_output, $matches );
	if ( 4 === count( $matches ) ) {
		$item_output = $matches[1];
		if ( $before ) {
			$item_output .= $icon . '<span class="fontawesome-text">' . $spacer . $matches[2] . '</span>';
		} else {
			$item_output .= '<span class="fontawesome-text">' . $matches[2] . $spacer . '</span>' . $icon;
		}
		$item_output .= $matches[3];
	}
	return $item_output;
}


add_filter( 'nav_menu_css_class', 'context_blog_nav_menu_css_class', 10, 3 );
add_filter( 'walker_nav_menu_start_el', 'context_blog_walker_nav_menu_start_el', 10, 4 );

/**
 * Menu fallback. Link to the menu editor if that is useful.
 *
 * @param  array $args
 * @return string
 */
function context_blog_link_to_menu_editor( $args ) {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// see wp-includes/nav-menu-template.php for available arguments
	extract( $args );

	$link = $link_before
		. '<a href="' . admin_url( 'nav-menus.php' ) . '">' . $before . 'Add a menu' . $after . '</a>'
		. $link_after;

	// We have a list
	if ( false !== stripos( $items_wrap, '<ul' )
		or false !== stripos( $items_wrap, '<ol' )
	) {
		$link = "<li>$link</li>";
	}

	$output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
	if ( ! empty( $container ) ) {
		$output = "<$container class='$container_class' id='$container_id'>$output</$container>";
	}

	if ( $echo ) {
		echo $output;
	}

	return $output;
}

// this will decrease the post tile to character 30 and add .. at the end if it is more than 30, need to
// use context_blog_the_title() instead of the_title()

function context_blog_the_title( $before = '', $after = '', $display = true ) {
	$title = get_the_title();

	if ( strlen( $title ) === 0 ) {
		return;
	}


	$title = $before . $title . $after;

	if ( $display ) {
		
		$max = 47;
		if( strlen( $title ) > $max ) {
			echo substr( $title, 0, $max ). " ....";
		} else {
			echo $title;
		}
		
	} else {
		return $title;
	}
}
