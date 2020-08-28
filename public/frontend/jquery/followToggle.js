jQuery(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.action-follow').click(function () {
        $('#follow-spinner').removeClass('d-none');
        var userID = $(this).data('id');
        var status = $('.F-status').val();
        var cObj = $(this);
        var c = $(this).parent("div").find(".tl-follower").text();

        $.ajax({
            type: 'POST',
            url: '/follow',
            data: {
                userID: userID,
                status: status
            },
            success: function (data) {
                if (data.attach != true) {
                    cObj.find("strong").text("FOLLOW");
                    cObj.parent("div").find(".tl-follower").text(parseInt(c) - 1);
                    $('.F-status').val(0);
                    $('#follow-spinner').addClass('d-none');
                } else {
                    cObj.find("strong").text("UNFOLLOW");
                    cObj.parent("div").find(".tl-follower").text(parseInt(c) + 1);
                    $('.F-status').val(1);
                    $('#follow-spinner').addClass('d-none');
                }
            }
        });
    });

    var notification = $('#notification_count');
    notification.hide();

    $(function fetchNotification() {

        setTimeout(function () {
            $.ajax({
                url: `get_data`,
                type: "GET",
                data: {
                    'type': 'notification'
                },
                success: function (data) {
                    if (data.notification.length) {
                        notification.show();
                        notification.html(data.notification.length);
                    } 
                },
                error(e){
                    // console.log(e['responseText']);
                },
                complete: fetchNotification
            });
        }, 5000);
    });

});
