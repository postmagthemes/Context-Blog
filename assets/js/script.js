/*
  Version: 1.0.0
  Author: postmagtemes.com
  global window, document, define, jQuery, setInterval, clearInterval etc.
 
*/

jQuery(document).ready(
    function () {
        var replace = 'old';
        function handleTabPress(e) {
            const toggleButton = document.querySelector('.navbar-toggler');
            toggleButton.setAttribute('tabindex', -1);
            toggleButton.focus()
            toggleButton.setAttribute('tabindex', 0);
            e.preventDefault();
        }

        function setupResponsiveMenu(e) {
            if (window.innerWidth < 992) {
                if (document.querySelector("#main-menu > li:last-of-type") != null) {
                    document.querySelector("#main-menu > li:last-of-type").addEventListener("keydown", handleTabPress);
                }
            } else {
                if (document.querySelector("#main-menu > li:last-of-type") != null) {
                    document.querySelector("#main-menu > li:last-of-type").removeEventListener("keydown", handleTabPress);
                }
            }
        }

        window.addEventListener('resize', setupResponsiveMenu);
        setupResponsiveMenu();

        jQuery('.header .navbar-toggler.hamburger-mainmenu').click(
            function () {
                jQuery('.header .navbar-toggler #nav-icon').toggleClass('open');
            }
        );


        jQuery('.thumb-block').slick(
            {
                dots: false,
                infinite: true,
                arrows: true,
                speed: 500,
                slidesToShow: 3,
                autoplay: true,
                slidesToScroll: 1,
                fade: false,
                swipeToSlide: true,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            }
        );


        jQuery('.full-blog-holder').slick(
            {
                dots: false,
                infinite: true,
                arrows: true,
                speed: 500,
                slidesToShow: 1,
                autoplay: true,
                slidesToScroll: 1,
                fade: false,
                swipeToSlide: true
            }
        );


        jQuery('.blog-slider-main').slick(
            {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                autoplay: false,
                swipeToSlide: true,
                asNavFor: '.blog-slider-thmb',
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: true
                        }
                    }
                ]
            }
        );

        jQuery('.blog-slider-thmb').slick(
            {
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.blog-slider-main',
                centerMode: false,
                focusOnSelect: true,
                vertical: true,
                autoplay: false,
                swipeToSlide: true,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            vertical: false
                        },
                    }
                ]
            }
        );

        jQuery('.image-inner-block').slick(
            {
                dots: true,
                infinite: true,
                arrows: true,
                speed: 500,
                slidesToShow: 3,
                autoplay: true,
                slidesToScroll: 3,
                fade: false,
                swipeToSlide: true,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            }
        );

        jQuery('.sidebar-slider-content').slick(
            {
                infinite: true,
                arrows: false,
                speed: 500,
                slidesToShow: 1,
                autoplay: true,
                slidesToScroll: 1,
                swipeToSlide: true
            }
        );

        jQuery('.related-post').slick(
            {
                dots: false,
                infinite: true,
                arrows: true,
                speed: 500,
                slidesToShow: 2,
                autoplay: true,
                slidesToScroll: 1,
                fade: false,
                swipeToSlide: true,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            }
        );

        var headingArray = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
        headingArray.forEach(
            function (value, index, array) {

                jQuery(".sidebar-block.sidebar-block-title " + value).wrap('<div class="sidebar-title"></div>');
                jQuery(".sidebar-block.widget_block " + value).wrap('<div class="sidebar-title"></div>');

            }
        );


        function matchHeight(mainClass, changeclass) {
            // function change the css of targeted changeclass that depends on maincalss properties.

            var section_length1 = jQuery(mainClass).length;
            //Assign variable to push all height of columns 
            var column_height_array1 = [];

            // reset the value
            column_height_array1.length = 0;

            //Loop for push height of each column
            for (var i = 0; i < section_length1; i++) {
                column_height_array1.push(jQuery(mainClass + ':eq(' + i + ')').outerHeight());
                // alert(i);
            }
            //Get maximum height of the column
            var column_max_height1 = Math.max.apply(Math, column_height_array1);

            jQuery(changeclass).css('min-height', column_max_height1 + 'px');
            jQuery(changeclass).css('display', 'block');
        }

        // Maintaine equal height of all that posts which do not have image as equal to standard one that has image in full-screen slider.
        matchHeight('.full-blog .slick-slide .item .caption', '.full-blog .slick-slide .item');

        if (jQuery('.full-width .slick-slide .blog-snippet a').hasClass('img-holder')) {
            // In case, there are posts with image and without image in full-width sidebar slider.
            // Maintaine equal height of all that posts which do not have image as equal to standard one that has image. Here the elongated post title is shown trimed so that structure of image post is maintained.
            matchHeight('.full-width .slick-slide .blog-snippet img', '.full-width .slick-slide .blog-snippet');
            jQuery('.full-width .slick-slide .blog-snippet').css('display', 'block');


        } else {
            // In case ,there are only posts without image in full-width sidebar slider.
            // Maintaine equal height of all that posts as equal to same height to each other. Here the elongated post title is also shown without trim.
            matchHeight('.full-width .slick-slide .blog-content', '.full-width .slick-slide .blog-snippet');
        }

        jQuery(window).bind(
            'resize', function (e) {
                window.resizeEvt;
                jQuery(window).resize(
                    function () {
                        clearTimeout(window.resizeEvt);
                        window.resizeEvt = setTimeout(
                            function () {
                                var w = window.outerWidth;

                                if (jQuery('.full-width .slick-slide .blog-snippet a').hasClass('img-holder')) {
                                    // In case, there are posts with image and without image in full-width sidebar slider.
                                    // Maintaine equal height of all that posts which do not have image as equal to standard one that has image. Here the elongated post title is shown trimed so that structure of image post is maintained.
                                    matchHeight('.full-width .slick-slide .blog-snippet img', '.full-width .slick-slide .blog-snippet');
                                    // jQuery('.full-width .slick-slide .blog-snippet').not('a').css('background', '#555353');

                                } else {
                                    // In case ,there are only posts without image in full-width sidebar slider.
                                    // Maintaine equal height of all that posts as equal to same height to each other. Here the elongated post title is also shown without trim.
                                    matchHeight('.full-width .slick-slide .blog-content', '.full-width .slick-slide .blog-snippet');
                                }

                            }, 20
                        );
                    }
                );
            }
        );


        /*====================================
            Scrool Up
        ======================================*/
        const scrollPosition1 = window.scrollY;
        jQuery.scrollUp({
            scrollName: 'scrollUp',      // Element ID
            scrollDistance: 1000,         // Distance from top/bottom before showing element (px)
            scrollFrom: 'top',           // 'top' or 'bottom'
            scrollSpeed: 300,            // Speed back to top (ms)
            animationSpeed: 200,         // Animation speed (ms)
            scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
            scrollTarget: false,         // Set a custom target element for scrolling to. Can be element or number
            scrollText: ["<i class='fa fa-angle-double-up'></i>"], // Text for element, can contain HTML
            scrollTitle: false,          // Set a custom <a> title if required.
            scrollImg: false,            // Set true to use image
            activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647           // Z-Index for the overlay
        });

        // Function to check if the target div is in the viewport
        function isElementInViewport(el) {
            var elementTop = el.offset().top;
            var elementBottom = elementTop + el.outerHeight();
            var viewportTop = jQuery(window).scrollTop();
            var viewportBottom = viewportTop + jQuery(window).height();
            return elementBottom > viewportTop && elementTop < viewportBottom;
        }
        function onScroll() {
            var targetclass1 = jQuery('.top-header');
            var targetclass2 = jQuery('.banner-author-info .site-title');
            var targetclass3 = jQuery('.home-section');

            if (targetclass1.length > 0) {
                if (isElementInViewport(targetclass1)) {
                    const scrollPosition1 = window.scrollY;
                    jQuery(".top-header").css({ "opacity": 1 - scrollPosition1 * 0.005, "transform": 'translateY(' + -scrollPosition1 * 0.05 + 'px)' });
                    jQuery(".t-header-holder, .top-header .advertise").css({ "transform": 'translateY(' + -scrollPosition1 * 0.5 + 'px)' });
                }
            }

            if (targetclass2.length > 0) {
                if (isElementInViewport(targetclass2)) {

                    const scrollPosition2 = window.scrollY;
                    jQuery(".banner-author-info ").css({ "transform": 'scale(' + (1 - (scrollPosition2 * 0.0009)) + ',' + (1 - (scrollPosition2 * 0.0009)) + ') translateY(-35%)' });

                }
            }
            if (targetclass3.length > 0) {
                if (isElementInViewport(targetclass3)) {
                    const scrollPosition3 = window.scrollY;
                    jQuery(".custom-header").css({ "transform": 'scale(' + (1 + (scrollPosition3 * 0.0009)) + ',' + (1 + (scrollPosition3 * 0.0009)) + ')' });

                }
            }

        }


        // Attach the scroll event listener
        jQuery(window).on('scroll', onScroll);

        // Check on page load
        onScroll();
        // End 
        // change color

        // show fade animation upon scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                } else {
                    entry.target.classList.remove('visible'); // Optional
                }
            });
        }, {
            threshold: 0.05
        });

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });
        document.querySelectorAll('.fade-up').forEach(el => {
            observer.observe(el);
        });
        document.querySelectorAll('.fade-left').forEach(el => {
            observer.observe(el);
        });

        // hover on insta-video-hover
        jQuery('.insta-video-hover').hover(function toggleControls() {
            if (this.hasAttribute("controls")) {
                this.removeAttribute("controls")
            } else {
                this.setAttribute("controls", "controls")
            }
        })
        jQuery(function ($) {
            // AJAX pagination to load blog to its position after click on next page button
            jQuery('body').on('click', '.pagination a', function (e) {
                e.preventDefault();
                var link = $(this).attr('href');
                $.ajax({
                    type: 'GET',
                    url: link,
                    success: function (data) {
                        var $data = $(data);
                        var postWrapper = $data.find('.main-blog-body').html();

                        jQuery('.main-blog-body').html(postWrapper);
                        history.pushState(null, null, link);
                    }
                });
                setTimeout(function () {
                    jQuery('html, body').animate({
                        scrollTop: jQuery('.main-blog-holder').offset().top
                    });
                }, 300);

            });
        });
        jQuery('ul.sub-menu a').removeClass('nav-link');

    }
);


