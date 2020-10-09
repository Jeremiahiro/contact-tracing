<div class="modal fade right" id="user_preference" tabindex="-1" role="dialog"
    aria-labelledby="user_preference_label">
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
                <div class="my-2 text-uppercase text-center">Preferences</div>

                <div id="updatePrefrences" method="post" class="">

                    {{-- Toggle Activity Visibility --}}
                    <div class="form-group my-3 border-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="f-14 bold m-0">Others Can See My Activity</p>
                            </div>
                            <div class="">
                                <div class="spinner-border text-primary ml-2 spinner-border-sm d-none"
                                    id="toggle_location_spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <label class="switch">
                                    <input type="checkbox" data-id="{{ $user->uuid }}" name="show_location"
                                        id="toggle_location" class="toggle_location"
                                        {{ $user->show_location == true ? 'checked' : '' }} />
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                        </div>
                        <div class="text-muted f-12">
                            This allows other users on the platform see your activity when they veiw your profile
                        </div>
                    </div>

                    {{-- Toggle Background Activity --}}
                    <div class="form-group my-3 border-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="f-14 bold m-0">Background Activity</p>
                            </div>
                            <div class="">
                                <div class="spinner-border text-primary ml-2 spinner-border-sm d-none"
                                    id="background_activity_spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <label class="switch">
                                    <input type="checkbox" data-id="{{ $user->uuid }}" name="background_activity"
                                        id="background_activity" class="account_status"
                                        {{ $user->background_activity == true ? 'checked' : '' }} />
                                    <span class="toggle-slider"></span>
                                </label>

                            </div>
                        </div>
                        <div class="text-muted f-12">
                            This feature allows the application use geolocation on your device. See the 
                        <a href="{{ route('privacy') }}" class="text-primary">Privacy Policy</a> for more information on data usage
                        </div>
                    </div>

                    {{-- Toggle Notification --}}
                    <div class="form-group my-3 border-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="f-14 bold m-0 text-muted">Notification</p>
                            </div>
                            <div class="">
                                <div class="spinner-border text-primary ml-2 spinner-border-sm d-none"
                                    id="toggle_notification_spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <label class="switch">
                                    <input type="checkbox" data-id="{{ $user->uuid }}" name="status"
                                        id="toggle_notification" class="toggle_notification" 
                                        disabled />
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>
                        </div>
                        <div class="text-muted f-12">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius alias doloremque voluptates
                            blanditiis magni ipsum? Architecto!
                        </div>
                    </div>

                    {{-- Deactivate Account --}}
                    <div class="form-group my-3 border-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="f-14 bold m-0 text-danger">Deactivate Account</p>
                            </div>
                        </div>
                        <div class="text-muted f-12">
                            If you want to take a break, you can deactivate your account.
                        </div>
                        <div class="text-right mb-2">
                            <button class="btn red-btn btn-sm text-white" type="button" data-toggle="modal"
                                data-target="#deactivate_user_account" aria-expanded="false">
                                Proceed
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('profile.partials.user_account_deactivate')
</div>
