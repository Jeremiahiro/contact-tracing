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

    $('#activity_tags').multiInput({
        json: true,
        input: $(
            '<div class="form-group">\n' +
            '<div class="row inputElement">\n' +
            '<div class="col-md-6 mb-1">\n' +
            '<input class="blue-input input rounded-0 required" name="name[]" placeholder="Name" type="text" autocomplete="tag_detail">\n' +
            '</div>\n' +
            '<div class="col-md-6 mb-1">\n' +
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
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='activity']").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                // "start_date": "required",
                // "end_date": "required",
                "name": "required",
                "email[]": {
                    required: true,
                    email: true
                },
            },
            // Specify validation error messages
            messages: {
                // "start_date": "Please enter a valid date and time",
                // "end_date": "Please enter a valid date and time",
                "name[]": "Please enter a valid name",
                "email[]": "Please enter a valid email address",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

    var from = $('#from_location');
    var fromLat = $('#from_latitude');
    var fromLng = $('#from_longitude');
    var to = $('#to_location');
    var toLat = $('#to_latitude');
    var toLng = $('#to_longitude');

    from.blur(function () {
        if( fromLat.val().length === 0 && fromLng.val().length === 0) {
            $('#fromAlert').toggleClass('show hide');
        }
    });

    to.blur(function () {
        if( toLat.val().length === 0 && toLng.val().length === 0) {
            $('#toAlert').toggleClass('show hide');
        }
    });


    var tab1Label = $("#tab1Label");
    var tab2Label = $("#tab2Label");
    var tab1 = $("#existingLabel");
    var tab2 = $("#newLabel");

    tab1.addClass('show');
    tab2.addClass('hide');

    tab1Label.click(function () {
        tab1.removeClass('hide');
        tab2.addClass('hide');
        tab1Label.addClass('bold').removeClass('light');
        tab2Label.addClass('light').removeClass('bold');
    });

    tab2Label.click(function () {
        tab2.removeClass('hide');
        tab1.addClass('hide').removeClass('show')
        tab2Label.addClass('bold').removeClass('light');
        tab1Label.addClass('light').removeClass('bold');
    });

});
