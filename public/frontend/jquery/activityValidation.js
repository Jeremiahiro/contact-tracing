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
                latitude_1: {
                    number:true,
                    min:1,
                    required:true
                },
                latitude_2: {
                    number:true,
                    min:1,
                    required:true,
                    notEqual: "#latitude_1"
                },
            },
            // Specify validation error messages
            messages: {
                "latitude_1": "Google Map: select a valid address",
                "latitude_2": "Google Map: select a valid address",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

});
