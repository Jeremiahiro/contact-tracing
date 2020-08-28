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
        text: `WELCOME !!
     You can take this tour to get started , click next to continue or 
     end tour by clicking on the skip button.`,
        attachTo: {
            element: '#startTour',
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
        text: `Click here to go to your Dashboard.`,
        attachTo: {
            element: '#tourStep1',
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
                    return this.next();
                },
                text: 'Next'
            }
        ],
        id: 'creating'
    });

    tour.addStep({
        text: `Click here to add your From location and its image or pick from your favourite locations.`,
        attachTo: {
            element: '#tourStep2',
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
                    return this.next();
                },
                text: 'Next'
            }
        ],
        id: 'creating'
    });

    tour.addStep({
        text: `Click here to add your To location and its image or pick from your favourite locations.`,
        attachTo: {
            element: '#tourStep3',
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
                    return this.next();
                },
                text: 'Next'
            }
        ],
        id: 'creating'
    });

    tour.addStep({
        text: `Close your Where section by clicking here.`,
        attachTo: {
            element: '#tourStep4',
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
                    return this.next();
                },
                text: 'Next'
            }
        ],
        id: 'creating'
    });

    tour.addStep({
        text: `Click here to add an already existing user on the platform as a connection.`,
        attachTo: {
            element: '.tourStep5',
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
                    return this.next();
                },
                text: 'Next'
            }
        ],
        id: 'creating'
    });
    

    tour.addStep({
        text: `Click here to add a new user as a connection.`,
        attachTo: {
            element: '.tourStep6',
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