@extends('layouts.app')

@section('title')
Edit Profile
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')
<section class="splash profile_cover" id="header-image" style="background-image: url({{ $user->header }})">
    @include('partials.mobile.header.header')

    <div class="" id="upload-alert">
    </div>

    <div class="container text-center py-4">
        <div class="">
            <label for="changeAvatar">
                <div class="profile-pic avatar avatar-xl border" id="profile-pic"
                    style="background-image: url({{ $user->avatar }})">
                    <span class="profile-pic-cam">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 23 23">
                            <g id="Group_410" data-name="Group 410" transform="translate(-288.137 -382.226)">
                                <g id="Icon_feather-camera" data-name="Icon feather-camera"
                                    transform="translate(293.5 388.715)" style="isolation: isolate">
                                    <path id="Path_207" data-name="Path 207"
                                        d="M13.445,13.187a1.086,1.086,0,0,1-1.086,1.086H2.586A1.086,1.086,0,0,1,1.5,13.187V7.215A1.086,1.086,0,0,1,2.586,6.129H4.758L5.844,4.5H9.1l1.086,1.629h2.172a1.086,1.086,0,0,1,1.086,1.086Z"
                                        transform="translate(-1.5 -4.5)" fill="none" stroke="#A9A9A9"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <path id="Path_208" data-name="Path 208"
                                        d="M16.344,15.672A2.172,2.172,0,1,1,14.172,13.5,2.172,2.172,0,0,1,16.344,15.672Z"
                                        transform="translate(-8.199 -10.242)" fill="none" stroke="#A9A9A9"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </g>
                            </g>
                        </svg>
                    </span>
                </div>
            </label>
            <input type="File" name="avatar" class="d-none avatar-input" id="changeAvatar" value="">
        </div>
        <div class="py-2">
            <h6 class="bold m-0 f-18">{{ $user->name }}</h6>
            <p class="bold">{{ $user->username }}</p>
        </div>
        <div class="mt-4 ">
            <label for="changeHeader" class="headerImage">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 23 23">
                        <g id="Group_410" data-name="Group 410" transform="translate(-288.137 -382.226)">
                            <g id="Icon_feather-camera" data-name="Icon feather-camera"
                                transform="translate(293.5 388.715)" style="isolation: isolate">
                                <path id="Path_207" data-name="Path 207"
                                    d="M13.445,13.187a1.086,1.086,0,0,1-1.086,1.086H2.586A1.086,1.086,0,0,1,1.5,13.187V7.215A1.086,1.086,0,0,1,2.586,6.129H4.758L5.844,4.5H9.1l1.086,1.629h2.172a1.086,1.086,0,0,1,1.086,1.086Z"
                                    transform="translate(-1.5 -4.5)" fill="none" stroke="#fff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" />
                                <path id="Path_208" data-name="Path 208"
                                    d="M16.344,15.672A2.172,2.172,0,1,1,14.172,13.5,2.172,2.172,0,0,1,16.344,15.672Z"
                                    transform="translate(-8.199 -10.242)" fill="none" stroke="#fff"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </g>
                        </g>
                    </svg>
                </span>
            </label>
            <input type="File" name="header" class="d-none avatar-input" id="changeHeader" value="">
        </div>
    </div>

</section>

