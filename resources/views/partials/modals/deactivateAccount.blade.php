<div class="modal fade" tabindex="1" id="deactivateMdal" role="dialog" aria-labelledby="deactivateMdalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-bottom-lg route_purple m-0 p-3" style="pointer-events:auto;" role="document">
        <div class="d-flex justify-content-between mb-0">
            @if ($user->status == true)
            <h3 class="m-0 bold f-14">Deactivate Account</h3>
            @else
            <h3 class="m-0 bold f-14">Re-Activate Account</h3>
            @endif
            <button type="button" style="opacity:1;" class="btn close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><img src="{{ asset('/frontend/img/svg/Icon-close-circle.svg')}}"
                        alt="map-pin"></span>
            </button>
        </div>
        <div class="my-2 text-center">
            <div>
                @if ($user->status == true)
                <p class="f-16 m-0 py-2">
                    If you deactivate your account, you will not receive emails and users will not be able to interact with you.
                </p>
                @else
                <p class="f-16 m-0 py-2">
                    Esse esse tempor ad incididunt tempor amet culpa ut cillum exercitation nulla.
                </p>
                @endif
            </div>
            <div class="m-1">
                <button type="button" class="mx-2 btn blue-btn text-white" id="cancel" data-dismiss="modal">
                    Cancel
                </button>

                <button type="button" class="mx-2 btn red-btn text-white" data-id="{{ $user->uuid }}" id="proceed">
                    Proceed
                </button>
            </div>
        </div>

    </div>
</div>
