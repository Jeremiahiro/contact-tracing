jQuery(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
            // Initailize croppie instance and assign it to global variable
            croppie = new Croppie(el, {
                viewport: {
                    width: 250,
                    height: 250,
                    type: 'circle'
                },
                boundary: {
                    width: 300,
                    height: 300
                },
                enableOrientation: true
            });
            $.getImage(event.target, croppie);

            $("#upload").on("click", function () {
                croppie.result('base64').then(function (base64) {
                    $("#uploadModal").modal("hide");
                    $('#profile-pic').css('background-image', 'url(' + base64 + ')');

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
                            showAlertMessage('danger', 'Oops! something went wrong');
                        } else {
                            console.log(response.img_url);
                            showAlertMessage('success', 'successful');
                        }
                    }).fail(e => {
                        showAlertMessage('danger', 'file format or size not supported');
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
        })
    });

});

function removeAlertMessage() {
    setTimeout(function () {
        $(".alert").remove();
    }, 3000);
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
