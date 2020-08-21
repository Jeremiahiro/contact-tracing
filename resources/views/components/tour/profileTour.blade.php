
@if(is_new_user())
<script>
    const tour = new Shepherd.Tour({
        defaultStepOptions: {
            cancelIcon: {
                enabled: true
            },
            classes: 'class-1 class-2',
            scrollTo: {
                behavior: 'smooth',
                block: 'center'
            }
        }
    });

    tour.addStep({
        text: `Click here to update your Home and Office address`,
        attachTo: {
            element: '.ProfiletourStep1',
            on: 'bottom'
        },
        buttons: [{
                action() {
                    return this.next();
                },
                text: 'Next'
            },
            {
                action() {
                    $.ajax({
                        type: 'GET',
                        url: `/walkthrough/complete`,
                    }).done(data => {
                        console.log(data.response);
                    }).fail(e => {
                        console.log(data).response;
                    });
                    return this.complete();
                },
                text: 'Skip'
            }
        ],
        id: 'creating'
    });

    tour.addStep({
        text: `Click here to Edit your profile.`,
        attachTo: {
            element: '.ProfiletourStep2',
            on: 'bottom'
        },
        buttons: [{
                action() {
                    return this.back();
                },
                classes: 'shepherd-button-secondary',
                text: 'Back'
            },
            {
                action() {
                    $.ajax({
                        type: 'GET',
                        url: `/walkthrough/complete`,
                    }).done(data => {
                        console.log(data.response);
                    }).fail(e => {
                        console.log(data).response;
                    });
                    return this.complete();
                },
                text: 'End'
            }
        ],
        id: 'creating'
    });

    tour.start();

</script>

<script>
    jQuery(document).ready(function ($) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        // var shep = $('.shepherd-footer .shepherd-button:last-child');

        // shep.click(function () {
        //     // skipWalkthrough();

        // });

        function skipWalkthrough() {
            $.ajax({
                type: 'GET',
                url: `/walkthrough/complete`,
            }).done(response => {
                if (response.success != true) {
                    console.log(data.success);
                } else {
                    console.log(data.success);
                }
            }).fail(e => {
                console.log(data.success);
            });
        }

    });

</script>
@endif