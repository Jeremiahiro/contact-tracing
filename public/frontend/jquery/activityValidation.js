jQuery(document).ready(function ($) {

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
