/*global jQuery*/
(function ($) {
    "use strict";
    $(document).ready(function () {

    	// Menu icon
        $('#nav-icon').click(function() {
            $(this).toggleClass('open');
            $('.js-nav-toggle').toggleClass('open-mobile-menu');
            $('body').toggleClass('mobile-menu-open');
        });

			// Sub menu trigger
        $('.main-menu ul ul').parent('li').append('<span class="menu-trigger"></span>');

       // Sub menu toggle
        $('.menu-trigger').click(function() {
            $(this).siblings('ul').slideToggle().toggleClass('mobile-sibling-open');
            $(this).toggleClass('active-trigger');
        });

        // WordPress mobile-menu
        $('.current-menu-ancestor > .menu-trigger').addClass('active-trigger');
        $(".main-menu li li:has(ul)").addClass('has-sub-menu');

        // Banner Slider
        $('.banner .gallery').bxSlider({
            mode: 'fade',
            speed: 2500,
            auto: true,
            pager: false,
            controls: false
        });

        // Formular - copy html

        $("input[name=ejendom-navn]").val($('h1').text());
        $("input[name=ejendom-vej]").val($('.vej').text());
        $("input[name=ejendom-post-nr]").val($('.post-nr').text());
        $("input[name=ejendom-by]").val($('.by').text());
        $("input[name=ejendom-url]").val(window.location);



    });
}(jQuery));