<div class="modal fade right" id="user_info" tabindex="-1" role="dialog" aria-labelledby="user_info_label">
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
                <div class="my-2 text-uppercase text-center">Update Profile Information</div>
                <form action="{{ route('dashboard.update') }}" id="update_user_info" method="post" class="">
                    @csrf

                    <div class="form-group mb-1">
                        <label for="email" class="m-0 p-0 bold f-14">Email:</label>
                        <input type="email" class="blue-input input rounded-0" name="email" value="{{ $user->email }}"
                            id="email" readonly>
                    </div>

                    <div class="form-group mb-1">
                        <label for="name" class="m-0 p-0 bold f-14">Full Name:</label>
                        <input type="text" class="blue-input input rounded-0 @error('name') is invalid @enderror"
                            name="name" value="{{ old('name', $user->name) }}" id="name" autofocus required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-1">
                        <label for="username" class="m-0 p-0 bold f-14">Username:</label>
                        <input type="text" class="blue-input input rounded-0 @error('username') is invalid @enderror"
                            name="username" value="{{ old('username', $user->username) }}" id="username" required>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-1">
                        <label for="phone" class="m-0 p-0 bold f-14">Phone Number:</label>
                        <input type="tel" class="blue-input input rounded-0 @error('phone') is invalid @enderror"
                            name="phone" value="{{ old('phone', $user->phone) }}" id="phone" required>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-1">
                        <label for="gender" class="m-0 p-0 bold f-14">Gender:</label>
                        <select class="input blue-input @error('gender') is-invalid @enderror" name="gender"
                            id="gender">
                            <option value="" selected disabled hidden>Select Gender...</option>
                            <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }} class="regular">
                                Male
                            </option>
                            <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }} class="regular">
                                Female
                            </option>
                            <option value="Others" {{ $user->gender == 'Other' ? 'selected' : '' }} class="regular">
                                Others
                            </option>
                        </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="age_range" class="m-0 p-0 bold f-14">Age Range:</label>
                        <select class="blue-input input @error('age_range') is-invalid @enderror" name="age_range"
                            id="age_range">
                            <option class="regular" value="" selected disabled hidden>Select Age Range...</option>
                            <option class="regular" value="18 - 29 Years"
                                {{ $user->age_range == '18 - 29 Years' ? 'selected' : '' }}>
                                18 - 29 Years
                            </option>
                            <option class="regular" value="30 - 39 Years"
                                {{ $user->age_range == '30 - 39 Years' ? 'selected' : '' }}>
                                30 - 39 Years
                            </option>
                            <option class="regular" value="40 - 49 Years"
                                {{ $user->age_range == '40 - 49 Years' ? 'selected' : '' }}>
                                40 - 49 Years
                            </option>
                            <option class="regular" value="50 - 59 Years"
                                {{ $user->age_range == '50 - 59 Years' ? 'selected' : '' }}>
                                50 - 59 Years
                            </option>
                            <option class="regular" value="60 and Above"
                                {{ $user->age_range == '60 and Above' ? 'selected' : '' }}>
                                60 and Above
                            </option>
                        </select>
                        @error('age_range')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group m-3 row">
                        <button type="submit" class="mb-5 btn btn-lg blue-btn text-white w-100">
                            <span class="spinner-border spinner-border-sm d-none" id="update_info_spinner" role="status" aria-hidden="true"></span>
                            <span id="update_info_submit">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
