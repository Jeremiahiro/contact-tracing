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

    // $('#activity_tags').multiInput({
    //     json: true,
    //     input: $(
    //         '<div class="form-group">\n' +
    //         '<div class="row inputElement">\n' +
    //         '<div class="col-md-6 mb-1">\n' +
    //         '<input class="blue-input input rounded-0 new-user" name="name[]" placeholder="Name" type="text" autocomplete="tag_detail">\n' +
    //         '</div>\n' +
    //         '<div class="col-md-6 mb-1">\n' +
    //         '<input class="blue-input input rounded-0" name="email[]" placeholder="Email" type="email"  autocomplete="tag_detail">\n' +
    //         '</div>\n' +
    //         '<div class="col-md-6 mb-2">\n' +
    //         '<input class="blue-input input rounded-0" name="phone[]" placeholder="Phone" type="tel"  autocomplete="tag_detail">\n' +
    //         '</div>\n' +
    //         '</div>\n' +
    //         '</div>\n'),
    //     limit: 10,
    //     onElementAdd: function (el, plugin) {
    //         console.log(plugin.elementCount);
    //     },
    //     onElementRemove: function (el, plugin) {
    //         console.log(plugin.elementCount);
    //     }
    // });
    
    $("#testform2").simpleform({
        speed: 500,
        transition: 'slide',
        progressBar: true,
        showProgressText: true,
        validate: false
    });

    $(function () {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='activity']").validate({
            ignore: "input[name='from_latitude']:hidden",
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                // "start_date": "required",
                // "end_date": "required",
                from_latitude: {
                    number:true,
                    min:1,
                    required:true
                },
                to_latitude: {
                    number:true,
                    min:1,
                    required:true
                },
                // "name": "required",
                // "email[]": {
                //     required: true,
                //     email: true
                // },
            },
            // Specify validation error messages
            messages: {
                // "start_date": "Please enter a valid date and time",
                // "end_date": "Please enter a valid date and time",
                "from_latitude": "Google Map: select a valid address",
                "to_latitude": "Google Map: select a valid address",
                // "name[]": "Please enter a valid name",
                // "email[]": "Please enter a valid email address",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

});
