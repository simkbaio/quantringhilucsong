!function ($) {

    $(function() {

        'use strict';

        /* styleswitch
         ---------------------------------------------------------------------------------------- */






        /* -------------------------------------------------------------------------------------------------------------
        USEFUL CODE STARTS HERE
        ------------------------------------------------------------------------------------------------------------- */

        /* DROPDOWN EFFECT
         http://stackoverflow.com/questions/5524612/how-to-run-jquery-fadein-and-slidedown-simultaneously#answer-16174417
         ------------------------------------------------------------------------------------- */
        // Sort us out with the options parameters
        var getAnimOpts = function (a, b, c) {
                if (!a) { return {duration: 'normal'}; }
                if (!!c) { return {duration: a, easing: b, complete: c}; }
                if (!!b) { return {duration: a, complete: b}; }
                if (typeof a === 'object') { return a; }
                return { duration: a };
            },
            getUnqueuedOpts = function (opts) {
                return {
                    queue: false,
                    duration: opts.duration,
                    easing: opts.easing
                };
            };
        // Declare our new effects
        $.fn.showDown = function (a, b, c) {
            var slideOpts = getAnimOpts(a, b, c), fadeOpts = getUnqueuedOpts(slideOpts);
            $(this).stop(true, true).hide().css('opacity', 0).slideDown(slideOpts).animate({ opacity: 1 }, fadeOpts);
        };
        $.fn.hideUp = function (a, b, c) {
            var slideOpts = getAnimOpts(a, b, c), fadeOpts = getUnqueuedOpts(slideOpts);
            $(this).stop(true, true).show().css('opacity', 1).slideUp(slideOpts).animate({ opacity: 0 }, fadeOpts);
        };

        // Show
        var dropdownTarget = $('.dropdown-toggle');
        dropdownTarget.parent().on('show.bs.dropdown', function(e){
            $(this).find('.dropdown-menu').first().showDown(300, 'easeOutBounce');
        });
        // Hide
        dropdownTarget.parent().on('hide.bs.dropdown', function(e){
            $(this).find('.dropdown-menu').first().hideUp(300, 'easeOutBounce'); // use for fadeout
            //$(this).find('.dropdown-menu').first().hide(); // use for immediate hide, which causes less problems - dropdowns can do that to you :)
        });


        /* SIDEBAR
        ------------------------------------------------------------------------------------- */


    });
}(window.jQuery);