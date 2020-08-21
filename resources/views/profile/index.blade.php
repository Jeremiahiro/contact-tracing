@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<script src="{{ asset('frontend/jquery/map-view.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&callback=initMap" async defer></script>

@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";
</script>
@endsection

@section('content')
<section class="splash profile_cover" style="background-image: url({{ $user->header }})">
    @include('partials.mobile.header.header')
    @include('partials.modals.views.profile-picture')
    <div class="container content text-center text-white py-4">
        <div id="panel1">
            <a href="#" data-toggle="modal" data-target="#profilePictureModal">
                <img src="{{ $user->avatar }}" class="avatar avatar-xl border" alt="{{ $user->username }}">
            </a>
        </div>
        <div class="py-2">
            <h6 class="bold m-0 f-18">{{ $user->name }}</h6>
            <p class="bold">{{ $user->username }}</p>
        </div>
        <div class="py-2">
            @if ($user->id === auth()->user()->id)
            @if(!$user->location->home_location)
            <a href="{{ route('dashboard.edit', auth()->user()->uuid) ."#addressInfo" }}" class="btn blue-btn text-white">Update
                Address
            </a>
            @else
            <h6 class="bold m-0 f-12">Home: {{ $user->location->home_location }}</h6>
            <h6 class="bold m-0 f-12">Office: {{ $user->location->office_location }}</h6>
            @endif
            @endif
        </div>
        <div id="panel2 " class="py-2 tourStep4">
            <div class="d-flex justify-content-around">
                <span class="px-2">
                    <a href="#tab-view" class="text-white active">
                        <span class="">{{ count($user->tags) }}</span>
                        <p class="m-0">Connections</p>
                    </a>
                </span>
                <span class="px-2 bold">
                    <a href="#tab-view" class="text-white">
                        <span class="">{{ count($user->activities) }}</span>
                        <p class="m-0">Location</p>
                    </a>
                </span>
                <span class="px-2">
                    <a href="" class="text-white" data-dismiss="modal" data-toggle="modal" data-target="#userFollowing">
                        <span class="">{{ count($user->followings) }}</span>
                        <p class="m-0">Following</p>
                    </a>
                </span>
                <span class="px-2">
                    <a href="" class="text-white" data-dismiss="modal" data-toggle="modal" data-target="#userFollowers">
                        <span class="tl-follower">{{ count($user->followers) }}</span>
                        <p class="m-0">Followers</p>
                    </a>
                </span>
            </div>
            @if($user->id != auth()->user()->id)
            <button class="text-center mt-3 btn f-12 rounded blue-btn text-white action-follow"
                data-id="{{ $user->id }}">
                <input type="hidden" class="hidden F-status" value="{{ auth()->user()->isFollowing($user) ? 1 : 0 }}">
                <strong>
                    @if(auth()->user()->isFollowing($user))
                    UNFOLLOW
                    @else
                    FOLLOW
                    @endif
                </strong>
                <div class="spinner-border text-white ml-2 d-none" id="follow-spinner" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
            @endif
        </div>
    </div>
</section>

<section class="">
    <div class="container px-3 pt-5 mb-5" id="tab-view">
        <p class="f-14">ROUTE HISTORY</p>
        @if ($user->id === auth()->user()->id)
        @include('profile.hoc.activity-view')
        @else
        @if ($user->show_location != true)
        @include('profile.hoc.activity-view')
        @endif
        @endif
    </div>
</section>

@endsection

@section('footer')
@include('partials.mobile.footer.footer')
@endsection

@section('script')

<script type="text/javascript">
    var page = 1;
    var stop = false;

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page);
        }
    });

    function loadMoreData(page) {
        if (stop == false) {
            $.ajax({
                    url: '?page=' + page,
                    type: "get",
                    beforeSend: function () {
                        $('.load-activity').removeClass('d-none');
                    }
                })
                .done(function (data) {
                    if (data.html == " ") {
                        $('.load-activity').html("No more records found");
                        stop = true;
                        return;
                    }
                    $('.load-activity').addClass('d-none');
                    $("#activity-list").append(data.html);
                    stop = false;
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    $('.load-activity').addClass('d-none');
                    alert('something went wrong...');
                });
        }
    }
</script>

@include('component.tour.profileTour')
@endsection
