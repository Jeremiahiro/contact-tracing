$(document).ready(function() {
    $("fieldset[data-step]").hide();
    $("#prev-btn").hide();
    $("fieldset[data-step=1]").show();

    $("#next-btn").click(function(e) {
        e.preventDefault();
        var step = $("section").data("step");
        var isValid = true;
        $("input").attr("required", true);
        console.log('here');
        $("fieldset[data-step='" + step + "'] input[required='required']").each(function(idx, elem) {
            console.log('in');
            $(elem).removeClass("error");
            if($(elem).val().trim() === "") {
                isValid = false;
                $(elem).addClass("error");
            }
        });
        if(isValid) {
            step += 1;
            $("section").data("step", step);
            $("fieldset[data-step]").hide();
            $("fieldset[data-step='" + step + "']").show();
            $("#prev-btn").show();
        }
    });
    $("#prev-btn").click(function(e) {
        e.preventDefault();
        var step = $("section").data("step");
        step -= 1;
        $("section").data("step", step);
        $("fieldset[data-step]").hide();
        $("fieldset[data-step='" + step + "']").show();
        if(step === 1) {
            $("#prev-btn").hide();
        }
    });
});