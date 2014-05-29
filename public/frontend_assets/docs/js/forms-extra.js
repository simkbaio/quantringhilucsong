!function ($) {

    $(function() {

        /* datetime picker
         ---------------------------------------------------------- */
        $('#datetimepicker1').datetimepicker({
            language: 'en',
            pick12HourFormat: true
        });
        $('#datetimepicker12').datetimepicker({
            language: 'en',
            pick12HourFormat: true
        });

        $('#datetimepicker2').datetimepicker({
            pickDate: false
        });

        $('#datetimepicker22').datetimepicker({
            pickDate: false
        });

        $('#datetimepicker3').datetimepicker({
            pickTime: false
        });

        $('#datetimepicker33').datetimepicker({
            pickTime: false
        });

        /* date range picker
         ---------------------------------------------------------- */
        $('#reservation').daterangepicker();

        $('#reservation1').daterangepicker();

        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            format: 'MM/DD/YYYY h:mm A'
        });

        $('#reservationtime1').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            format: 'MM/DD/YYYY h:mm A'
        });

        $('#reportrange').daterangepicker(
            {
                startDate: moment().subtract('days', 29),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2016',
                dateLimit: { days: 60 },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                },
                opens: 'left',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-sm btn-success',
                cancelClass: 'btn-sm',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom Range',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            },
            function(start, end) {
                //console.log("Callback has been called!");
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );
        //Set the initial state of the picker label
        $('#reportrange span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#reportrange1').daterangepicker(
            {
                startDate: moment().subtract('days', 29),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2016',
                dateLimit: { days: 60 },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                },
                opens: 'left',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-sm btn-success',
                cancelClass: 'btn-sm',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom Range',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            },
            function(start, end) {
                //console.log("Callback has been called!");
                $('#reportrange1 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );
        //Set the initial state of the picker label
        $('#reportrange1 span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));


        /* colorpicker
         ---------------------------------------------------------- */
        $('#cp1').colorpicker({
            format: 'hex'
        });
        $('#cp2').colorpicker();
        $('#cp3').colorpicker();
        var bodyStyle = $('body')[0].style;
        $('#cp4').colorpicker().on('changeColor', function(ev){
            bodyStyle.backgroundColor = ev.color.toHex();
        });

        /* checkabox
         ---------------------------------------------------------- */
        var checkboxSelector = ".custom-checkbox input[type='checkbox']",
            radioSelector = ".custom-checkbox input[type='radio']";

        $(checkboxSelector).checkABox("bind");
        $(radioSelector).checkABox("bind", {
            "iconClass": "my-ui-icon my-ui-icon-round"
        });

        /* maxlength
         ---------------------------------------------------------- */
        $('input#ml_default').maxlength();

        $('input#moreoptions').maxlength({
            alwaysShow: true,
            threshold: 10,
            warningClass: "label label-primary",
            limitReachedClass: "label label-danger"
        });

        $('input#alloptions').maxlength({
            alwaysShow: true,
            threshold: 10,
            warningClass: "label label-gunmetal",
            limitReachedClass: "label label-danger",
            separator: ' of ',
            preText: 'You have used ',
            postText: ' chars.',
            validate: true
        });

        $('textarea#ml_textarea').maxlength({
            alwaysShow: true,
            warningClass: "label label-berry",
            limitReachedClass: "label label-danger"
        });

        $('input#placement').maxlength({
            alwaysShow: true,
            placement: 'top-left',
            warningClass: "label label-cocktail",
            limitReachedClass: "label label-danger"
        });

        /* Bootstrap switch
         ---------------------------------------------------------- */
        $("input.bs-switch").bootstrapSwitch();

        /* Bootstrap select
         ---------------------------------------------------------- */
        $('.selectpicker').selectpicker({
            width: '100%'
        });

        /* Bootstrap touchSpin
         ---------------------------------------------------------- */
        $("input[name='demo1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });

        $("input[name='demo2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });

        $("input[name='demo3']").TouchSpin();

        $("input[name='demo3_21']").TouchSpin({
            initval: 40
        });
        $("input[name='demo3_22']").TouchSpin({
            initval: 40
        });

        $("input[name='demo4']").TouchSpin({
            postfix: "a button",
            postfix_extraclass: "btn btn-default"
        });
        $("input[name='demo4_2']").TouchSpin({
            postfix: "a button",
            postfix_extraclass: "btn btn-default"
        });
        $("input[name='demo5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });


        // event demo
        var i = $("input[name='demo7']"),
            demoarea = $("#demo7textarea"),
            text = "";

        function writeLine(line) {
            text += line + "\n";
            demoarea.text(text);
            demoarea.scrollTop(
                demoarea[0].scrollHeight - demoarea.height()
            );
        }

        i.TouchSpin({});
        i.on("touchspin.on.startspin", function() {
            writeLine("touchspin.on.startspin");
        });
        i.on("touchspin.on.startupspin", function() {
            writeLine("touchspin.on.startupspin");
        });
        i.on("touchspin.on.startdownspin", function() {
            writeLine("touchspin.on.startdownspin");
        });
        i.on("touchspin.on.stopspin", function() {
            writeLine("touchspin.on.stopspin");
        });
        i.on("touchspin.on.stopupspin", function() {
            writeLine("touchspin.on.stopupspin");
        });
        i.on("touchspin.on.stopdownspin", function() {
            writeLine("touchspin.on.stopdownspin");
        });
        i.on("touchspin.on.min", function() {
            writeLine("touchspin.on.min");
        });
        i.on("touchspin.on.max", function() {
            writeLine("touchspin.on.max");
        });

        // playing with colors
        $("input[name='mango']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%',
            buttondown_class: "btn btn-mango",
            buttonup_class: "btn btn-mango"
        });

        $("input[name='gunmetal']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%',
            buttondown_class: "btn btn-gunmetal",
            buttonup_class: "btn btn-gunmetal"
        });

        $("input[name='hearts']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%',
            buttondown_class: "btn btn-hearts",
            buttonup_class: "btn btn-hearts"
        });

        $("input[name='meadow']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%',
            buttondown_class: "btn btn-meadow",
            buttonup_class: "btn btn-meadow"
        });

    });
}(window.jQuery);