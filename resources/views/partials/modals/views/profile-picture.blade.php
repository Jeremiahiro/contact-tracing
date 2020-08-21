<div class="modal fade" id="profilePictureModal" tabindex="-1" role="dialog" aria-labelledby="sideNavlLabel">
    <div class="modal-dialog full-modal m-0 p-0" role="document">
        <div class="modal-content full-modal-content side_nav_purple text-primary">
            <div class="d-flex justify-content-end p-3">
                <button type="button" class="close opacity-1 float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <img src="{{ asset('/frontend/img/svg/back.svg') }}" alt="go back">
                    </span>
                </button>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <div class="mt-5 pt-3">
                    <img class="avatar avatar-xxl" src="{{ $user->avatar }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
