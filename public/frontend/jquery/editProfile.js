jQuery(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function () {

        // Initialize regex validation for password
        $.validator.addMethod(
            "regex",
            function (value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);
            },
            "Please check your input."
        );

        // Initialize form validation on the profile update form.
        $("#update_user_info").validate({
            // Specify validation rules
            rules: {
                name: {
                    required: true
                },
                username: {
                    required: true,
                    minlength: 3,
                    maxlength: 15,
                },
                phone: {
                    required: true,
                    minlength: 10
                },
                gender: {
                    required: true
                },
                age_range: {
                    required: true
                },
            },
            // Specify validation error messages
            messages: {
                name: {
                    required: "Enter your Full Name"
                },
                username: {
                    required: "Enter your Username",
                    minlength: "Username must be at least 3 characters",
                    maxlength: "Username must be at most 15 characters",
                },
                phone: {
                    required: "Enter your Phone Number",
                    minlength: "Please enter Valid Phone Number",
                },
                gender: {
                    required: "Select your Gender",
                },
                age_range: {
                    required: "Select your Age Range",
                },
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                $('#update_info_submit').html('Updateing...');
                $('#update_info_spinner').removeClass('d-none');
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        if (response.success != true) {
                            $('#update_info_submit').html('Update');
                            $('#update_info_spinner').addClass('d-none');
                            showAlertMessage('danger', response.message);
                        } else {
                            showAlertMessage('success', response.message);
                            $('#update_info_submit').html('Update');
                            $('#update_info_spinner').addClass('d-none');
                        }
                    },
                    error: function (xhr) {
                        const jsonResponse = JSON.parse(xhr.responseText);
                        showAlertMessage('danger', jsonResponse['message']);
                        $('#update_info_submit').html('Update');
                        $('#update_info_spinner').addClass('d-none');
                    }
                });
            }
        });

        // Initialize form validation on the password update form.
        $("#update_user_password").validate({
            // Specify validation rules
            rules: {
                password: {
                    required: true,
                    maxlength: 16,
                    regex: /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/,
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password",

                },
            },
            // Specify validation error messages
            messages: {
                password: {
                    required: "Password is required",
                    regex: 'Password must contain at least 8 characters, including UPPER/lowercase and numbers',
                    maxlength: "Incorrect password format",
                },
                password_confirmation: {
                    required: "Password Confirmation is required",
                    equalTo: "Password Confirmation does not match",
                }
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                $('#update_password_submit').html('Updateing...');
                $('#update_password_spinner').removeClass('d-none');
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        if (response.success != true) {
                            $('#update_password_submit').html('Update');
                            $('#update_password_spinner').addClass('d-none');
                            showAlertMessage('danger', response.message);
                        } else {
                            showAlertMessage('success', response.message);
                            $('#update_password_submit').html('Update');
                            $('#update_password_spinner').addClass('d-none');
                        }
                    },
                    error: function (xhr) {
                        const jsonResponse = JSON.parse(xhr.responseText);
                        showAlertMessage('danger', jsonResponse['message']);
                        $('#update_password_submit').html('Update');
                        $('#update_password_spinner').addClass('d-none');
                    }
                });
            }
        });


        var croppie = null;
        var el = document.getElementById('resizer');

        $.base64ImageToBlob = function (str) {
            // extract content type and base64 payload from original string
            var pos = str.indexOf(';base64,');
            var type = str.substring(5, pos);
            var b64 = str.substr(pos + 8);

            // decode base64
            var imageContent = atob(b64);

            // create an ArrayBuffer and a view (as unsigned 8-bit)
            var buffer = new ArrayBuffer(imageContent.length);
            var view = new Uint8Array(buffer);

            // fill the view, using the decoded base64
            for (var n = 0; n < imageContent.length; n++) {
                view[n] = imageContent.charCodeAt(n);
            }

            // convert ArrayBuffer to Blob
            var blob = new Blob([buffer], {
                type: type
            });

            return blob;
        }

        $.getImage = function (input, croppie) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    croppie.bind({
                        url: e.target.result,
                    });
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // update profile picture
        $("#changeAvatar").on("change", function (event) {
            $("#upload_image_modal").modal();
            $("#upload_avatar").removeClass('d-none');
            var requestType = $(this).data('type');
            // Initailize croppie instance and assign it to global variable
            croppie = new Croppie(el, {
                viewport: {
                    width: 300,
                    height: 300,
                    type: 'circle',
                },
                boundary: {
                    width: 350,
                    height: 350
                },
                showZoomer: false,
                enableOrientation: true
            });
            $.getImage(event.target, croppie);

            var oldAvatar = $('#profile-pic').css('background-image');

            $("#upload_avatar").on("click", function () {
                croppie.result('base64', {
                    type: "canvas",
                    size: "original",
                    format: "png",
                    quality: 1
                }).then(function (base64) {
                    $("#upload_image_modal").modal("hide");
                    $('.profile-pic-cam').hide();
                    $('#profile-pic').css('background-image', 'url(/frontend/loader.gif)');

                    var url = `/image-upload`;
                    var formData = new FormData();
                    formData.append("image", $.base64ImageToBlob(base64));
                    formData.append("type", requestType);

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#profile-pic').css('background-image', 'url(' + base64 + ')');
                            $('.profile-pic-cam').show();
                            showAlertMessage('success', response.message);
                        },
                        error: function (xhr) {
                            const jsonResponse = JSON.parse(xhr.responseText);
                            showAlertMessage('danger', jsonResponse['message']);
                            $('#profile-pic').css('background-image', oldAvatar);
                            $('.profile-pic-cam').show();
                        }
                    });
                });
            });
        });

        // update profile header
        $("#changeHeader").on("change", function (event) {
            $("#upload_image_modal").modal();
            $("#upload_header").removeClass('d-none');
            var requestType = $(this).data('type');
            // Initailize croppie instance and assign it to global variable
            croppie = new Croppie(el, {
                viewport: {
                    width: 300,
                    height: 300,
                    type: 'square',
                },
                boundary: {
                    width: 350,
                    height: 350
                },
                showZoomer: false,
                enableOrientation: true
            });
            $.getImage(event.target, croppie);

            var oldHeader = $('#header-image').css('background-image');

            $("#upload_header").on("click", function () {
                croppie.result('base64', {
                    type: "canvas",
                    size: "original",
                    format: "png",
                    quality: 1
                }).then(function (base64) {
                    $("#upload_image_modal").modal("hide");
                    $('#header-image').css('background-image', 'url(/frontend/loader.gif)');

                    var url = `/image-upload`;
                    var formData = new FormData();
                    formData.append("image", $.base64ImageToBlob(base64));
                    formData.append("type", requestType);

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function (response) {
                            $('#header-image').css('background-image', 'url(' + base64 + ')');
                            showAlertMessage('success', response.message);
                        },
                        error: function (xhr) {
                            const jsonResponse = JSON.parse(xhr.responseText);
                            showAlertMessage('danger', jsonResponse['message']);
                            $('#header-image').css('background-image', oldHeader);
                            console.log(e);
                        }
                    });
                });
            });
        });

        // To Rotate Image Left or Right
        $(".rotate").on("click", function () {
            croppie.rotate(parseInt($(this).data('deg')));
        });

        $('#upload_image_modal').on('hidden.bs.modal', function (e) {
            // This function will call immediately after model close
            // To ensure that old croppie instance is destroyed on every model close
            setTimeout(function () {
                croppie.destroy();
            }, 100);
            $("#upload_image").addClass('d-none');
            $("#upload_avatar").addClass('d-none');
            $("#upload_header").addClass('d-none');
        })
    });

    // Toggle activity visibility
    $('#toggle_location').change(function () {
        $('#toggle_location').attr("disabled", true);
        var status = $(this).is(':checked') ? 1 : 0;

        $('#toggle_location_spinner').removeClass('d-none');
        $.ajax({
            type: 'GET',
            url: `/location/visibility`,
            data: {
                'status': status,
            },
            dataType: "json",
            success: function (response) {
                $(this).prop("checked", !this.checked);
                $('#toggle_location_spinner').addClass('d-none');
                showAlertMessage('success', response.message);
                $('#toggle_location').attr("disabled", false);
            },
            error: function (xhr) {
                const jsonResponse = JSON.parse(xhr.responseText);
                showAlertMessage('danger', jsonResponse['message']);
                $('#toggle_location').attr("disabled", false);
                $(this).prop("checked", !this.checked);
                $('#toggle_location_spinner').addClass('d-none');
            }
        });
    });

    // Toggle background activity
    $('#background_activity').change(function () {
        $('#background_activity').attr("disabled", true);
        var status = $(this).is(':checked') ? 1 : 0;

        $('#background_activity_spinner').removeClass('d-none');
        $.ajax({
            type: 'GET',
            url: `/background/activity`,
            data: {
                'status': status,
            },
            dataType: "json",
            success: function (response) {
                $(this).prop("checked", !this.checked);
                $('#background_activity_spinner').addClass('d-none');
                showAlertMessage('success', response.message);
                $('#background_activity').attr("disabled", false);
            },
            error: function (xhr) {
                const jsonResponse = JSON.parse(xhr.responseText);
                showAlertMessage('danger', jsonResponse['message']);
                $('#background_activity').attr("disabled", false);
                $(this).prop("checked", !this.checked);
                $('#background_activity_spinner').addClass('d-none');
            }
        });
    });

    // Toggle notification
    $('#toggle_notification').change(function () {
        $('#toggle_notification').attr("disabled", true);
        var status = $(this).is(':checked') ? 1 : 0;

        $('#toggle_notification_spinner').removeClass('d-none');
        $.ajax({
            type: 'GET',
            url: `/toggle/notification`,
            data: {
                'status': status,
            },
            dataType: "json",
            success: function (response) {
                $(this).prop("checked", !this.checked);
                showAlertMessage('success', response.message);
                $('#toggle_notification_spinner').addClass('d-none');
                $('#toggle_notification').attr("disabled", false);
            },
            error: function (xhr) {
                $(this).prop("checked", !this.checked);
                const jsonResponse = JSON.parse(xhr.responseText);
                showAlertMessage('danger', jsonResponse['message']);
                $('#toggle_notification').attr("disabled", false);
                $('#toggle_notification_spinner').addClass('d-none');
            }
        });
    });

    // Enable deactivate account button
    $("#confirm_deactivate").click(function () {
        var checked_status = this.checked;
        if (checked_status == true) {
            $("#deactivate_account_btn").removeAttr("disabled");
        } else {
            $("#deactivate_account_btn").attr("disabled", "disabled");
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