<section class="py-3 mb-5">
    <h4 class="m-2 px-3 bold f-24">Details</h4>

    <div class="accordion" id="editProfileAccordion">
        <div class="card">
            <div class="card-header p-2" id="personalInfo">
                <h5 class="mb-0">
                    <button class="btn text-primary collapsed" type="button" data-toggle="collapse"
                        data-target="#collapsePersonalInfo" aria-expanded="true" aria-controls="collapsePersonalInfo">
                        <i class="fa fa-user mr-2"></i> Personal Information
                    </button>
                </h5>
            </div>

            <div class="card-body p-0 m-0">
                <div id="collapsePersonalInfo" class="collapse" aria-labelledby="personalInfo"
                    data-parent="#editProfileAccordion">
                    <form action="{{ route('dashboard.update') }}" id="updateDetails" method="post" class="p-3">
                        @csrf
                        <div class="form-group mb-1">
                            <label for="email" class="m-0 p-0 bold">Email:</label>
                            <input type="email" class="blue-input input rounded-0" name="email"
                                value="{{ $user->email }}" id="email" readonly>
                        </div>

                        <div class="form-group mb-1">
                            <label for="name" class="m-0 p-0 bold">Full Name:</label>
                            <input type="text" class="blue-input input rounded-0 @error('name') is invalid @enderror"
                                name="name" value="{{ old('name', $user->name) }}" id="name" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-1">
                            <label for="username" class="m-0 p-0 bold">Username:</label>
                            <input type="text"
                                class="blue-input input rounded-0 @error('username') is invalid @enderror"
                                name="username" value="{{ old('username', $user->username) }}" id="username" required>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-1">
                            <label for="phone" class="m-0 p-0 bold">Phone Number:</label>
                            <input type="tel" class="blue-input input rounded-0 @error('phone') is invalid @enderror"
                                name="phone" value="{{ old('phone', $user->phone) }}" id="phone" required>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-1">
                            <label for="gender" class="m-0 p-0 bold">Gender:</label>
                            <select class="input blue-input @error('gender') is-invalid @enderror" name="gender"
                                id="gender">
                                <option value="" selected disabled hidden>Select Gender...</option>
                                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }} class="regular">
                                    Male
                                </option>
                                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}
                                    class="regular">
                                    Female
                                </option>
                                <option value="Other" {{ $user->gender == 'Other' ? 'selected' : '' }} class="regular">
                                    Other
                                </option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="age_range" class="m-0 p-0 bold">Age Range:</label>
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

                        <div class="form-group mx-3 row">
                            <button type="submit" class="ml-auto btn blue-btn text-white">Done</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header p-2" id="locationDetails">
                <h5 class="mb-0">
                    <button class="btn text-primary collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseLocationDetials" aria-expanded="false"
                        aria-controls="collapseLocationDetials">
                        <i class="fa fa-map-marker mr-2"></i> Address
                    </button>
                </h5>
            </div>
            <div class="card-body p-0 m-0 ">
                <div id="collapseLocationDetials" class="collapse" aria-labelledby="locationDetails"
                    data-parent="#editProfileAccordion">
                    <form action="{{ route('location.update') }}" id="locationDetails" method="post" class="p-3">
                        @csrf
                        <div class="form-group mb-1">
                            <label for="home_address" class="m-0 p-0 bold">Address (Home):</label>
                            <input id="home_address" type="search"
                                class="blue-input input rounded-0 @error('home_address') is-invalid @enderror"
                                name="home_address" value="{{ $user->location->home_address ?? '' }}" required
                                autocomplete="off" placeholder="Home Address">
                            <input type="hidden" name="home_location" class="" id="home_location"
                                value="{{ $user->location->home_location ?? '' }}">
                            <input type="hidden" name="home_latitude" class="" id="home_latitude"
                                value="{{ $user->location->home_latitude ?? '' }}">
                            <input type="hidden" name="home_longitude" class="" id="home_longitude"
                                value="{{ $user->location->home_longitude ?? '' }}">
                            @error('home_location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="invalid-feedback" id="fromAlert" role="alert">
                                <strong class="text-danger regular"> Selected location not available on Google
                                    Map</strong>
                            </span>
                        </div>

                        <div class="form-group mb-2">
                            <label for="office_address" class="m-0 p-0 bold">Address (Office):</label>
                            <input id="office_address" type="search"
                                class="blue-input input rounded-0 @error('office_address') is-invalid @enderror"
                                name="office_address" value="{{ $user->location->office_address ?? '' }}"
                                autocomplete="off" placeholder="Office Address">
                            <input type="hidden" name="office_location" class="" id="office_location"
                                value="{{ $user->location->office_location ?? '' }}">
                            <input type="hidden" name="office_latitude" class="" id="office_latitude"
                                value="{{ $user->location->office_latitude ?? '' }}">
                            <input type="hidden" name="office_longitude" class="" id="office_longitude"
                                value="{{ $user->location->office_longitude ?? '' }}">
                            @error('office_location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="invalid-feedback" id="fromAlert" role="alert">
                                <strong class="text-danger regular"> Selected location not available on Google
                                    Map</strong>
                            </span>
                        </div>

                        <div class="form-group mx-3 row">
                            <button type="submit" class="ml-auto btn blue-btn text-white">Done</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header p-2" id="passwordCollapse">
                <h5 class="mb-0">
                    <button class="btn text-primary collapsed" type="button" data-toggle="collapse"
                        data-target="#collapsePassword" aria-expanded="true" aria-controls="collapsePassword">
                        <i class="fa fa-lock mr-2"></i> Password
                    </button>
                </h5>
            </div>

            <div class="card-body p-0 m-0">
                <div id="collapsePassword" class="collapse" aria-labelledby="passwordCollapse"
                    data-parent="#editProfileAccordion">
                    <form action="{{ route('dashboard.password') }}" id="updatePassword" method="post" class="p-3">
                        @csrf
                        <div class="form-group mb-1">
                            <label for="age_range" class="m-0 p-0 bold">Current Password:</label>
                            <input type="password"
                                class="blue-input input rounded-0 @error('current_password') is invalid @enderror"
                                name="current_password" value="" placeholder="Current Password">
                        </div>

                        <div class="form-group mb-1">
                            <label for="age_range" class="m-0 p-0 bold">New Password:</label>
                            <input type="password"
                                class="blue-input input rounded-0 @error('password') is invalid @enderror"
                                name="password" value="" placeholder="New Password" required
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Password must contain at least 8 characters, including UPPER/lowercase and numbers">
                        </div>

                        <div class="form-group mb-1">
                            <label for="age_range" class="m-0 p-0 bold">Confirm New Password:</label>
                            <input type="password"
                                class="blue-input input rounded-0 @error('password-confirm') is invalid @enderror"
                                name="password_confirmation" value="" placeholder="Confirm New Password" required
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Password must contain at least 8 characters, including UPPER/lowercase and numbers">
                        </div>

                        <div class="form-group m-3 row">
                            <button type="submit" class="ml-auto btn blue-btn text-white">Done</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-header p-2" id="settingCollapse">
                <h5 class="mb-0">
                    <button class="btn text-primary collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseSetting" aria-expanded="true" aria-controls="collapseSetting">
                        <i class="fa fa-cog mr-2"></i> Preferences
                    </button>
                </h5>
            </div>

            <div class="card-body p-0 m-0">
                <div id="collapseSetting" class="collapse" aria-labelledby="settingCollapse"
                    data-parent="#editProfileAccordion">
                    <div id="updatePrefrences" method="post" class="p-4">
                        <div class="form-group mb-1 border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="f-14 bold m-0">Others Can See My Activity</p>
                                </div>
                                <div class="">
                                    <label class="switch">
                                        <input type="checkbox" data-id="{{ $user->uuid }}" name="show_location"
                                            id="show_location" class="show_location"
                                            {{ $user->show_location == true ? 'checked' : '' }} />
                                        <span class="toggle-slider"></span>
                                    </label>
                                    <div class="spinner-border text-primary ml-2 spinner-border-sm d-none"
                                        id="location-spinner" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-muted">
                                @if ($user->status != true)
                                    Pariatur deserunt excepteur pariatur fugiat duis do id officia quis duis culpa.
                                @endif
                            </div>
                        </div>

                        <div class="form-group my-1 border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="f-14 bold m-0">Deactivate Account</p>
                                </div>
                                <div class="">
                                    <label class="switch">
                                        <input type="checkbox" data-id="{{ $user->uuid }}" name="status"
                                            id="account_status" class="account_status"
                                            {{ $user->status == true ? 'checked' : '' }} />
                                        <span class="toggle-slider"></span>
                                    </label>
                                    <div class="spinner-border text-primary ml-2 spinner-border-sm d-none"
                                        id="deactivate-spinner" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-muted">
                                @if ($user->status != true)
                                    Pariatur deserunt excepteur pariatur fugiat duis do id officia quis duis culpa.
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.modals.deactivateAccount')
@include('partials.modals.uploadModal')

@endsection

@section('footer')
@include('partials.mobile.footer.footer')
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js" crossorigin="anonymous"></script>

<script src="{{ asset('frontend/jquery/editProfile.js') }}"></script>

<script>
    function initialize() {
        var options = {
            types: ['(cities)'],
        };
        var fromLoc = document.getElementById('home_address');
        var getFromLoc = new google.maps.places.Autocomplete(fromLoc);
        getFromLoc.addListener('place_changed', function () {
            var place = getFromLoc.getPlace();
            if (!place.geometry) {
                // $('#fromAlert').toggleClass('show hide');
                window.alert("'" + place.name + "' not available on Google Map");
                fromLoc.value = "";
                return;
            } else {
                $('#home_location').val(place.name);
                $('#home_latitude').val(place.geometry['location'].lat());
                $('#home_longitude').val(place.geometry['location'].lng());
            }
        });

        var toLoc = document.getElementById('office_address');
        var getToLoc = new google.maps.places.Autocomplete(toLoc);
        getToLoc.addListener('place_changed', function () {
            var place = getToLoc.getPlace();
            if (!place.geometry) {
                window.alert("'" + place.name + "' not available on Google Map");
                toLoc.value = "";
                return;
            } else {
                $('#office_location').val(place.name);
                $('#office_latitude').val(place.geometry['location'].lat());
                $('#office_longitude').val(place.geometry['location'].lng());
            }
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&libraries=places&callback=initialize"
    type="text/javascript" async defer></script>
@endsection
