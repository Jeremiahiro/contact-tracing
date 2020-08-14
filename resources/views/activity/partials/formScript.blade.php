<script type="text/javascript">
    jQuery(document).ready(function ($) {

        $('#user').on('keyup', function () {
            var query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: "{{ route('users.search') }}",
                    type: "GET",
                    data: {
                        'user': query
                    },
                    success: function (data) {
                        $('#user_list').html(data);
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
            var reqInp = $('.form-dup').last().find('input[name="name[]"]');
            reqInp.removeClass("invalid");
            if (reqInp.val().trim() === "") {
                var clone = $(".form-dup:first").clone(false);
                reqInp.addClass("invalid");
            } else {
                if ($('.form-dup').length === 10) {
                    alert('You cannot add more than 10 persons at once');
                    $(".add").hide()
                }
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

    });

</script>