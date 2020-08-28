jQuery(document).ready(function ($) {

    $('#user').on('keyup', function () {
        var query = $(this).val();
        if (query.length > 0) {
            $.ajax({
                url: `/users/search`,
                type: "GET",
                data: {
                    'user': query
                },
                success: function (data) {
                    $('#user_list').html(data);
                },
                error(xhr) {
                    console.log(xhr);
                }
            })
        }
    });

    var data = [];
    var tag = $('#tags');

    tag.hide();

    $(document).on('click', '.userInfo', function () {
        var username = $(this).find("p").text();
        data.push(username);
        tag.show();
        tag.val(data);
        $('#user_list').html("");
        $('#user').val("");

        $('input[name="tags"]').amsifySuggestags({
            suggestions: data,
            whiteList: true,
            tagLimit: 15
        });
    });

    // Use clone() to copy element and use before() to insert element before selector.
    $(".remove").hide()

    var counter = $(".form-dup-counter").text();
    var step = $("fieldset").data("step");

    $(".add").click(function () {
        var nameInput = $('.form-dup').last().find('input[name="name[]"]');
        var emailInput = $('.form-dup').last().find('input[name="email[]"]');
        var phoneInput = $('.form-dup').last().find('input[name="phone[]"]');
        nameInput.removeClass("invalid");
        emailInput.removeClass("invalid");
        phoneInput.removeClass("invalid");
        if (nameInput.val().trim() === "") {
            var clone = $(".form-dup:first").clone(false);
            nameInput.addClass("invalid");
        } else if (emailInput.val().trim() === "" && phoneInput.val().trim() === "") {
            emailInput.addClass("invalid");
            phoneInput.addClass("invalid");
        } else if ($('.form-dup').length === 10) {
            alert('You cannot add more than 10 persons at once');
            $(".add").hide()
        } else {
            var clone = $(".form-dup:first").clone(true);
            clone.find("input").val("");
            $(".buttonBox").before(clone);
            counter++;
            $(".form-dup-counter").text(counter);
            $(".remove").show()
        }

    });
    $(".remove").click(function () {
        if ($('.form-dup').length > 1) {
            $('.form-dup').last().remove();
            counter--;
            $(".form-dup-counter").text(counter);
        }
        if ($('.form-dup').length < 10) {
            $(".add").show()
        }
    });

    $("#address_1").focusin(function () {
        $("#collapseFromInfo").collapse('show');
        $("#collapseToInfo").collapse('hide');
        $('#sideIcon-2').removeClass('d-none')
        $('#sideIcon-1').addClass('d-none')
    });
    $('#sideIcon-2').click(function () {
        $("#collapseFromInfo").collapse('hide');
        $("#collapseToInfo").collapse('hide');
        $('#sideIcon-2').addClass('d-none')
        $('#sideIcon-1').removeClass('d-none')
    });

    $("#address_2").focusin(function () {
        $("#collapseFromInfo").collapse('hide');
        $("#collapseToInfo").collapse('show');
        $('#sideIcon-2').removeClass('d-none')
        $('#sideIcon-1').addClass('d-none')
    });

    $('#sideIcon-2').click(function () {
        $("#collapseFromInfo").collapse('hide');
        $("#collapseToInfo").collapse('hide');
        $('#sideIcon-2').addClass('d-none')
        $('#sideIcon-1').removeClass('d-none')
    });

    $('.input-daterange').click(function () {
        $("#collapseFromInfo").collapse('hide');
        $("#collapseToInfo").collapse('hide');
        $('#sideIcon-2').addClass('d-none')
        $('#sideIcon-1').removeClass('d-none')
    });

    $('.activity_tagging').click(function () {
        $("#collapseFromInfo").collapse('hide');
        $("#collapseToInfo").collapse('hide');
        $('#sideIcon-2').addClass('d-none')
        $('#sideIcon-1').removeClass('d-none')
    });

    var from_address = $('#address_1');
    var from_location = $('#location_1');
    var from_latitude = $('#latitude_1');
    var from_longitude = $('#longitude_1');

    var to_address = $('#address_2');
    var to_location = $('#location_2');
    var to_latitude = $('#latitude_2');
    var to_longitude = $('#longitude_2');

    $('#clearFrom').click(function () {
        from_address.val('');
        from_location.val('');
        from_latitude.val('');
        from_longitude.val('');
        $('input:radio[name="from"]').prop('checked', false);
        $('input:radio[name="from"]').attr('disabled', false);
        $('input:radio[name="to"]').attr('disabled', false);
        $('#clearFrom').addClass('d-none');
        $('label[for="from_image"]').show();
    });

    $('#clearTo').click(function () {
        to_address.val('');
        to_location.val('');
        to_latitude.val('');
        to_longitude.val('');
        $('input:radio[name="to"]').prop('checked', false);
        $('input:radio[name="to"]').attr('disabled', false);
        $('input:radio[name="from"]').attr('disabled', false);
        $('#clearTo').addClass('d-none');
        $('label[for="to_image"]').show();
    });

    from = $('input:radio[name="from"]')
    to = $('input:radio[name="to"]')

    from.change(function () {
        from.each(function (idx, el) {

            selectedValueID = $(el).data('id');

            if ($(el).is(':checked')) {
                selectdTo = $('#use_address_for_to-' + selectedValueID).attr("disabled", true);
                $('#clearFrom').removeClass('d-none');
                from_address.val($(el).data('address'));
                from_location.val($(el).data('location'));
                from_latitude.val($(el).data('latitude'));
                from_longitude.val($(el).data('longitude'));
                $('label[for="from_image"]').hide()
            } else {
                selectdTo = $('#use_address_for_to-' + selectedValueID).attr("disabled", false);
            }
        });
    });

    to.change(function () {
        to.each(function (idx, el) {

            selectedValueID = $(el).data('id');

            if ($(el).is(':checked')) {
                selectdTo = $('#use_address_for_from-' + selectedValueID).attr("disabled", true);
                $('#clearTo').removeClass('d-none');
                to_address.val($(el).data('address'));
                to_location.val($(el).data('location'));
                to_latitude.val($(el).data('latitude'));
                to_longitude.val($(el).data('longitude'));
                $('label[for="to_image"]').hide()
            } else {
                selectdTo = $('#use_address_for_from-' + selectedValueID).attr("disabled", false);
            }
        });
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

        // add from location image
        $("#from_image").on("change", function (event) {
            $("#uploadModal").modal();
            $("#upload-1").show();
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

            $("#upload-1").on("click", function () {
                croppie.result('base64', {
                    type: "canvas",
                    size: "original",
                    format: "png",
                    quality: 1
                }).then(function (base64) {
                    $("#uploadModal").modal("hide");
                    $('label[for="from_image"]').hide()
                    $('#removeFromImage').removeClass('d-none');
                    $('#fromImagePreviewDiv').removeClass('d-none');
                    $('#fromImagePreview').attr('src', base64);

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
                    }).done(response => {
                        if (response.success != true) {
                            $('#from_image_value').val('');
                            showAlertMessage('danger', 'Oops! something went wrong');
                        } else {
                            $('#from_image_value').val(response.image_url);
                        }
                    }).fail(e => {
                        $('#from_image_value').val('');
                        showAlertMessage('danger', 'Unsupported Image Size or Format');
                    });
                });
            });
        });

        // add to location image
        $("#to_image").on("change", function (event) {
            $("#uploadModal").modal();
            $("#upload-2").show();
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

            $("#upload-2").on("click", function () {
                croppie.result('base64', {
                    type: "canvas",
                    size: "original",
                    format: "png",
                    quality: 1
                }).then(function (base64) {
                    $("#uploadModal").modal("hide");
                    $('label[for="to_image"]').hide()
                    $('#removeToImage').removeClass('d-none');
                    $('#toImagePreviewDiv').removeClass('d-none');
                    $('#toImagePreview').attr('src', base64);

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
                    }).done(response => {
                        if (response.success != true) {
                            $('#to_image_value').val('');
                            showAlertMessage('danger', 'Oops! something went wrong');
                        } else {
                            $('#to_image_value').val(response.image_url);
                        }
                    }).fail(e => {
                        $('#to_image_value').val(base64);
                        showAlertMessage('danger', 'Unsupported Image Size or Format');
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

    $('#removeFromImage').click(function () {
        $('label[for="from_image"]').show()
        $('#removeFromImage').addClass('d-none');
        $('#fromImagePreviewDiv').addClass('d-none');
        $('#fromImagePreview').attr('src', 'http://placehold.it/100');

        var url = `/image-delete`;
        var image_url = $('#from_image_value').val();
        console.log(image_url);

        var formData = new FormData();
        formData.append("image_url", image_url);

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
        }).done(response => {
            if (response.success != true) {
                $('#from_image_value').val(data);
            } else {
                $('#from_image_value').val('');
            }
        }).fail(e => {
            $('#from_image_value').val(data);
        });

    });

    $('#removeToImage').click(function () {
        $('#toImagePreviewDiv').addClass('d-none');
        $('#toImagePreview').attr('src', 'http://placehold.it/100');
        $('#to_image_value').val('');
    });

});
