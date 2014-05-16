var UINestable = function () {



    return {
        //main function to initiate the module
        init: function () {

            // activate Nestable for list 1
        jQuery(document).ready(function($) {
            $('#nestable_list_1').nestable({})
            .on('change', updateOutput);
        });


        }

    };

}();