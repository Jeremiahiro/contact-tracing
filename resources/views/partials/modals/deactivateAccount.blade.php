    <div class="modal fade" id="deactivate-modal" tabindex="-1" role="dialog" aria-labelledby="deactivateAccountLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-bottom route_purple text-center m-0 py-4" style="pointer-events:auto;" role="document">
            <p class="f-18 m-0 py-2">ARE YOU SURE ABOUT THIS ?</p>
            <div class="py-3">
                <span>
                    <button data-id="{{ $user->uuid }}" class="deactivateAccount btn blue-btn " type="button"
                    id="deactivateAccount">YES</button>
                </span>

                <span>
                    <button type="button" class="btn border-0 btn-danger" id="cancel" data-dismiss="modal">NO</button>
                </span>
        
            </div>
        </div>
    </div>