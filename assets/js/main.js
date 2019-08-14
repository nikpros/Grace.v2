jQuery(function($){
    $(document).ready(function() {

        // Add the User Agent to the <html>
        // will be used for IE10 detection (Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0))
        var doc = document.documentElement;
        doc.setAttribute('data-useragent', navigator.userAgent);

        // *********** Блок перерисовки header **************** //
        function heightDetect() {
            var header_height = $('header').outerHeight();
            var nav_height = $('nav').outerHeight();
            var header_banner_height = $('.header-banner').outerHeight();
            var header_extra_height = header_height - nav_height - header_banner_height;
            $('.header-extra').css('height', header_extra_height);
        }
        heightDetect();
        $(window).resize(function() {
            heightDetect();
        })
        //******************************************************* */
        
        // *********** Блок затемнения header **************** //
        $(window).scroll(function() {
            var header_height = $('header').outerHeight();
            // var nav_height = $('nav').outerHeight();
            var header_factor = header_height/100;
            var cursor = $(document).scrollTop();
            var alpha;
            if (cursor) {
                alpha = cursor/header_factor * 0.008;
            } else alpha = 0;
            $('header').css('box-shadow', `inset 0px 0px 20px ${header_height/2}px rgba(0,0,0,${alpha})`);
        })
        //******************************************************* */

        // *********** Блок появления header при скролле **************** //
        $('#leader').waypoint(function(direction){
            if (direction == 'down') {
                $('nav').addClass('sticky scrolling animated fadeInDown');
            } else {
                $('nav').removeClass('fadeInDown').addClass('fadeOutUp');
                setTimeout(()=> {
                        $('nav').removeClass('sticky scrolling animated fadeOutUp')
                }, 500)
        }}, {offset: '0px'})
        //******************************************************* */

        function windowSize(){
            $('.preheader').css('background-color', 'transparent');
            if ($(window).width() < '1200'){
                $('.nav-block').css('display', '');
                $('.nav-block').addClass('mobile');
                if ($('.nav-block').hasClass('desktop')) $('.nav-block').removeClass('desktop');
            } else {
                $('.nav-block').addClass('desktop');
                if ($('.nav-block').hasClass("col-12")) $(".nav-block").toggleClass('col-12 col');
                if ($('.nav-block').hasClass('mobile')) $('.nav-block').removeClass('mobile');
                if ($('#hamburger-icon').hasClass('active')) $('#hamburger-icon').toggleClass('active');
                
            }
        }

        $(window).on('load resize',windowSize);

        
        /* Mobile Menu
        * ---------------------------------------------------- */ 
        var ssMobileMenu = function() {

            var toggleButton = $('.header-menu-toggle'),
                nav = $('.header-nav-wrap');

            toggleButton.on('click', function(event) {
                event.preventDefault();

                toggleButton.toggleClass('is-clicked');
                nav.slideToggle();
            });

            if (toggleButton.is(':visible')) nav.addClass('mobile');

            $WIN.on('resize', function() {
                if (toggleButton.is(':visible')) nav.addClass('mobile');
                else nav.removeClass('mobile');
            });

            nav.find('a').on("click", function() {

                if (nav.hasClass('mobile')) {
                    toggleButton.toggleClass('is-clicked');
                    nav.slideToggle(); 
                }
            });
        };

        (function ssInit() {
            ssMobileMenu();
        })();

    })
})