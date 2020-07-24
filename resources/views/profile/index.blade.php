@extends('layouts.app')

@section('title')
    Profile Page
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')

<section class="splash profile_cover" style="background-image: url({{ $user->header }})">
    @include('partials.mobile.header.header')

    <div class="container text-center text-white py-5">
        <div>
            <img src="{{ $user->avatar }}" class=" activity_avatar profile_avatar" alt="{{ $user->username }}">
        </div>
        <div class="py-2">
            <h6 class="bold m-0 f-18">{{ $user->name }}</h6>
            <p class="bold">{{ $user->username }}</p>
        </div>
        <div>
            <div class="d-flex justify-content-around">
                <span class="px-2">
                    <span class="">{{ count($user->tags) }}</span>
                    <p class="m-0">Connections</p>
                </span>
                <span class="px-2 bold">
                    <span class="">{{ count($user->activities) }}</span>
                    <p class="m-0">Location</p>
                </span>
                <span class="px-2">
                    <span class="">{{ $user->followings()->count() }}</span>
                    <p class="m-0">Followers</p>
                </span>
                <span class="px-2">
                    <span class="tl-follower">{{ $user->followers()->count() }}</span>
                    <p class="m-0">Following</p>
                </span>
            </div>
            @if ($user->id != auth()->user()->id)
            <button class="text-center mt-3 btn f-12 rounded blue-btn text-white action-follow"
                data-id="{{ $user->id }}">
                <input type="hidden" class="hidden F-status" value="{{ auth()->user()->isFollowing($user) ? 1 : 0 }}">
                <strong>
                    @if(auth()->user()->isFollowing($user))
                    Following
                    @else
                    Follow
                    @endif
                </strong>
            </button>
            @endif
        </div>
    </div>
</section>

@endsection

@section('footer')
@include('partials.mobile.footer.footer')
@endsection

@section('script')
<script>
    jQuery(document).ready(function ($) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.action-follow').click(function () {
            var userID = $(this).data('id');
            var status = $('.F-status').val();
            var cObj = $(this);
            var c = $(this).parent("div").find(".tl-follower").text();

            $.ajax({
                type: 'POST',
                url: '/follow',
                data: {
                    userID: userID,
                    status: status
                },
                success: function (data) {
                    // console.log(data);
                    if (data.status == 0) {
                        cObj.find("strong").text("Follow");
                        cObj.parent("div").find(".tl-follower").text(parseInt(c) - 1);
                        $('.F-status').val(0);
                    } else {
                        cObj.find("strong").text("Following");
                        cObj.parent("div").find(".tl-follower").text(parseInt(c) + 1);
                        $('.F-status').val(1);
                    }
                }
            });
        });
    });

</script>
@endsection
