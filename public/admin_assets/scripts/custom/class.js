jQuery(document).ready(function ($) {

    if (jQuery().timepicker) {
        $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal

        $('.timepicker-default').timepicker({
            autoclose: true,
            showSeconds: true,
            minuteStep: 1
        });

        $('.timepicker-no-seconds').timepicker({
            autoclose: true,
            minuteStep: 5
        });

        $('.timepicker-24').timepicker({
            autoclose: true,
            minuteStep: 5,
            showSeconds: true,
            showMeridian: false
        });

        // handle input group button click
        $('#gio-bat-dau').parent('.input-group').on('click', '.input-group-btn', function (e) {
            e.preventDefault();
            console.log("Click!");

            var test = $(this).parent('.input-group').find('.timepicker');
            console.log(test);
            test.timepicker('showWidget');
        });
        $('.clockface_1').clockface();

    }
    // Update Class Subject status

    $(".subject-status").change(function(data) {
        $(this).blur();
        var subject_input = $(this);
        $(this).attr('disabled','disabled');
        var subject = $(this);
        var subject_id = subject.attr('class-subject-id');
        var class_id = subject.attr('class-id');
        var post_data = {
            subject: subject_id,
            n_class: class_id,
            status: $(this).val(),
        };

        $.post('/admin/classes/' + class_id + '/subjects/update', post_data, function(data) {
            subject_input.removeAttr('disabled');
            alert(data.message);
        });
    });

    // End Update Class Subject status

});