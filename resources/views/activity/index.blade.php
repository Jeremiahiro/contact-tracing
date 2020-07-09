@extends('layouts.app')

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
@endsection


@section('header')

@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')
<section>
    @include('partials.mobile.header.header-white')
    <section class="py-5">
        
        <div class="container py-3 d-flex justify-content-around">
            @include('activity.modals.activitySelection')
            <div class="timeline">
                <p class="m-0 py-1">08:00am</p>
                <div class="vl ml-5"></div>
                <p class="m-0 py-1">11:30am</p>
            </div>

            <div class="d-flex flex-row-reverse">
                <p class="position-absolute text-center pt-1 mr-3 fulfilled_notification">2</p>
            </div>

            <div class="route_white ml-4 p-3">
                <div class="d-flex justify-content-between">
                    <p class="py-2 m-0 routeheader">Route & Interactions</p>
                </div>

                <div class="d-flex fulfilled_location">
                    <span>
                        <h3 class="m-0">PARK & SHOP</h3>
                        <p class="mb-2">147 Aba road, Port Harcourt , Rivers State</p>
                    </span>
                </div>


                <div class="d-flex justify-content-between route_image">
                    <span>
                        <img src="{{ asset('/frontend/img/map.png')}}" alt="map">
                        <img src="{{ asset('/frontend/img/map.png')}}" alt="map">
                    </span>
                    <span class="mt-3">
                        <a class="fulfilled_location" data-toggle="modal" data-target="#activityselectionModal">VIEW MAP</a>
                    </span>
                </div>

                <div class="d-flex">
                    <span class="fulfilled">
                        <img src="/frontend/img/jimi.png" alt="">
                        <img src="/frontend/img/jimi.png" alt="">
                        <img src="/frontend/img/jimi.png" alt="">
                        <img src="/frontend/img/jimi.png" alt="">
                    </span>
                    <span>
                        <p class="p-2 m-0">+5</p>
                    </span>
                    <span class="ml-auto">
                        <a href="">
                            <img class="text-right" src="{{ asset('/frontend/img/svg/add2.svg')}}" alt="add">
                        </a>
                    </span>

                </div>
            </div>
        </div>

        <div class="container py-3 d-flex justify-content-around">
            <div class="timeline">
                <p class="m-0 py-1">08:00am</p>
                <div class="vl ml-5"></div>
                <p class="m-0 py-1">11:30am</p>
            </div>

            <div class="d-flex flex-row-reverse">
                <p class="position-absolute text-center pt-1 mr-3 fulfilled_notification">2</p>
            </div>

            <div class="route_purple ml-4 p-3">
                <div class="d-flex justify-content-between">
                    <p class="py-2 m-0 routeheader">Route & Interactions</p>
                </div>

                <div class="d-flex fulfilled_locationwhite">
                    <span>
                        <h3 class="m-0">PARK & SHOP</h3>
                        <p class="mb-2">147 Aba road, Port Harcourt , Rivers State</p>
                    </span>
                </div>

                <div class="d-flex justify-content-between route_image">
                    <span>
                        <img src="{{ asset('/frontend/img/office.png')}}" alt="office">
                        <img src="{{ asset('/frontend/img/office.png')}}" alt="office">
                    </span>
                    <span class="mt-3">
                        <a class="fulfilled_locationwhite" href="">VIEW MAP</a>
                    </span>
                </div>


                <div class="d-flex">
                    <span class="fulfilled">
                        <img src="/frontend/img/jimi.png" alt="">
                        <img src="/frontend/img/jimi.png" alt="">
                        <img src="/frontend/img/jimi.png" alt="">
                        <img src="/frontend/img/jimi.png" alt="">
                    </span>

                    <span>
                        <p class="p-2 m-0">+5</p>
                    </span>
                    <span class="ml-auto">
                        <a href="">
                            <img class="text-right" src="{{ asset('/frontend/img/svg/addwhite.svg')}}" alt="add">
                        </a>
                    </span>

                </div>
            </div>
        </div>

        <div class="container py-3 d-flex justify-content-around">
            <div class="timeline">
                <p class="m-0 py-1">08:00am</p>
                <div class="vl ml-5"></div>
                <p class="m-0 py-1">11:30am</p>
            </div>

            <div class="d-flex flex-row-reverse">
                <p class="position-absolute text-center pt-1 mr-3 fulfilled_notification">2</p>
            </div>

            <div class="route_white ml-4 p-3">
                <div class="d-flex justify-content-between">
                    <p class="py-2 m-0 routeheader">Route & Interactions</p>
                </div>

                <div class="d-flex fulfilled_location">
                    <span>
                        <h3 class="m-0">PARK & SHOP</h3>
                        <p class="mb-2">147 Aba road, Port Harcourt , Rivers State</p>
                    </span>
                </div>


                <div class="d-flex justify-content-between route_image">
                    <span>
                        <img src="{{ asset('/frontend/img/map.png')}}" alt="map">
                        <img src="{{ asset('/frontend/img/map.png')}}" alt="map">
                    </span>
                    <span class="mt-3">
                        <a class="fulfilled_location" href="">VIEW MAP</a>
                    </span>
                </div>

                <div class="d-flex ">
                    <span class="fulfilled">
                        <img src="/frontend/img/jimi.png" alt="">
                        <img src="/frontend/img/jimi.png" alt="">
                        <img src="/frontend/img/jimi.png" alt="">
                        <img src="/frontend/img/jimi.png" alt="">
                    </span>
                    <span>
                        <p class="p-2 m-0">+5</p>
                    </span>
                    <span class="ml-auto">
                        <a href="">
                            <img class="text-right" src="{{ asset('/frontend/img/svg/add2.svg')}}" alt="add">
                        </a>
                    </span>

                </div>
            </div>
        </div>

        <div class="container py-3 d-flex justify-content-around">
            <div class="timeline">
                <p class="m-0 py-1">08:00am</p>
                <div class="vl ml-5"></div>
                <p class="m-0 py-1">11:30am</p>
            </div>

            <div class="d-flex flex-row-reverse">
                <p class="position-absolute text-center pt-1 mr-3 fulfilled_notification">2</p>
            </div>

            <div class="route_purple ml-4 p-3">
                <div class="d-flex justify-content-between">
                    <p class="py-2 m-0 routeheader">Route & Interactions</p>
                </div>

                <div class="d-flex fulfilled_locationwhite">
                    <span>
                        <h3 class="m-0">PARK & SHOP</h3>
                        <p class="mb-2">147 Aba road, Port Harcourt , Rivers State</p>
                    </span>
                </div>

                <div class="d-flex justify-content-between route_image">
                    <span>
                        <img src="{{ asset('/frontend/img/office.png')}}" alt="office">
                        <img src="{{ asset('/frontend/img/office.png')}}" alt="office">
                    </span>
                    <span class="mt-3">
                        <a class="fulfilled_locationwhite" href="">VIEW MAP</a>
                    </span>
                </div>


                <div class="d-flex">
                    <span class="fulfilled">
                        <img src="/frontend/img/jimi.png" alt="">
                        <img src="/frontend/img/jimi.png" alt="">
                        <img src="/frontend/img/jimi.png" alt="">
                        <img src="/frontend/img/jimi.png" alt="">
                    </span>

                    <span>
                        <p class="p-2 m-0">+5</p>
                    </span>
                    <span class="ml-auto">
                        <a href="">
                            <img class="text-right" src="{{ asset('/frontend/img/svg/addwhite.svg')}}" alt="add">
                        </a>
                    </span>

                </div>
            </div>
        </div>
    </section>


    @include('partials.mobile.footer.footer')
</section>

@endsection
