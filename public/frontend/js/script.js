jQuery(document).ready(function ($) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // alert timeout
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);


    $('.count').each(function () {
        var $this = $(this);
        jQuery({
            Counter: 0
        }).animate({
            Counter: $this.text()
        }, {
            duration: 7000,
            easing: 'swing',
            step: function () {
                $this.text(Math.ceil(this.Counter));
            }
        });
    });
});
