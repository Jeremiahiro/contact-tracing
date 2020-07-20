@extends('layouts.app')

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
@endsection


@section('header')

@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')
<section>


    <div class="" id="proximityalertModal"  role="dialog" aria-labelledby="activitySelection"
        aria-hidden="true">
        <div class="modal-dialog route_blue mt-5 ml-0" style="pointer-events:auto;" role="document">
            <div class="container py-3 d-flex">
                <div>
                    <span>
                        <p class="f-8 mb-2">Route & Interactions</p>
                    </span>
                </div>
                <div class="ml-auto">
                    <button type="button" style="opacity:1;" class="btn close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><img src="{{ asset('/frontend/img/svg/Icon-close-circle.svg')}}"
                                alt="map-pin"></span>
                    </button>
                </div>
            </div>
            <div class="container d-flex justify-content-around py-2">
                <div class="proximityimage py-4 col-6">
                    <a href=""><img src="/frontend/img/store.jpg" alt=""></a>
                </div>
                <div class="col-6 p-0">
                    <span class="d-flex">
                        <img src="{{ asset('/frontend/img/svg/smallmap-pin.svg')}}" alt="">
                        <h1 class="f-14 m-0 pl-1 regular">Toronto, Ontario</h1>
                    </span>
                    <span>
                        <img src="{{ asset('/frontend/img/svg/map-pin.svg')}}" alt="map-pin">
                        <img src="{{ asset('/frontend/img/svg/red-flag.svg')}}" alt="red-flag">
                    </span>
                    <span>
                        <h2 class="f-12 bold mb-1">PARK & SHOP</h2>
                        <p class="f-8 regular m-0">147 Aba road, Port Harcourt , Rivers State</p>
                    </span>
                    <div class="d-flex justify-content-between">
                        <div class="connectionsmall py-1">
                            <span class=" d-flex py-1">
                                <img src="/frontend/img/user1.jpg" alt="">
                                <img src="/frontend/img/user2.jpg" alt="">
                                <img src="/frontend/img/user3.jpg" alt="">
                            </span>
                            <span class=" d-flex py-1">
                                <img src="/frontend/img/user4.jpg" alt="">
                                <img src="/frontend/img/user5.jpg" alt="">
                                <img src="/frontend/img/user6.jpg" alt="">
                            </span>
                            <p class="regular f-8 py-1">Visited 4mins ago</p>
                        </div>
                        <div class="mr-auto">
                            <h2 class="f-14 regular py-2 pl-2">+5</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container d-flex justify-content-around py-2">
                <div class="proximityimage col-6">
                    <a href=""><img src="/frontend/img/store.jpg" alt=""></a>
                </div>
                <div class="col-6 p-0">
                    <span>
                        <img src="{{ asset('/frontend/img/svg/map-pin.svg')}}" alt="map-pin">
                    </span>
                    <span>
                        <h2 class="f-12 bold mb-1">MILE 1 MARKET</h2>
                    </span>
                    <div class="bg-white proximityadd d-flex justify-content-between p-1">
                        <div class="connectionsmall d-flex py-2">
                            <img src="/frontend/img/user1.jpg" alt="">
                            <img src="/frontend/img/user2.jpg" alt="">
                            <img src="/frontend/img/user3.jpg" alt="">
<<<<<<< HEAD
                        </div>
                        <h2 class="f-14 regular pt-3 pl-1 recordactivity mr-auto">+5</h2>
                        <a class="w-25 " href=""><img src="{{ asset('/frontend/img/svg/blueadd.svg')}}" alt="map-pin"></a>
                    </div>
                    <p class="regular f-8 py-2 m-0">Visited 4mins ago</p>
                </div>
            </div>

            <div class="container d-flex justify-content-around py-2">
                <div class="proximityimage py-2 col-6">
                   <a href=""><img src="/frontend/img/store.jpg" alt=""></a>
                </div>
                <div class="col-6 p-0">
                    <span>
                        <img src="{{ asset('/frontend/img/svg/map-pin.svg')}}" alt="map-pin">
                        <img src="{{ asset('/frontend/img/svg/red-flag.svg')}}" alt="red-flag">
                    </span>
                    <span>
                        <h2 class="f-12 bold mb-1">MESH MEDIA LAB</h2>
                        <p class="f-8 regular m-0">147 Aba road, Port Harcourt , Rivers State</p>
                    </span>
                    <div class="d-flex justify-content-between">
                        <div class="connectionsmall py-1">
                            <span class=" d-flex py-1">
                                <img src="/frontend/img/user1.jpg" alt="">
                                <img src="/frontend/img/user2.jpg" alt="">
                                <img src="/frontend/img/user3.jpg" alt="">
                            </span>
                            <p class="regular f-8 py-1">Visited 4mins ago</p>
=======
>>>>>>> 50e26bf90c809fad62f09bb77955579d21ce68b4
                        </div>
                        <div class="mr-auto">
                            <h2 class="f-14 regular py-2 pl-2">+5</h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    @endsection
