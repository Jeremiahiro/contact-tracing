@extends('layouts.app')

@section('title')
Profile Page
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
<script src="{{ asset('frontend/jquery/tabToggle.js')}}"></script>

@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')
<section class="splash profile_cover" style="background-image: url({{ $user->header }})">
    @include('partials.mobile.header.header')

    <div class="container text-center text-white py-4">
        <div>
            <img src="{{ $user->avatar }}" class="avatar avatar-xl border-5" alt="{{ $user->username }}">
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div>
            <h1 class="f-24 bold pt-4">Settings</h1>
        </div>
        <div class="d-flex justify-content-between">
            <span>
                <p class="f-18 bold">Preferences</p> 
            </span>
            <span>
                <img src="{{ asset('/frontend/img/svg/side-arrow.svg')}}" alt="">
            </span>
        </div>
        <div class="d-flex justify-content-between">
            <span>
                <p class="f-14 bold m-0 pt-3">Deactivate Account</p>
            </span>
            <span>
                <label class="switch">
                    <input type="checkbox">
                    <span class="toggle-slider"></span>
                </label>
            </span>
        </div>
        <hr>
    </div>
</section>

@endsection

@section('footer')
@include('partials.mobile.footer.footer')
@endsection

@section('script')

@include('activity.partials.mapScript')

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
