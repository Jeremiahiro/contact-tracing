jQuery(document).ready(function ($) {

    // fetch users from db
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

    // tagging function
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

    $(".remove").hide()

    var counter = $(".form-dup-counter").text();

    // Use clone() to copy element and use before() to insert element before selector.
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

    /**
     * check if local storage has data
     * get five latest data and display
     */
    if (localStorage.hasOwnProperty('trackedLocations')) {

        const loggedLocations = JSON.parse(localStorage.getItem('trackedLocations')) || []; // get data from local storage

        if (loggedLocations.length >= 5) {
            var locs = loggedLocations.slice(Math.max(loggedLocations.length - 5, 0))
        } else {
            var locs = loggedLocations;
        }
        for (var i = 0; i < locs.length; i++) {

            var $locationData = '';
            $locationData += '<input class="existingLoc" type="radio" name="loc_data" id="use_logged_address-' + i + 1 + '"';
            $locationData += 'value=" "';
            $locationData += 'data-id="' + i + 1 + '"';
            $locationData += 'data-address="' + locs[i].address + '"';
            $locationData += 'data-latitude="' + locs[i].location.lat + '"';
            $locationData += 'data-longitude="' + locs[i].location.lng + '"';
            $locationData += 'data-street="' + locs[i].street + '"';
            $locationData += 'data-locality="' + locs[i].city + '"';
            $locationData += 'data-administrative_area_level_1="' + locs[i].state + '"';
            $locationData += 'data-country="' + locs[i].country + '"';
            $locationData += 'data-created_at="' + moment(locs[i].created_at).format("DD-MM-YYYY HH:mm") + '"';
            $locationData += '>';
            $locationData += '<label class="light f-12" for="use_logged_address-' + i + 1 + '" >' + locs[i].address + '</label>';

            $('#logs_div').removeClass('d-none');
            $('#logs').append($locationData);

        }
    }

    // show additional input to select location and add image
    $("#address").focusin(function () {
        $("#collapseFromInfo").collapse('show');
    });

    // dateTime field
    $('.input-daterange').click(function () {
        $("#collapseFromInfo").collapse('hide');
    });

    $('.activity_tagging').click(function () {
        $("#collapseFromInfo").collapse('hide');
    });

    // additional button to hide div
    $('#closeFromInfo').click(function () {
        $("#collapseFromInfo").collapse('hide');
    });

    var address = $('#address');
    var latitude = $('#latitude');
    var longitude = $('#longitude');
    var street = $('#street');
    var locality = $('#locality');
    var administrative_area_level_1 = $('#administrative_area_level_1');
    var country = $('#country');
    var created_at = $('#startDate');

    $('#clearFrom').click(function () {
        address.val('');
        latitude.val('');
        longitude.val('');
        street.val('');
        locality.val('');
        administrative_area_level_1.val('');
        country.val('');
        created_at.val('');
        $('input:radio[name="loc_data"]').prop('checked', false);
        $('input:radio[name="loc_data"]').attr('disabled', false);
        $('#clearFrom').addClass('d-none');
    });

    loc_data = $('input[name="loc_data"]')

    loc_data.change(function () {

        loc_data.each(function (idx, el) {

            if ($(el).is(':checked')) {
                $('#clearFrom').removeClass('d-none');
                address.val($(el).data('address'));
                latitude.val($(el).data('latitude'));
                longitude.val($(el).data('longitude'));
                street.val($(el).data('street'));
                locality.val($(el).data('locality'));
                country.val($(el).data('country'));
                administrative_area_level_1.val($(el).data('administrative_area_level_1'));
                created_at.val($(el).data('created_at'));
            }
        });
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

        // add from location image
        $("#location_image").on("change", function (event) {
            $("#upload_image_modal").modal();
            $("#upload_image").removeClass('d-none');
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

            $("#upload_image").on("click", function () {
                croppie.result('base64', {
                    type: "canvas",
                    size: "original",
                    format: "png",
                    quality: 1
                }).then(function (base64) {
                    $("#upload_image_modal").modal("hide");
                    $('label[for="location_image"]').hide()
                    $('#remove_image').removeClass('d-none');
                    $('#location_image_preview_div').removeClass('d-none');
                    $('#location_image_preview').attr('src', base64);

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
                            $('#location_image_value').val(response.image_url);
                        },
                        error: function (xhr) {
                            const jsonResponse = JSON.parse(xhr.responseText);
                            showAlertMessage('danger', jsonResponse['message']);
                            $('#location_image_value').val('');
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

    $('#remove_image').click(function () {
        $('label[for="location_image"]').show()
        $('#remove_image').addClass('d-none');
        $('#location_image_preview_div').addClass('d-none');
        $('#location_image_preview').attr('src', 'http://placehold.it/100');

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
                $('#location_image_value').val(data);
            } else {
                $('#location_image_preview_div').addClass('d-none');
                $('#location_image_value').val('');
            }
        }).fail(e => {
            $('#location_image_value').val(data);
        });

    });

    // console.log("loc", loggedLocations)
    // $('#removeToImage').click(function () {
    //     $('#toImagePreviewDiv').addClass('d-none');
    //     $('#toImagePreview').attr('src', 'http://placehold.it/100');
    //     $('#to_image_value').val('');
    // });

});
