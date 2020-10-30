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

    // number counter
    $('.counter').each(function () {
        var $this = $(this),
            countTo = $this.attr('data-count');
        $({
            countNum: $this.text()
        }).animate({
            countNum: countTo
        }, {
            duration: 3000,
            easing: 'linear',
            step: function () {
                $this.text(Math.floor(this.countNum));
            },
            complete: function () {
                $this.text(this.countNum);
            }
        });
    });

    // target all the menu sections
    const menus = $(".footer-menu");

    // listen for a click event on the "button"
    $("#footer-toggle-menu").click(function () {
        toggleMenu();
    });

    function toggleMenu() {
        for (const child of menus) {
            child.classList.toggle("footer-menu--active");
        }
        $('#footer-vertical-icon').toggle("footer-menu--close");
        $('#footer-horizontal-icon').toggle("slow");
        // $('#footer-horizontal-icon').toggle("slow");
    }
});
