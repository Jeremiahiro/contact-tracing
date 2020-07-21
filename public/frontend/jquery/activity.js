jQuery(document).ready(function ($) {

    $(function () {
        $('.daterange').daterangepicker({
            autoUpdateInput: false,
            timePicker: true,
            minYear: 2020,
            startDate: moment().startOf('hour'),
            locale: {
                cancelLabel: 'Clear',
                format: 'DD-MM-YY hh:mm A'
            }
        });
        $('.daterange').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YY hh:mm A') + ' to ' + picker.endDate.format('DD-MM-YY hh:mm A'));
        });

        $('.daterange').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
    });

});