// below fix for tab and shift tab toggle inside sidepanel menu

window.lastTabbable = '';
var findInsiders = function (elem) {

    var tabbable = elem.find('input, button, a').filter(':visible');

    var firstTabbable = tabbable.first();

    if (tabbable.last().next().children().length == 0) {
        lastTabbable = tabbable.last();
    }
    else {
        tabbable.last().focus(function () {
            // alert('test');
            jQuery(this).addClass('show');
            tabbable.last().next().addClass('show');
        })

        tabbable.last().next().children().last().focusout(function () {
            tabbable.last().removeClass('show');
            tabbable.last().next().removeClass('show');
        });
        lastTabbable = tabbable.last().next().children().last();
    }


    /*set focus on first input*/
    firstTabbable.focus();

    /*redirect last tab to first input*/
    lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            firstTabbable.focus();
        }
    });

    /*redirect first shift+tab to last input*/
    firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            lastTabbable.focus();
        }
    });



};

function openNav() {
    jQuery("#sidepanel").css({ "width": "auto", "display": "block", "min-width": "250px" });
    findInsiders(jQuery('#sidepanel'));
}

function closeNav() {
    jQuery("#sidepanel").css({ "width": "0", "display": "none" });
    jQuery(".sidepanel-button-1").focus();
}

