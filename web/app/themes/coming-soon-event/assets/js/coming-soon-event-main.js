/* ===================================================================
 * Count - Main JS
 *
 * ------------------------------------------------------------------- */
(function($) {
    "use strict";
    var cfg = {
            scrollDuration: 800, // smoothscroll duration
        },
        $WIN = $(window);
    // Add the User Agent to the <html>
    // will be used for IE10 detection (Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0))
    var doc = document.documentElement;
    doc.setAttribute('data-useragent', navigator.userAgent);
    // svg fallback
    /*if (!Modernizr.svg) {
        $(".home-logo img").attr("src", "images/logo.png");
    }*/
    /* Preloader
     * -------------------------------------------------- */
    var ssPreloader = function() {
        $("html").addClass('ss-preload');
        $WIN.on('load', function() {
            // will first fade out the loading animation 
            $("#loader").fadeOut("slow", function() {
                // will fade out the whole DIV that covers the website.
                $("#preloader").delay(300).fadeOut("slow");
            });
            // for hero content animations 
            $("html").removeClass('ss-preload');
            $("html").addClass('ss-loaded');
        });
    };
    /* info toggle
     * ------------------------------------------------------ */
    var ssInfoToggle = function() {
        //open/close lateral navigation
        $('.info-toggle').on('click', function(event) {
            event.preventDefault();
            $('body').toggleClass('info-is-visible');
        });
    };
    /* placeholder plugin settings
     * ------------------------------------------------------ */
    var ssPlaceholder = function() {
        $('input, textarea, select').placeholder();
    };
    /* initialize
     * ------------------------------------------------------ */
    (function ssInit() {
        ssPreloader();
        ssInfoToggle();
        ssPlaceholder();
    })();

    var menu_toggle         = $('.coming-soon-menu-toggle');
    var nav_menu            = $('.coming-soon-event-main-navigation ul.nav-menu');

    /*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    menu_toggle.click(function(){
        $(this).toggleClass('close-menu');
        nav_menu.slideToggle();
    });

    $('.coming-soon-event-main-navigation .nav-menu .menu-item-has-children > a').after( $('<button class="dropdown-toggle"><i class="fa fa-angle-down"></i></button>') );

    $('button.dropdown-toggle').click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });


})(jQuery);

jQuery(document).ready(function() {
        jQuery('.skip-link-menu-end-skip').focus(function(){
            jQuery('.close-menu').focus();
        });
});