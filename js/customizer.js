/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$('.banner-author-holder .banner-author-info h1 a').css({
					color: to,
				});
				$('.banner-author-holder .banner-author-info p').css({
					color: to,
				});
			}
		} );
	} );

	//Update site background color...
	wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			var newval2 = '70vw solid ' + newval;
			$('[class*=about-author-] .about-author-holder').css('background-color', newval );
			$('.introduction-holder-right').css('border-left',  newval2);
			$('.introduction-holder-left').css('border-left',  newval2 );
			$('.full-blog-holder .item .caption').css('background-color',  newval );
			$('.sidebar-title h2').css('background-color',  newval );
			$('.sidebar-title h3').css('background-color',  newval );
			$('.sidebar-title h4').css('background-color',  newval );
			$('.sidebar-title h5').css('background-color',  newval );
			$('.sidebar-title h6').css('background-color',  newval );
			
			$('.home-section .blog-snippet').css('background-color',  newval );

			$('.home-section.inline-blog .blog-slider-thmb').css('background-color',  newval );

			$('.home-section.main-blog-holder aside > div').css('background-color',  newval );

			$('.static-page .detail-page-body').css('background-color',  newval );

			$('.static-page aside > div').css('background-color',  newval );

			$('.inside-page .detail-page-body').css('background-color',  newval );

			$('.inside-page .detail-page aside > div').css('background-color',  newval );

			$('.inside-page.archive .blog-snippet .blog-content').css('background-color',  newval );

			$('.inside-page.archive aside > div').css('background-color',  newval );

			$('.inside-page.search .blog-snippet .blog-content').css('background-color',  newval );

			$('.inside-page.search aside > div').css('background-color',  newval );

			$('.pagination .page-numbers').css('background-color',  newval );

			$('#masthead').css('background-color',  newval );

		} );
	} );
	
}( jQuery ) );
