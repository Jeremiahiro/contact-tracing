jQuery(document).ready(function ($) {

    var startDate = $('#startDate');
    var endDate = $('#endDate');
    startDate.datetimepicker({
        format: 'd-m-Y H:i',
        hours12: false,
        yearStart: 2020,
        step: 5,
    });

    endDate.datetimepicker({
        format: 'd-m-Y H:i',
        // minDateTime: new Date(startDate.val()),
        hours12: false,
        step: 5,
    });
});
