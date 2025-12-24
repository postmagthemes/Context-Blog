<?php
function context_blog_color_font_css() {
		/*///// backgorund color ////*/
	$main_background_color                = '#' . get_background_color();
	$introduction_enable_homepage         = get_theme_mod( 'context_blog_introduction_enable_homepage', 1 );
	$show_on_front                        = get_option( 'show_on_front' );
	$introduction_enable_blogpage         = get_theme_mod( 'context_blog_introduction_enable_blogpage', 1 );
	$background_color_site_title_homepage = get_theme_mod( 'context_blog_background_color_site_title_homepage', '#000' );
	$background_color_opacity_site_title  = get_theme_mod( 'context_blog_background_color_opacity_site_title', 0 );
	$header_image_enable_homepage         = get_theme_mod( 'context_blog_header_image_enable_homepage', 1 );
	$color_opacity_header_text_color      = get_theme_mod( 'context_blog_color_opacity_header_text_color', 1 );
	$header_image_enable_blogpage         = get_theme_mod( 'context_blog_header_image_enable_blogpage', 1 );
	$primary_theme_color                  = get_theme_mod( 'context_blog_theme_color_setting', '#73B66B' );
	$introduction_margin_homepage         = isset( $introduction_margin_homepage ) ? $introduction_margin_homepage : '';
	$introduction_margin_blog             = isset( $introduction_margin_blog ) ? $introduction_margin_blog : '';
	$detail_page_width                    = get_theme_mod( 'context_blog_singlepage_width', 100 ) . '%';
	$mainblog_width                       = get_theme_mod( 'context_blog_mainblog_width', 67 );
	$sidebar_width                        = ( 100 - $mainblog_width ) . '%';
	$context_blog_posttitle_font_family   = 'Josefin Sans';
	$context_blog_paragraph_font_family   = 'Roboto';

	if ( $header_image_enable_homepage == 0 and $show_on_front == 'page' ) :
		$introduction_margin_homepage = '-50px auto 0px auto';
	elseif ( $header_image_enable_homepage == 0 and $show_on_front == 'posts' ) :
		$introduction_margin_blog = '-50px auto 0px auto';
	endif;
	if ( $header_image_enable_blogpage == 0 and $show_on_front == 'page' ) :
		$introduction_margin_blog = '-50px auto 0px auto';
	endif;

	if ( has_header_image() ) :
		$header_image = get_header_image(); // Get the header image URL
		$header_image_height = ''; // Initialize variable to store header image height

		// Check if header image URL is not empty
		if ($header_image) :
			// Get image dimensions
			$image_size = wp_getimagesize($header_image);

			// Check if wp_getimagesize() returned an array
			if (is_array($image_size) && isset($image_size[1])) {
				// Calculate header image height
				$header_image_height = ($image_size[1] * (100 / 1460)) . 'vw';
			} 
		endif;
		
	elseif (get_theme_mod('context_blog_logo_location_onHeaderImage',0) == 1) :
		$header_image_height = '35vw';

	else:
		$header_image_height = '28vw';

	endif;

		$theme_css = '

			.btn-text,
			.footer a.btn-text,
			.sidebar a.btn-text,
			.btn-outline-primary,
			.breadcrumb li a:hover,
			address .address-block a:hover,
			address .address-block .fa,
			.header .t-header-holder span.site-title a:hover,
			#main-menu li.has-mega-menu ul a:hover,
			.social-links li a:hover,
			.image-inner-content .blog-snippet .blog-content .title a:hover,
			.sidebar-block.quote p .fa,
			.sidebar-block.quote p .fa,
			aside blockquote,
			.footer .news1 .blog-snippet .title a:hover,
			.footer .news2 .blog-snippet .title a:hover,
			.extra-info li:hover *,
			.social-share:hover *,
			.footer a:hover,
			.sidebar a:hover,
			h1 a:hover,
			h2 a:hover,
			h3 a:hover,
			h4 a:hover,
			h5 a:hover,
			h6 a:hover,
			.category-tag a,
			.messenger-container .btn.cancel,
			.inside-page .detail-holder .content a:hover,
			a:hover
			{
				color: ' . esc_attr( $primary_theme_color ) . ';
			}
			#scrollUp,
			.btn-primary,
			.btn-secondary:hover,
			.btn-outline-primary:hover,
			#main-menu li a.nav-link:after,
			#side-menu li a.nav-link:after,
			#main-menu li ul a.highlighted,
			#main-menu li a:focus,
			#side-menu li a:focus,
			#side-menu li ul a.highlighted,
			#main-menu li ul li a:before,
			#side-menu li ul li a:before,
			#main-menu li ul li a.has-submenu.text-dark,
			.social-links.bordered li a:hover,
			.slick-next,
			.slick-next:focus,
			.slick-prev:hover,
			.slick-dots li.slick-active button,
			.banner-author-holder .img-holder button,
			.wp-block-search__button:hover,
			.pagination li.active a,
			.pagination li:hover a,
			.pagination .page-numbers.current,
			.pagination .page-numbers:hover,
			.messenger-container .btn,
			.left-news-slider-block .count-news, 
			.right-news-slider-block .count-news
			{
				background-color: ' . esc_attr( $primary_theme_color ) . ' !important ;
			}
			.btn-outline-primary:hover,
			.social-links.bordered li a:hover,
			.banner-author-holder .img-holder button
			{
				border-color: ' . esc_attr( $primary_theme_color ) . ';
			}
			.btn-outline-primary{
				border: 1px solid ' . esc_attr( $primary_theme_color ) . ';
			}
			[class*=about-author-] .about-author-holder,
			.sidebar-title h2, .sidebar-title h3, .sidebar-title h4, .sidebar-title h5, .sidebar-title h6,
			.full-blog .full-blog-holder .item .caption,
			.breadcrumb-holder:before,
			.home-section .blog-snippet ,
			.home-section.inline-blog .blog-slider-thmb,
			.home-section.main-blog-holder aside > div,
			.home-section.main-blog-holder aside > blockquote,
			.static-page .detail-page-body,
			.static-page aside > div,
			.static-page aside > blockquote,
			.inside-page .detail-page-body,
			.inside-page .detail-page aside > div,
			.inside-page .detail-page aside > blockquote,
			.inside-page.archive .main-blog-body .blog-snippet .blog-content,
			.inside-page.archive aside > div,
			.inside-page.search .main-blog-body .blog-snippet .blog-content,
			.inside-page.search aside > div,
			.pagination .page-numbers,
			.left-float-post,
			.right-float-post,
			#masthead,
			#main-news .container,
			.left-news-slider-blog,
			.right-news-slider-blog,
			.center-news-slider-blog
			{
				background-color:' . esc_attr( $main_background_color ) . ';
			}
			.introduction-holder-right.no_bg_image,
			.introduction-holder-left.no_bg_image {
				border-left: 70vw solid ' . esc_attr( $main_background_color ) . ';
			}

			.its-static-page [class*=about-author-] {
				margin: ' . esc_attr( $introduction_margin_homepage ) . ';
			}
			.its-blog-page [class*=about-author-] {
				margin: ' . esc_attr( $introduction_margin_blog ) . ';
			}
			.banner-author-holder .img-holder.no-video:before {
				opacity: ' . esc_attr( $background_color_opacity_site_title ) . ';
			}
			.banner-author-holder .banner-author-info h1 a, 
			.banner-author-holder .banner-author-info p {
				opacity: ' . esc_attr( $color_opacity_header_text_color ) . ';
			}
			.banner-author-holder .img-holder:before,
			#wp-custom-header:before {
				background-color: ' . esc_attr( $background_color_site_title_homepage ) . ';
			}

			.banner-author .img-holder.no-video {
				min-height: ' . esc_attr( $header_image_height ) . ';
				
			}

			.editor-styles-wrapper h1 {
				font-family : ' . esc_attr( $context_blog_posttitle_font_family ) . '; 
			}
			.editor-styles-wrapper * { 
				font-family : ' . esc_attr( $context_blog_paragraph_font_family ) . '; 
				line-height: 1.8;
			}

			@media (min-width: 1200px) {
				.home-section.static-page .col-lg-8,
				.home-section.main-blog-holder .col-lg-8,
				.inside-page .col-lg-8 {
					flex: 0 0 ' . esc_attr( $mainblog_width ) . '%;
					max-width: ' . esc_attr( $mainblog_width ) . '%;
				}
				.home-section.static-page .col-lg-4,
				.home-section.main-blog-holder .col-lg-4,
				.inside-page .col-lg-4 {
					flex: 0 0 ' . esc_attr( $sidebar_width ) . ';
					max-width: ' . esc_attr( $sidebar_width ) . ';
				}
				.inside-page {
					width: ' . esc_attr( $detail_page_width ) . ';
					margin: auto;;
				}

			}

		';
				// Site-title Text Color for top header
		$site_title_text_color_detailedPage = esc_attr( get_theme_mod( 'context_blog_headertext_color_topheader' ) );
		if ( ! empty( $site_title_text_color_detailedPage ) ) {
			$theme_css .= 'p.site-title a,
		h1.site-title a { 
				color: ' . esc_attr( $site_title_text_color_detailedPage ) . ';
				}';
		};

		// Tag-line Text Color on the top of header
		$tagline_text_color_singlepage = esc_attr( get_theme_mod( 'context_blog_headertext_color_topheader' ) );
		if ( ! empty( $tagline_text_color_singlepage ) ) {
			$theme_css .= '.top-header p.site-description{ 
				color: ' . esc_attr( $tagline_text_color_singlepage ) . '; 
				}';
		};
		return apply_filters( 'context_blog_color_font_css', $theme_css );
}
