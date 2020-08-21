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

    var fromLocHome = $('#use_home_address_for_from');
    var fromLocOffice = $('#use_office_address_for_from');
    var toLocHome = $('#use_home_address_for_to');
    var toLocOffice = $('#use_office_address_for_to');

    fromLocHome.attr("disabled", false);
    fromLocOffice.attr("disabled", false);
    toLocHome.attr("disabled", false);
    toLocOffice.attr("disabled", false);

    var from_address = $('#address_1');
    var from_location = $('#location_1');
    var from_latitude = $('#latitude_1');
    var from_longitude = $('#longitude_1');

    var to_address = $('#address_2');
    var to_location = $('#location_2');
    var to_latitude = $('#latitude_2');
    var to_longitude = $('#longitude_2');

    $('#clearFrom').click(function(){
        from_address.val('');
        from_location.val('');
        from_latitude.val('');
        from_longitude.val('');
        $('input:radio[name="from"]').prop('checked', false);
        toLocHome.attr("disabled", false);
        toLocOffice.attr("disabled", false);
        fromLocHome.attr("disabled", false);
        fromLocOffice.attr("disabled", false);
        $('#clearFrom').addClass('d-none');
    });

    $('#clearTo').click(function(){
        to_address.val('');
        to_location.val('');
        to_latitude.val('');
        to_longitude.val('');
        $('input:radio[name="to"]').prop('checked', false);
        toLocHome.attr("disabled", false);
        toLocOffice.attr("disabled", false);
        fromLocHome.attr("disabled", false);
        fromLocOffice.attr("disabled", false);

        $('#clearTo').addClass('d-none');
    });

    $('input:radio[name="from"]').change(function () {
        if (fromLocHome.is(':checked')) {
            toLocHome.attr("disabled", true);
            toLocOffice.attr("disabled", false);

            $('#clearFrom').removeClass('d-none');
            from_address.val($(this).data('address'));
            from_location.val($(this).data('location'));
            from_latitude.val($(this).data('latitude'));
            from_longitude.val($(this).data('longitude'));

        } else if (fromLocOffice.is(':checked')) {
            toLocOffice.attr("disabled", true);
            toLocHome.attr("disabled", false);
            $('#clearFrom').removeClass('d-none');
            from_address.val($(this).data('address'));
            from_location.val($(this).data('location'));
            from_latitude.val($(this).data('latitude'));
            from_longitude.val($(this).data('longitude'));

        } else {
            $('#clearFrom').addClass('d-none');
            toLocHome.attr("disabled", false);
            toLocOffice.attr("disabled", false);
        }
    });

    $('input:radio[name="to"]').change(function () {
        if (toLocHome.is(':checked')) {
            fromLocHome.attr("disabled", true);
            fromLocOffice.attr("disabled", false);

            $('#clearTo').removeClass('d-none');
            to_address.val($(this).data('address'));
            to_location.val($(this).data('location'));
            to_latitude.val($(this).data('latitude'));
            to_longitude.val($(this).data('longitude'));

        } else if (toLocOffice.is(':checked')) {
            fromLocOffice.attr("disabled", true);
            fromLocHome.attr("disabled", false);

            $('#clearTo').removeClass('d-none');
            to_address.val($(this).data('address'));
            to_location.val($(this).data('location'));
            to_latitude.val($(this).data('latitude'));
            to_longitude.val($(this).data('longitude'));

        } else {
            $('#clearTo').addClass('d-none');
            fromLocHome.attr("disabled", false);
            fromLocOffice.attr("disabled", false);
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

        // add from location image
        $("#from_image").on("change", function (event) {
            $("#uploadModal").modal();
            $("#upload-1").show();
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

            $("#upload-1").on("click", function () {
                croppie.result('base64', {
                    type: "canvas",
                    size: "original",
                    format: "png",
                    quality: 1
                }).then(function (base64) {
                    $("#uploadModal").modal("hide");
                    $('#fromImagePreviewDiv').removeClass('d-none');
                    $('#fromImagePreview').attr('src', base64);
                    $('#from_image_value').val(base64);
                });
            });
        });

        // add to location image
        $("#to_image").on("change", function (event) {
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

            $("#upload-2").on("click", function () {
                croppie.result('base64', {
                    type: "canvas",
                    size: "original",
                    format: "png",
                    quality: 1
                }).then(function (base64) {
                    $("#uploadModal").modal("hide");
                    $('#toImagePreviewDiv').removeClass('d-none');
                    $('#toImagePreview').attr('src', base64);
                    $('#to_image_value').val(base64);
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
        $('#fromImagePreviewDiv').addClass('d-none');
        $('#fromImagePreview').attr('src', 'http://placehold.it/100');
        $('#from_image_value').val('');
    });

    $('#removeToImage').click(function () {
        $('#toImagePreviewDiv').addClass('d-none');
        $('#toImagePreview').attr('src', 'http://placehold.it/100');
        $('#to_image_value').val('');
    });

});
