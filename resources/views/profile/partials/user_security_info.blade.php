<div class="modal fade right" id="user_security_info" tabindex="-1" role="dialog"
    aria-labelledby="user_security_info_label">
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
                <div class="my-2 text-uppercase text-center">Update Password</div>
           
                <form action="{{ route('dashboard.password') }}" id="update_user_password" method="post" class="">
                    @csrf
                    @if ($user->password != null)
                    <div class="form-group mb-1">
                        <label for="age_range" class="m-0 p-0 bold f-14">Current Password:</label>
                        <input type="password"
                            class="blue-input input rounded-0 @error('current_password') is invalid @enderror"
                            name="current_password" value="" placeholder="Current Password">
                    </div>
                    @endif

                    <div class="form-group mb-1">
                        <label for="age_range" class="m-0 p-0 bold f-14">New Password:</label>
                        <input type="password"
                            class="blue-input input rounded-0 @error('password') is invalid @enderror" name="password" id="password"
                            value="" placeholder="New Password" required 
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Password must contain at least 8 characters, including UPPER/lowercase and numbers">
                    </div>

                    <div class="form-group mb-1">
                        <label for="age_range" class="m-0 p-0 bold f-14">Confirm New Password:</label>
                        <input type="password"
                            class="blue-input input rounded-0 @error('password-confirm') is invalid @enderror"
                            name="password_confirmation" value="" 
                            id="password_confirmation"  placeholder="Confirm New Password" 
                            required
                            {{-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" --}}
                            {{-- title="Password must contain at least 8 characters, including UPPER/lowercase and numbers"> --}}
                            >
                    </div>

                    <div class="form-group m-3 row">
                        <button type="submit" class="mb-5 btn btn-lg blue-btn text-white w-100">
                            <span class="spinner-border spinner-border-sm d-none" id="update_password_spinner" role="status" aria-hidden="true"></span>
                            <span id="update_password_submit">Update</span>
                        </button>
                    </div>
                </form>

                <div class="light my-2">
                    <div class="f-18">Create a strong password</div>
                    <div class="f-16 light">A strong password helps you:</div>
                    <div class="ml-4">
                        <ul class="">
                            <li class="f-16 regular">Keep your personal info safe</li>
                            <li class="f-16 regular">Protect your emails, files, and other content</li>
                            <li class="f-16 regular">Prevent someone else from getting in to your account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
