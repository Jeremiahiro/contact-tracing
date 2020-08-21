jQuery(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#upload-1").hide();
    $("#upload-2").hide();

    $(function () {
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
            $("#uploadModal").modal();
            $("#upload-1").show();
            // Initailize croppie instance and assign it to global variable
            croppie = new Croppie(el, {
                viewport: {
                    width: 250,
                    height: 250,
                    type: 'circle',
                },
                boundary: {
                    width: 350,
                    height: 350
                },
                enableOrientation: true
            });
            $.getImage(event.target, croppie);

            var oldAvatar = $('#profile-pic').css('background-image');

            $("#upload-1").on("click", function () {
                croppie.result('base64', {
                    type: "canvas",
                    size: "original", 
                    format: "png", 
                    quality: 1
                }).then(function (base64) {
                    $("#uploadModal").modal("hide");
                    $('.profile-pic-cam').hide();
                    $('#profile-pic').css('background-image', 'url(/frontend/loader.gif)');

                    var url = `/avatar-upload`;
                    var formData = new FormData();
                    formData.append("avatar", $.base64ImageToBlob(base64));

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                    }).done(response => {
                        if (response.success != true) {
                            $('#profile-pic').css('background-image', oldAvatar);
                            showAlertMessage('danger', 'Oops! something went wrong');
                        } else {
                            $('#profile-pic').css('background-image', 'url(' + base64 + ')');
                            $('.profile-pic-cam').show();
                            // showAlertMessage('success', 'Successful');
                        }
                    }).fail(e => {
                        $('#profile-pic').css('background-image', oldAvatar);
                        showAlertMessage('danger', 'Unsupported Image Size or Format');
                    });
                });
            });
        });

        // update profile header
        $("#changeHeader").on("change", function (event) {
            $("#uploadModal").modal();
            $("#upload-2").show();
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
                enableOrientation: true
            });
            $.getImage(event.target, croppie);

            var oldHeader = $('#header-image').css('background-image');

            $("#upload-2").on("click", function () {
                croppie.result('base64', {
                    type: "canvas",
                    size: "original", 
                    format: "png", 
                    quality: 1
                }).then(function (base64) {
                    $("#uploadModal").modal("hide");
                    $('#header-image').css('background-image', 'url(/frontend/loader.gif)');

                    var url = `/header-upload`;
                    var formData = new FormData();
                    formData.append("header", $.base64ImageToBlob(base64));

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                    }).done(response => {
                        if (response.success != true) {
                            $('#header-image').css('background-image', oldHeader);
                            showAlertMessage('danger', 'Oops! something went wrong');
                        } else {
                            $('#header-image').css('background-image', 'url(' + base64 + ')');
                            // showAlertMessage('success', 'Successful');
                        }
                    }).fail(e => {
                        $('#header-image').css('background-image', oldHeader);
                        showAlertMessage('danger', 'Unsupported Image Size or Format');
                        // location.reload(true);
                    });
                });
            });
        });

        // To Rotate Image Left or Right
        $(".rotate").on("click", function () {
            croppie.rotate(parseInt($(this).data('deg')));
        });

        $('#uploadModal').on('hidden.bs.modal', function (e) {
            // This function will call immediately after model close
            // To ensure that old croppie instance is destroyed on every model close
            setTimeout(function () {
                croppie.destroy();
            }, 100);
            $("#upload-1").hide();
            $("#upload-2").hide();
        })
    });

    $('#show_location').change(function () {
        $(this).attr("disabled", true);

        var status = $(this).is(':checked') ? 1 : 0;

        $('#location-spinner').removeClass('d-none');
        $.ajax({
            type: 'GET',
            url: `/location/visibility`,
            data: {
                'status': status,
            },
            dataType: "json",
        }).done(response => {
            if (response.success != true) {
                $(this).prop("checked", !this.checked);
                $('#location-spinner').addClass('d-none');
                showAlertMessage('danger', 'Oops! something went wrong');
                location.reload();
            } else {
                showAlertMessage('success', 'Successful');
                $(this).removeAttr("disabled")
                $('#location-spinner').addClass('d-none');
                location.reload();
            }
        }).fail(e => {
            $(this).removeAttr("disabled")
            $(this).prop("checked", !this.checked);
            $('#location-spinner').addClass('d-none');
            showAlertMessage('danger', 'file format or size not supported');
            location.reload();
        });
    });

    $('#account_status').change(function () {
        $('#deactivateMdal').modal('show');

        $('#deactivateMdal').on('hidden.bs.modal', function (e) {
            $('#account_status').prop("checked", !this.checked);
        })

        $('#proceed').click(function () {
            $('#deactivateModal').modal('hide');
            $('#deactivate-spinner').removeClass('d-none');

            var status = $('#account_status').is(':checked') ? 1 : 0;

            $.ajax({
                type: 'GET',
                url: `/deactivate/account`,
                data: {
                    'status': status,
                },
                dataType: "json",
            }).done(response => {
                if (response.success != true) {
                    $('#account_status').prop("checked", !this.checked);
                    $('#deactivate-spinner').addClass('d-none');
                    showAlertMessage('danger', 'Oops! something went wrong');
                    location.reload();
                } else {
                    $('#account_status').prop("checked", !this.checked);
                    // showAlertMessage('success', 'Successful');
                    $(this).removeAttr("disabled")
                    $('#deactivate-spinner').addClass('d-none');
                    document.getElementById('logout-form').submit();
                }
            }).fail(e => {
                $('#account_status').prop("checked", !this.checked);
                $('#deactivate-spinner').addClass('d-none');
                showAlertMessage('danger', 'Oops! something went wrong');
                location.reload();
            });
        });
    });

    if(location.hash != null && location.hash != ""){
        $(location.hash + '.collapse').collapse('show');
    }

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
