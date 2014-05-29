!function ($) {

    $(function() {

        //== HORIZONTAL ------------------------------------------------------------------------------------------------
        // LEFT TO RIGHT
        // default behavior
        $('#h-default-basic').on('click', function() {
            $('.h-default-basic .progress-bar').progressbar();
        });

        // Themed
        $('#h-default-themed').click(function() {
            $('.h-default-themed .progress-bar').progressbar();
        });

        // Striped
        $('#h-default-striped').click(function() {
            $('.h-default-striped .progress-bar').progressbar();
        });

        // Animated
        $('#h-default-animated').click(function() {
            $('.h-default-animated .progress-bar').progressbar();
        });

        // Aria
        $('#h-default-aria').click(function() {
            $('.h-default-aria .progress-bar').progressbar();
        });

        // Custom animation
        $('#h-default-animation').click(function() {
            $('.h-default-animation .progress-bar').progressbar();
        });


        // RIGHT TO LEFT
        // Default
        $('#h-right-basic').click(function() {
            $('.h-right-basic .progress-bar').progressbar();
        });

        // Themed
        $('#h-right-themed').click(function() {
            $('.h-right-themed .progress-bar').progressbar();
        });

        // Striped
        $('#h-right-striped').click(function() {
            $('.h-right-striped .progress-bar').progressbar();
        });

        // Animated
        $('#h-right-animated').click(function() {
            $('.h-right-animated .progress-bar').progressbar();
        });

        // Aria
        $('#h-right-aria').click(function() {
            $('.h-right-aria .progress-bar').progressbar();
        });

        // Custom animations
        $('#h-right-animation').click(function() {
            $('.h-right-animation .progress-bar').progressbar();
        });


        // TEXT INSIDE
        $('#h-fill-basic').click(function() {
            $('.h-fill-basic .progress-bar').progressbar({display_text: 'fill'});
        });

        $('#h-fill-themed').click(function() {
            $('.h-fill-themed .progress-bar').progressbar({display_text: 'fill'});
        });

        $('#h-fill-striped').click(function() {
            $('.h-fill-striped .progress-bar').progressbar({display_text: 'fill'});
        });

        $('#h-fill-animated').click(function() {
            $('.h-fill-animated .progress-bar').progressbar({display_text: 'fill'});
        });

        $('#h-fill-aria').click(function() {
            $('.h-fill-aria .progress-bar').progressbar({display_text: 'fill'});
        });

        $('#h-fill-animation').click(function() {
            $('.h-fill-animation .progress-bar').progressbar({display_text: 'fill'});
        });

        $('#h-fill-nonpercentage-basic').click(function() {
            $('.h-fill-nonpercentage-basic .progress-bar').progressbar({display_text: 'fill', use_percentage: false});
        });

        $('#h-fill-nonpercentage-themed').click(function() {
            $('.h-fill-nonpercentage-themed .progress-bar').progressbar({display_text: 'fill', use_percentage: false});
        });

        $('#h-fill-nonpercentage-striped').click(function() {
            $('.h-fill-nonpercentage-striped .progress-bar').progressbar({display_text: 'fill', use_percentage: false});
        });

        $('#h-fill-nonpercentage-animated').click(function() {
            $('.h-fill-nonpercentage-animated .progress-bar').progressbar({display_text: 'fill', use_percentage: false});
        });

        $('#h-fill-nonpercentage-aria').click(function() {
            $('.h-fill-nonpercentage-aria .progress-bar').progressbar({display_text: 'fill', use_percentage: false});
        });

        $('#h-fill-nonpercentage-animation').click(function() {
            $('.h-fill-nonpercentage-animation .progress-bar').progressbar({display_text: 'fill', use_percentage: false});
        });


        // CENTERED TEXT
        $('#h-center-basic').click(function() {
            $('.h-center-basic .progress-bar').progressbar({display_text: 'center'});
        });

        $('#h-center-themed').click(function() {
            $('.h-center-themed .progress-bar').progressbar({display_text: 'center'});
        });

        $('#h-center-striped').click(function() {
            $('.h-center-striped .progress-bar').progressbar({display_text: 'center'});
        });

        $('#h-center-animated').click(function() {
            $('.h-center-animated .progress-bar').progressbar({display_text: 'center'});
        });

        $('#h-center-aria').click(function() {
            $('.h-center-aria .progress-bar').progressbar({display_text: 'center'});
        });

        $('#h-center-animation').click(function() {
            $('.h-center-animation .progress-bar').progressbar({display_text: 'center'});
        });

        // NON-PERCENTAGE
        $('#h-center-nonpercentage-basic').click(function() {
            $('.h-center-nonpercentage-basic .progress-bar').progressbar({display_text: 'center', use_percentage: false});
        });

        $('#h-center-nonpercentage-themed').click(function() {
            $('.h-center-nonpercentage-themed .progress-bar').progressbar({display_text: 'center', use_percentage: false});
        });

        $('#h-center-nonpercentage-striped').click(function() {
            $('.h-center-nonpercentage-striped .progress-bar').progressbar({display_text: 'center', use_percentage: false});
        });

        $('#h-center-nonpercentage-animated').click(function() {
            $('.h-center-nonpercentage-animated .progress-bar').progressbar({display_text: 'center', use_percentage: false});
        });

        $('#h-center-nonpercentage-aria').click(function() {
            $('.h-center-nonpercentage-aria .progress-bar').progressbar({display_text: 'center', use_percentage: false});
        });

        $('#h-center-nonpercentage-animation').click(function() {
            $('.h-center-nonpercentage-animation .progress-bar').progressbar({display_text: 'center', use_percentage: false});
        });



        //== VERTICAL ------------------------------------------------------------------------------------------------
        // TOP TO BOTTOM
        $('#v-default-basic').click(function() {
            $('.v-default-basic .progress-bar').progressbar();
        });

        $('#v-default-themed').click(function() {
            $('.v-default-themed .progress-bar').progressbar();
        });

        $('#v-default-striped').click(function() {
            $('.v-default-striped .progress-bar').progressbar();
        });

        $('#v-default-animated').click(function() {
            $('.v-default-animated .progress-bar').progressbar();
        });

        $('#v-default-aria').click(function() {
            $('.v-default-aria .progress-bar').progressbar();
        });

        $('#v-default-animation').click(function() {
            $('.v-default-animation .progress-bar').progressbar();
        });


        // BOTTOM TO TOP
        $('#v-bottom-basic').click(function() {
            $('.v-bottom-basic .progress-bar').progressbar();
        });

        $('#v-bottom-themed').click(function() {
            $('.v-bottom-themed .progress-bar').progressbar();
        });

        $('#v-bottom-striped').click(function() {
            $('.v-bottom-striped .progress-bar').progressbar();
        });

        $('#v-bottom-animated').click(function() {
            $('.v-bottom-animated .progress-bar').progressbar();
        });

        $('#v-bottom-aria').click(function() {
            $('.v-bottom-aria .progress-bar').progressbar();
        });

        $('#v-bottom-animation').click(function() {
            $('.v-bottom-animation .progress-bar').progressbar();
        });

        // TEXT INSIDE
        $('#v-fill-basic').click(function() {
            $('.v-fill-basic .progress-bar').progressbar({display_text: 'fill'});
        });

        $('#v-fill-themed').click(function() {
            $('.v-fill-themed .progress-bar').progressbar({display_text: 'fill'});
        });

        $('#v-fill-striped').click(function() {
            $('.v-fill-striped .progress-bar').progressbar({display_text: 'fill'});
        });

        $('#v-fill-animated').click(function() {
            $('.v-fill-animated .progress-bar').progressbar({display_text: 'fill'});
        });

        $('#v-fill-aria').click(function() {
            $('.v-fill-aria .progress-bar').progressbar({display_text: 'fill'});
        });

        $('#v-fill-animation').click(function() {
            $('.v-fill-animation .progress-bar').progressbar({display_text: 'fill'});
        });

        // NON-PERCENTAGE
        $('#v-fill-nonpercentage-basic').click(function() {
            $('.v-fill-nonpercentage-basic .progress-bar').progressbar({display_text: 'fill', use_percentage: false});
        });

        $('#v-fill-nonpercentage-themed').click(function() {
            $('.v-fill-nonpercentage-themed .progress-bar').progressbar({display_text: 'fill', use_percentage: false});
        });

        $('#v-fill-nonpercentage-striped').click(function() {
            $('.v-fill-nonpercentage-striped .progress-bar').progressbar({display_text: 'fill', use_percentage: false});
        });

        $('#v-fill-nonpercentage-animated').click(function() {
            $('.v-fill-nonpercentage-animated .progress-bar').progressbar({display_text: 'fill', use_percentage: false});
        });

        $('#v-fill-nonpercentage-aria').click(function() {
            $('.v-fill-nonpercentage-aria .progress-bar').progressbar({display_text: 'fill', use_percentage: false});
        });

        $('#v-fill-nonpercentage-animation').click(function() {
            $('.v-fill-nonpercentage-animation .progress-bar').progressbar({display_text: 'fill', use_percentage: false});
        });

        // CENTERED TEXT
        $('#v-center-basic').click(function() {
            $('.v-center-basic .progress-bar').progressbar({display_text: 'center'});
        });

        $('#v-center-themed').click(function() {
            $('.v-center-themed .progress-bar').progressbar({display_text: 'center'});
        });

        $('#v-center-striped').click(function() {
            $('.v-center-striped .progress-bar').progressbar({display_text: 'center'});
        });

        $('#v-center-animated').click(function() {
            $('.v-center-animated .progress-bar').progressbar({display_text: 'center'});
        });

        $('#v-center-aria').click(function() {
            $('.v-center-aria .progress-bar').progressbar({display_text: 'center'});
        });

        $('#v-center-animation').click(function() {
            $('.v-center-animation .progress-bar').progressbar({display_text: 'center'});
        });

        // NON-PERCENTAGE
        $('#v-center-nonpercentage-basic').click(function() {
            $('.v-center-nonpercentage-basic .progress-bar').progressbar({display_text: 'center', use_percentage: false});
        });

        $('#v-center-nonpercentage-themed').click(function() {
            $('.v-center-nonpercentage-themed .progress-bar').progressbar({display_text: 'center', use_percentage: false});
        });

        $('#v-center-nonpercentage-striped').click(function() {
            $('.v-center-nonpercentage-striped .progress-bar').progressbar({display_text: 'center', use_percentage: false});
        });

        $('#v-center-nonpercentage-animated').click(function() {
            $('.v-center-nonpercentage-animated .progress-bar').progressbar({display_text: 'center', use_percentage: false});
        });

        $('#v-center-nonpercentage-aria').click(function() {
            $('.v-center-nonpercentage-aria .progress-bar').progressbar({display_text: 'center', use_percentage: false});
        });

        $('#v-center-nonpercentage-animation').click(function() {
            $('.v-center-nonpercentage-animation .progress-bar').progressbar({display_text: 'center', use_percentage: false});
        });


        //== MISC
        // Delay
        $('#m-delay').click(function() {
            $('.m-delay .progress-bar').progressbar({transition_delay: 3000});
        });

        // Refresh speed
        $('#m-refresh-speed').click(function() {
            $('.m-refresh-speed .progress-bar').progressbar({display_text: 'center', use_percentage: false, refresh_speed: 500});
        });

        // Callback
        $('#m-callback').click(function() {
            $('.m-callback .progress-bar').progressbar({
                update: function(current_percentage) { $('#m-callback-update').html(current_percentage); },
                done: function() { $('#m-callback-done').html('yeah! done!'); }
            });
        });

        // Error
        $('#m-error').click(function() {
            $('.m-error .progress-bar').progressbar({
                fail: function(error) { $('#m-callback-error').html(error); }
            });
        });

        // Custom percentage formatting
        $('#m-custom-percentage-format').click(function() {
            $('.m-custom-percentage-format .progress-bar').progressbar({display_text: 'center', percent_format: function(p) {return p + ' percent';}});
        });

        // Custom amount format
        $('#m-custom-amount-format').click(function() {
            $('.m-custom-amount-format .progress-bar').progressbar({display_text: 'center', use_percentage: false, amount_format: function(p, t) {return p + ' of ' + t;}});
        });

        // Multi trigger
        $(document).ready(function() {
            var $ps = $('.m-multi-trigger .progress-bar');
            $('#m-multi-trigger-0').click(function() {
                $ps.attr('aria-valuetransitiongoal', 0).progressbar();
            });
            $('#m-multi-trigger-50').click(function() {
                $ps.attr('aria-valuetransitiongoal', 50).progressbar();
            });
            $('#m-multi-trigger-100').click(function() {
                $ps.attr('aria-valuetransitiongoal', 100).progressbar();
            });
        });

    });
}(window.jQuery);