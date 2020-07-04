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
    <div class="container py-3 d-flex justify-content-around">
        <div>
           <p class="m-0 py-1">08:00am</p>
           <div class="vl ml-5"></div>
           <p class="m-0 py-1">11:30am</p>
        </div>
        <div class="route_white p-3">
            <div class="d-flex justify-content-between">
                <p class="m-1">Route & Interactions</p>
                <span class="fulfilled_location">&#xFE19;</span>
            </div>
            
            <div class="d-flex fulfilled_location">
               <span>
                   <img src="{{ asset('/frontend/img/svg/map-pin-marked.svg')}}" alt="map-pin">
                </span>
                <span class="pl-2">
                     <h3 class="m-0">PARK & SHOP</h3>
                    <p>147 Aba road, Port Harcourt , Rivers State</p>
                </span>
            </div>

            <div>
                <img src="{{ asset('/frontend/img/svg/map.svg')}}" alt="map">
            </div>
            
            <div class="d-flex fulfilled pt-2">
                <span>
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
        <div>
           <p class="m-0 py-1">08:00am</p>
           <div class="vl ml-5"></div>
           <p class="m-0 py-1">11:30am</p>
        </div>
        <div class="route_purple p-3">
            <div class="d-flex justify-content-between">
                <p class="m-1">Route & Interactions</p>
                <span class="fulfilled_location">&#xFE19;</span>
            </div>
            
            <div class="d-flex fulfilled_locationwhite ">
               <span>
                   <img src="{{ asset('/frontend/img/svg/map-pin-markedwhite.svg')}}" alt="map-pin">
                </span>
                <span class="pl-2">
                     <h3 class="m-0">PARK & SHOP</h3>
                    <p>147 Aba road, Port Harcourt , Rivers State</p>
                </span>
            </div>

            <div class="d-flex">
                <span>
                    <img src="{{ asset('/frontend/img/office.png')}}" alt="map">
                    <img src="{{ asset('/frontend/img/svg/map.svg')}}" alt="map">
                </span>
                <span>
                    <p>VIEW MAP</p>
                </span>
            </div>
            

            <div class="d-flex fulfilled pt-2">
                <span>
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
    @include('partials.mobile.footer.footer')
</section>

@endsection
