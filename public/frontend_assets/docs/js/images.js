!function ($) {

    $(function() {

        /* HOLDER FIX
         https://code.google.com/p/chromium/issues/detail?id=336476
         https://github.com/imsky/holder/issues/81 */
        $('body').hide().show();

        // image hovers
        $('.thumbnail-slide').hover(
            function(){
                //$(this).find('.caption').stop(true, true).slideDown(150);
                $(this).find('.caption').stop(true, true).fadeIn({ duration: 200, queue: false }).css('display', 'none').slideDown({ duration: 200, easing: "easeInOutQuart" }); //slideDown({ duration: 200, easing: "easeInOutQuart" });
            },
            function(){
                // $(this).find('.caption').stop(true, true).slideUp(150);
                $(this).find('.caption').stop(true, true).fadeOut({ duration: 200, queue: false }).slideUp({ duration: 200, easing: "easeInOutQuart" });
            }
        );
        $('.thumbnail-fade').hover(
            function(){
                $(this).find('.caption').stop(true, true);
                $(this).find('.caption').fadeIn(400);
            },
            function(){
                $(this).find('.caption').stop(true, true);
                $(this).find('.caption').fadeOut(400);
            }
        );
        $('.download-tooltip').tooltip({
            selector: "[data-toggle=tooltip]",
            container: "body"
        });

    });
}(window.jQuery);