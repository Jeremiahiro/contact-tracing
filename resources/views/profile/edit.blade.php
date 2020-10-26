@extends('layouts.app')

@section('title')
Edit Profile
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<script src="{{ asset('frontend/jquery/editProfile.js') }}"></script>
@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";

</script>
@endsection

@section('content')
<section class="splash profile_cover" id="header-image" style="background-image: url({{ $user->header }})">
    @include('partials.mobile.header.header')

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
                                        transform="translate(-1.5 -4.5)" fill="none" stroke="#d3d3d3"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    <path id="Path_208" data-name="Path 208"
                                        d="M16.344,15.672A2.172,2.172,0,1,1,14.172,13.5,2.172,2.172,0,0,1,16.344,15.672Z"
                                        transform="translate(-8.199 -10.242)" fill="none" stroke="#d3d3d3"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </g>
                            </g>
                        </svg>
                    </span>
                </div>
            </label>
            <input type="File" name="avatar" class="d-none avatar-input" id="changeAvatar" value="" accept="image/*"
                data-type="profile_image">
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
            <input type="File" name="header" class="d-none avatar-input" id="changeHeader" value="" accept="image/*"
                data-type="header_image">
        </div>
    </div>
</section>

<section class="py-3 mb-5">
    <h4 class="m-2 px-3 bold f-18">User Information</h4>

    <div class="p-2">
        <div class="mb-0">
            <button class="btn text-primary regular f-18" type="button" data-toggle="modal" data-target="#user_info"
                aria-expanded="false">
                <i class="fa fa-user mr-2"></i> Personal Information
            </button>
        </div>

        <div class="mb-0">
            <button class="btn text-primary regular f-18" type="button" data-toggle="modal" data-target="#user_security_info"
                aria-expanded="false">
                <i class="fa fa-lock mr-2"></i> Security
            </button>
        </div>

        <div class="mb-0">
            <button class="btn text-primary regular f-18" type="button" data-toggle="modal" data-target="#user_preference"
                aria-expanded="false">
                <i class="fa fa-cog mr-2"></i> Preferences
            </button>
        </div>

        <div class="mb-0">
            <button class="btn text-primary regular f-18" type="button" data-toggle="modal" data-target="#user_activity_archive"
                aria-expanded="false">
                <i class="fa fa-tasks mr-2"></i> Activity
            </button>
        </div>
    </div>
</section>
@include('partials.modals.upload.uploadModal')
@include('profile.partials.user_info')
@include('profile.partials.user_security_info')
@include('profile.partials.user_preference')
@include('profile.partials.user_activity_archive')

@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
@section('script')

<script>

</script>
@endsection
