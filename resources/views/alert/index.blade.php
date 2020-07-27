@extends('layouts.app')

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')

<section>
    <div class="container py-4">
        <div class="py-2">
            <h6 class="f-18 bold m-0">Alerts</h6>
        </div>
        <div class="route_white route p-2">
            <span class="d-flex justify-content-between py-2">
                <img class="activity_avatar avatar-xs" src="/frontend/img/user1.jpg" alt="">
                <p class="bold f-10">1.5 Hours</p>
            </span>
            <span>
                <h5 class="bold f-14 blue-text">Creativity and collaboration</h5>
                <p class="f-8 light">Productivity, agility, collaboration, innovation; none of these things are tied to a specific place. They are functions of people and teams. </p>
            </span>
            <div class="d-flex justify-content-between">
                <div>
                   <a href="#"> <img src="{{ asset('/frontend/img/svg/share.svg')}}" alt="share"></a>
                </div>
                <div class="d-flex justify-content-around">
                    <span class="d-flex px-1">
                        <a class="blue-text" href="#"><p class="f-8 m-0 p-2">256</p></a>
                        <a href="#"><img src="{{ asset('/frontend/img/svg/comment.svg')}}" alt="coment"></a>
                    </span>
                    <span class="d-flex px-1">
                        <a class="blue-text"  href="#"><p class="f-8 m-0 p-2">4 K</p></a>
                        <a href="#"><img src="{{ asset('/frontend/img/svg/love.svg')}}" alt="like"></a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection


@section('footer')
@include('partials.mobile.footer.footer')
@endsection
