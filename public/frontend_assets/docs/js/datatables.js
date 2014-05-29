!function ($) {

    $(function() {

        // basic
        $('#basic').dataTable( {
            "sPaginationType": "bs_normal",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": "",
                    "sNext": "",
                    "paginationClass": "neutral" // KVELLE specific code to bring out form color styling
                },
                "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
                "sLengthMenu": "_MENU_ records",
                "sInfoEmpty": "Showing 0 to 0 of 0 records",
                "sInfoFiltered": "(filtered from _MAX_ total records)",
                "sSearch": "<span class=\"datatables_search\">Search:</span>"
            }
        });

        // adding Bootstrap form-control manually
        // post by Jorex (August 2013): https://www.datatables.net/forums/discussion/16809/bootstrap-3
        $('#basic_wrapper').addClass('has-neutral');
        $('#basic_length label select').addClass('form-control');
        $('#basic_filter label input').addClass('form-control').css("width", "150px"); // search needs a fixed with for it to look decent in Bootstrap
        //set alternate pagination style or you can hardcode it in datatables.js LINE 44
        //$('#basic_wrapper').find('.pagination').addClass('neutral');
    });
}(window.jQuery);