jQuery(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#show_location').change(function () {
        $('#location-spinner').removeClass('d-none');
        var userID = $(this).data('id');
        var status = $(this).is(':checked') ? 1 : 0;
        $.ajax({
            type: 'PATCH',
            url: `/location/visibility`,
            data: {
                'status': status,
                'userID': userID
            },
        }).done(response => {
            if (response.success != true) {
                $(this).prop("checked", !this.checked);
                alert("Oops! something went wrong.");
            }
            alert("Operation Successful.");
            $(this).removeAttr("disabled")
            $('#location-spinner').addClass('d-none');
        }).fail(e => {
            $(this).removeAttr("disabled")
            $(this).prop("checked", !this.checked);
            $('#location-spinner').addClass('d-none');
            showAlertMessage('danger', 'file format or size not supported');
        });
        // success: function (data) {
        //     if (data.success) {
        //         $('#location-spinner').addClass('d-none');
        //         alert(data.success);
        //     } else {
        //         $(this).prop("checked", !this.checked);
        //         alert(data.success);
        //     }
        // }
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
