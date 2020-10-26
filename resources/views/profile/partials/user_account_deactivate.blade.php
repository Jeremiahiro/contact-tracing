<div class="modal fade right" id="deactivate_user_account" tabindex="-1" role="dialog"
    aria-labelledby="deactivate_user_account_label">
    <div class="modal-dialog full-modal m-0 p-0" role="document">
        <div class="modal-content full-modal-content text-primary">
            <div class="modal-body m-2">
                <div class="row">
                    <button type="button" class="close opacity-1 ml-auto mb-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <img src="{{ asset('/frontend/img/svg/back_blue.svg') }}" alt="go back">
                        </span>
                    </button>
                </div>
                <div class="my-2 text-uppercase text-center">Deactivate Account</div>

                <div>
                    <p class="f-16 regular">
                        Deactivating your account will disable your profile and remove your name and activities from most things you've shared.
                    </p>
                    <p class="f-16 regular">
                        Some information may still be visible to others, such as your name in their friends list, locations your are tagged to etc.
                        See the <a href="{{ route('privacy') }}" class="text-primary f-16 bold">privacy policy</a> for more information on data usage
                    </p>
                    <p class="f-16 regular">
                        You can restore your account if it was accidentally or wrongfully deactivated by loggin in.
                    </p>
                    <p class="f-16 regular">
                        If you just want to change your @username, you don’t need to deactivate your account — edit it in your .
                    </p>
                    <p class="f-16 regular">
                        If you have any complaints or concern about the platform, contact <br /> <span class="bold">admin@i-amvocal.org</span>.
                    </p>
                </div>

                <form action="{{ route('deactivate.account') }}" id="deactivate_user" method="get" class="">
                    @csrf
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="confirm_deactivate">
                        <label class="form-check-label f-14" for="confirm_deactivate">
                            I have read the 
                            <a href="{{ route('privacy') }}" class="text-primary text-underline">privacy policy</a>
                            and 
                            <a href="{{ route('tos') }}" class="text-primary text-underline">terms of use</a> and wish to proceed
                        </label>
                      </div>
    
                    <div class="m-1 text-center">
                        <button type="button" class="mx-2 btn blue-btn text-white btn-sm" id="cancel" data-dismiss="modal">
                            Cancel
                        </button>
        
                        <button type="submit" class="mx-2 btn red-btn text-white btn-sm"
                            id="deactivate_account_btn" disabled>
                            Proceed
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
