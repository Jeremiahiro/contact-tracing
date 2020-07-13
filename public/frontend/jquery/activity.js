jQuery(document).ready(function ($) {

    $('#activity_tags').multiInput({
        json: true,
        input: $(
            '<div class="form-group">\n' +
            '<div class="row inputElement">\n' +
            '<div class="col-md-6 mb-2">\n' +
            '<input class="blue-input input rounded-0 required" name="name[]" placeholder="Name" type="text" autocomplete="tag_detail">\n' +
            '</div>\n' +
            '<div class="col-md-6 mb-2">\n' +
            '<input class="blue-input input rounded-0" name="email[]" placeholder="Email" type="email"  autocomplete="tag_detail">\n' +
            '</div>\n' +
            '<div class="col-md-6 mb-2">\n' +
            '<input class="blue-input input rounded-0" name="phone[]" placeholder="Phone" type="tel"  autocomplete="tag_detail">\n' +
            '</div>\n' +
            '</div>\n' +
            '</div>\n'),
        limit: 10,
        onElementAdd: function (el, plugin) {
            console.log(plugin.elementCount);
        },
        onElementRemove: function (el, plugin) {
            console.log(plugin.elementCount);
        }
    });

    $(function () {
        $('input[name="date_range"]').daterangepicker({
            autoUpdateInput: false,
            timePicker: true,
            // startDate: moment().startOf('hour'),
            // endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                cancelLabel: 'Clear',
                format: 'DD-MM-YY hh:mm A'
            }
        });
        $('input[name="date_range"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD-MM-YY hh:mm A') + ' to ' + picker.endDate.format('DD-MM-YY hh:mm A'));
        });

        $('input[name="date_range"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });

    $(function () {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='activity']").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                "activity_tags": "required",
                "date_range": "required",
                "name": "required",
                "email": {
                    required: true,
                    email: true
                },
            },
            // Specify validation error messages
            messages: {
                "activity_tags[]": "Please select category",
                "name": "Please enter a name",
                "date_range": "Please enter a valid date and time",
                "email": "Please enter a valid email address"
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

});