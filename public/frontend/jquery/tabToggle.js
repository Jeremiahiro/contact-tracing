jQuery(document).ready(function ($) {

    var tab1Label = $("#tab1Label");
    var tab2Label = $("#tab2Label");
    var tab1 = $("#tab1");
    var tab2 = $("#tab2");

    tab1.addClass('show');
    tab2.addClass('hide');

    tab1Label.click(function () {
        tab1.removeClass('hide');
        tab2.addClass('hide');
        tab1Label.addClass('bold').removeClass('light');
        tab2Label.addClass('light').removeClass('bold');
    });

    tab2Label.click(function () {
        tab2.removeClass('hide');
        tab1.addClass('hide').removeClass('show')
        tab2Label.addClass('bold').removeClass('light');
        tab1Label.addClass('light').removeClass('bold');
    });
});
