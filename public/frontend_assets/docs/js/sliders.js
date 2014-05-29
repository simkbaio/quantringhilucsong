!function ($) {

    $(function() {

        // jQuery UI ---------------------------------------------------------------------------------
        $( "#slider" ).slider();

        // slider with range
        var sliderRange = $("#slider-range");
        sliderRange.slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
            slide: function( event, ui ) {
                $( "#amount" ).text( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount" ).text( "$" + sliderRange.slider( "values", 0 ) +
            " - $" + sliderRange.slider( "values", 1 ) );

        // slider with fixed max range
        var sliderMax = $("#slider-range-max");
        sliderMax.slider({
            range: "max",
            min: 0,
            max: 20,
            value: 5,
            slide: function( event, ui ) {
                $( "#amount_range_max_target" ).text( ui.value );
            }
        });
        $( "#amount_range_max_target" ).text( sliderMax.slider( "value" ) );

        // slider with fixed min range
        var sliderMin = $("#slider-range-min");
        sliderMin.slider({
            range: "min",
            value: 37,
            min: 0,
            max: 700,
            slide: function( event, ui ) {
                $( "#amount_range_min_target" ).text( "$" + ui.value );
            }
        });
        $( "#amount_range_min_target" ).text( "$" + sliderMin.slider( "value" ) );

        // slider bound to select
        var select = $( "#minbeds" );
        var slider = $( "<div id='slider_select'></div>" ).insertAfter( select ).slider({
            min: 1,
            max: 6,
            range: "min",
            value: select[ 0 ].selectedIndex + 1,
            slide: function( event, ui ) {
                select[ 0 ].selectedIndex = ui.value - 1;
            }
        });
        select.change(function() {
            slider.slider( "value", this.selectedIndex + 1 );
        });

        // snap
        var sliderSnap = $( "#slider-snap" );
        sliderSnap.slider({
            value:100,
            min: 0,
            max: 500,
            step: 50,
            slide: function( event, ui ) {
                $( "#amount-snap-target" ).text( "$" + ui.value );
            }
        });
        $( "#amount-snap-target" ).text( "$" + sliderSnap.slider( "value" ) );

        // vertical
        var sliderVertical = $( "#slider-vertical" );
        sliderVertical.slider({
            orientation: "vertical",
            range: "min",
            min: 0,
            max: 100,
            value: 60,
            slide: function( event, ui ) {
                $( "#amount-vertical" ).text( ui.value );
            }
        });
        $( "#amount-vertical" ).text( sliderVertical.slider( "value" ) );

        // vertical range
        var sliderVerticalRange = $( "#slider-vertical-range" );
        sliderVerticalRange.slider({
            orientation: "vertical",
            range: true,
            values: [ 17, 67 ],
            slide: function( event, ui ) {
                $( "#amount-vertical-range" ).text( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount-vertical-range" ).text( "$" + sliderVerticalRange.slider( "values", 0 ) +
            " - $" + sliderVerticalRange.slider( "values", 1 ) );


        // color variants
        // slider with range - dark
        var sliderRange = $("#slider-range-dark");
        sliderRange.slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
            slide: function( event, ui ) {
                $( "#amount-dark" ).text( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount-dark" ).text( "$" + sliderRange.slider( "values", 0 ) +
            " - $" + sliderRange.slider( "values", 1 ) );

        // slider with range - darker
        var sliderRange = $("#slider-range-darker");
        sliderRange.slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
            slide: function( event, ui ) {
                $( "#amount-darker" ).text( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount-darker" ).text( "$" + sliderRange.slider( "values", 0 ) +
            " - $" + sliderRange.slider( "values", 1 ) );

        // slider with range - light
        var sliderRange = $("#slider-range-light");
        sliderRange.slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
            slide: function( event, ui ) {
                $( "#amount-light" ).text( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount-light" ).text( "$" + sliderRange.slider( "values", 0 ) +
            " - $" + sliderRange.slider( "values", 1 ) );

        // slider with range - lighter
        var sliderRange = $("#slider-range-lighter");
        sliderRange.slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
            slide: function( event, ui ) {
                $( "#amount-lighter" ).text( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount-lighter" ).text( "$" + sliderRange.slider( "values", 0 ) +
            " - $" + sliderRange.slider( "values", 1 ) );

        // slider with range - neutral
        var sliderRange = $("#slider-range-neutral");
        sliderRange.slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
            slide: function( event, ui ) {
                $( "#amount-neutral" ).text( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount-neutral" ).text( "$" + sliderRange.slider( "values", 0 ) +
            " - $" + sliderRange.slider( "values", 1 ) );



        // Ion.range ---------------------------------------------------------------------------------
        $("#basic-ion").ionRangeSlider({
            hasGrid: true
        });
        $("#min-max-ion").ionRangeSlider({
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "$",
            prettify: true,
            hasGrid: true
        });
        $("#min-max-incr-ion").ionRangeSlider({
            min: 1000,
            max: 100000,
            from: 30000,
            to: 90000,
            type: 'double',
            step: 500,
            prefix: "$",
            prettify: true,
            hasGrid: true
        });
        $("#digit-ion").ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: " mm",
            prettify: false,
            hasGrid: true
        });
        $("#years-ion").ionRangeSlider({
            min: 1000,
            max: 1000000,
            type: "single",
            step: 100,
            postfix: " light years",
            from: 55000,
            hideMinMax: true,
            hideFromTo: false
        });
        $("#distance-ion").ionRangeSlider({
            type: "double",
            postfix: " miles",
            step: 10000,
            from: 25000000,
            to: 35000000,
            onChange: function(obj){
                var t = "";
                for(var prop in obj) {
                    t += prop + ": " + obj[prop] + "\r\n";
                }
                $("#result").html(t);
            },
            onLoad: function(obj) {
                //
            }
        });
        $("#updateLast").on("click", function(){ // grabbing data
            $("#range_3").ionRangeSlider("update", {
                min: Math.round(10000 + Math.random() * 40000),
                max: Math.round(200000 + Math.random() * 100000),
                step: 1,
                from: Math.round(40000 + Math.random() * 40000),
                to: Math.round(150000 + Math.random() * 80000)
            });

        });

        // color variants
        $("#min-max-ion-dark").ionRangeSlider({
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "$",
            prettify: true,
            hasGrid: true
        });

        $("#min-max-ion-darker").ionRangeSlider({
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "$",
            prettify: true,
            hasGrid: true
        });

        $("#min-max-ion-light").ionRangeSlider({
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "$",
            prettify: true,
            hasGrid: true
        });

        $("#min-max-ion-lighter").ionRangeSlider({
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "$",
            prettify: true,
            hasGrid: true
        });

        $("#min-max-ion-neutral").ionRangeSlider({
            min: 0,
            max: 5000,
            from: 1000,
            to: 4000,
            type: 'double',
            step: 1,
            prefix: "$",
            prettify: true,
            hasGrid: true
        });



    });
}(window.jQuery);