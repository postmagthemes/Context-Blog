<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package context-blog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?> ">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<?php wp_body_open(); ?>

<div class="site"  >
	
	<?php if (is_home() || is_front_page()) : ?>
		<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'context-blog' ); ?></a>
	<?php else : ?>
		<a class="skip-link screen-reader-text" href="#expandable"><?php esc_html_e( 'Skip to content', 'context-blog' ); ?></a>
	<?php endif; ?>

	<header id="masthead" class="header 
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
		<div class="top-header <?php if(
			get_theme_mod( 'context_blog_top_header_ads_enable',0 ) == 0 && 
			get_theme_mod( 'context_blog_logo_location_top', 1 ) == 0 &&
			get_theme_mod( 'context_blog_topsite_title_location', 0 ) == 0 &&
			get_theme_mod( 'context_blog_header_social_enable', 1 ) == 0 &&
			get_theme_mod( 'context_blog_sidepanel_enable', 1 ) == 0 && ( is_home() or is_front_page() )
		): echo 'd-none'; endif; ?>" >
			<div class="container">
				<?php
				if ( get_theme_mod( 'context_blog_top_header_ads_enable' ) ) :
					if ( ! context_blog_headerAdv_image_url() == null ) :
						$context_blog_image_width  = get_theme_mod( 'context_blog_top_header_ads_image_width', 728 );
						$context_blog_image_height = get_theme_mod( 'context_blog_top_header_ads_image_height', 90 );
						?>
					<div class= "advertise">
						<a href="<?php echo esc_url( get_theme_mod( 'context_blog_top_header_ads_image_url' ) ); ?>" target = "_blank">
							<img width = "<?php echo esc_attr( $context_blog_image_width ); ?>" height="<?php echo esc_attr( $context_blog_image_height ); ?>"  src="<?php echo esc_url( context_blog_headerAdv_image_url() ); ?> " 
							alt="<?php echo esc_html( get_post_meta( attachment_url_to_postid( context_blog_headerAdv_image_url() ), '_wp_attachment_image_alt', true ) ); ?>">
						</a>

					</div>
						<?php
					endif;
				endif;
				?>
	
				<div class="t-header-holder" >
					
					<div class="logo col-lg-2 pl-0">

						<?php if ( get_theme_mod( 'context_blog_logo_location_top', 1 ) == 1 and ! get_custom_logo() == null ) : ?>
								<?php the_custom_logo(); ?>
						<?php endif; ?>
					
					</div>
					<div id ="site_tite" class ="col-lg-8">
						<?php
						if ( ! get_bloginfo( 'name' ) == '' ) :
							if ( is_home() or is_front_page() ) :
								if ( get_theme_mod( 'context_blog_topsite_title_location', 0 ) == 1 ) :
									?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								endif;
							elseif ( is_archive() or is_search() ) :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
										<!-- for single page -->
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								
								<?php
							endif;
						endif;
						?>
						 
					</div>
					
					<!-- This is for main desktop view -->
					<div class="s-links-panel col-lg-2 pr-0" >
						<?php if ( get_theme_mod( 'context_blog_header_social_enable', 1 ) == 1 ) : ?>
							<ul class="social-links 
							<?php
							if ( is_single() ) :
								echo 'single-page';
							endif;
							?>
							 ">
								<?php context_blog_social_links_items(); ?>
							</ul>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'context_blog_sidepanel_enable', 1 ) == 1 ) : ?>
							<button id = "opennavdesktop" title="opennavdesktop" class="openbtn sidepanel-button-1 
							<?php
							if ( is_single() ) :
								echo 'single-page';
							endif;
							?>
							  " onclick="openNav()" type="button">
								<span id="sidepanel-nav-icon">
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</span>
							</button>
						<?php endif; ?>
					</div>
				</div>
				<?php
				if ( is_home() or is_front_page() ) :
					if ( get_theme_mod( 'context_blog_topsite_title_location', 0 ) == 1 ) :
						?>
																
						<div class = "site-title-belowlogo">
							<?php
							$context_blog_description = get_bloginfo( 'description', 'display' );
							if ( $context_blog_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo esc_html( $context_blog_description ); ?></p>
							<?php endif; ?>
						</div>

					<?php endif; ?>
				<?php else : ?>
					<div class = "site-title-belowlogo">
						<?php
						$context_blog_description = get_bloginfo( 'description', 'display' );
						if ( $context_blog_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo esc_html( $context_blog_description ); ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<!-- end -->
										
			</div>
		</div>

		<div id="sidepanel" class="sidepanel" > 
			<?php
			if ( isset( $context_blog_sidepanel_menus ) ) :
				foreach ( $context_blog_sidepanel_menus as $sidepanel ) :
					?>
					<a href="<?php echo esc_url( $sidepanel->url ); ?>" title="<?php echo esc_attr( $sidepanel->title ); ?>"><?php echo esc_html( $sidepanel->title ); ?></a>
					<?php
				endforeach;
			endif;
			?>
			<a href="#" class="closebtn" onclick="closeNav()">×</a>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'sidepanel',
						'menu_id'        => 'side-menu',
						'menu_class'     => 'sm sm-clean nav navbar-nav ',
						'container'      => 'ul',
						'link_class'     => 'nav-link',
						'fallback_cb'    => 'context_blog_link_to_menu_editor',
						'depth'          => 1,
					)
				);
				?>
		</div>

		<nav class="site-navigation navbar-expand-lg">
			<div class="container">
				
				<button class="navbar-toggler hamburger-mainmenu" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span id="nav-icon">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</span>
				</button>
	  

				<!-- Sample menu definition -->
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'main-menu',
							'menu_class'     => 'sm sm-clean nav navbar-nav',
							'container'      => 'ul',
							'link_class'     => 'nav-link',
							'fallback_cb'    => 'context_blog_link_to_menu_editor',
							'depth'          => 6,
						)
					);
					?>
				</div>
						  <!-- This is for tab view and mobile view -->
						  <?php if ( get_theme_mod( 'context_blog_header_social_enable', 1 ) == 1 ) : ?>
					<ul class="social-links">
								<?php context_blog_social_links_items(); ?>
					</ul>
				<?php endif; ?>
				
				<?php

				if ( get_theme_mod( 'context_blog_sidepanel_enable', 1 ) == 1 ) :
					?>
					<button id = "opennavmobile" title="opennavmobile" class="openbtn navbar-toggler sidepanel-button-2" onclick="openNav()" type="button">
						<span id="sidepanel-nav-icon">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</span>
					</button>
					<?php
				endif;
				?>
			</div>
		</nav>
		<?php
		if ( get_option( 'show_on_front' ) == 'posts' ) :
			if ( ( is_home() || is_front_page() ) and get_theme_mod( 'context_blog_header_image_enable_homepage', 1 ) == 1 ) :
				get_template_part( 'main-body/banner', 'section' );
			endif;
		elseif ( get_option( 'show_on_front' ) == 'page' ) :
			if ( is_front_page() and get_theme_mod( 'context_blog_header_image_enable_homepage', 1 ) == 1 ) :
				get_template_part( 'main-body/banner', 'section' );
			endif;
			if ( is_home() and get_theme_mod( 'context_blog_header_image_enable_blogpage', 1 ) == 1 ) :
				get_template_part( 'main-body/banner', 'section' );
			endif;

		endif;
		?>
	</header>
