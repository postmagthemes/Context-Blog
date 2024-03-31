jQuery(window).scroll(
    function () {
        /*
        this will make post tile small after srcoll in singel page
        */
        var scroll = jQuery(window).scrollTop();

        if (scroll >= 50) {
            jQuery('.bread-title').css('font-size', '25px');
            jQuery('.breadcrumb-item').css('font-size', '12px');
            jQuery('.breadcrumb').css('padding-top', '0');
            jQuery('.breadcrumb-holder').css('transition', '.5s');
            jQuery('.breadcrumb-holder').css('padding', '10px 0');
            jQuery('.breadcrumb-holder, article .header').css('z-index', '99999');
        }
        if (scroll <= 110) {
            jQuery('.bread-title').css('font-size', '36px');
            jQuery('.breadcrumb-item').css('font-size', '16px');
            jQuery('.breadcrumb').css('padding-top', '10px');
            jQuery('.breadcrumb-holder').css('padding', '40px 0');
            jQuery('.breadcrumb-holder').css('transition', '.5s');
            jQuery('.breadcrumb-holder, article .header').css('z-index', '-1');

        }

    }
);