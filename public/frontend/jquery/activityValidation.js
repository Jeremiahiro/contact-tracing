jQuery(document).ready(function ($) {

    $(function () {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form[name='activity']").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                latitude: {
                    number: true,
                    min: 1,
                    required: true
                }
            },
            // Specify validation error messages
            messages: {
                "latitude": "Google Map: select a valid address",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                $('#save_activity_submit').html('Saving...');
                $('#save_activity_spinner').removeClass('d-none');
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        if (response.success != true) {
                            $('#save_activity_submit').html('Save');
                            $('#save_activity_spinner').addClass('d-none');
                            showAlertMessage('danger', response.message);
                        } else {
                            showAlertMessage('success', response.message);
                            $('#save_activity_submit').html('Save');
                            $('#save_activity_spinner').addClass('d-none');
                            location.replace('/activity')
                        }
                    },
                    error: function (xhr) {
                        const jsonResponse = JSON.parse(xhr.responseText);
                        console.log(jsonResponse)
                        showAlertMessage('danger', jsonResponse['message']);
                        $('#save_activity_submit').html('Save');
                        $('#save_activity_spinner').addClass('d-none');
                    }
                });
            }
        });
    });

    function removeAlertMessage() {
        setTimeout(function () {
            $(".alert").remove();
        }, 4000);
    }

    function showAlertMessage(type, message) {
        const alertMessage = ' <div id="upload-alert" class="alert alert-' + type + ' show" role="alert">\n' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
            '<span aria-hidden="true" class="">&times;</span>\n' + '</button>\n' + '<strong class="regular">' +
            message +
            '</strong>\n' + '</div>';
        $("#upload-alert").html(alertMessage);
        removeAlertMessage();
    }
});
