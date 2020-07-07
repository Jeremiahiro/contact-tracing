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
    <div class=" route_purple" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="activitySelection" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-header d-flex">
                <div class="activity">
                    <span>
                        <h1 class="routeheader">Route & Interactions</h1>
                    </span>
                    <div class="d-flex">
                        <span>
                            <img src="{{ asset('/frontend/img/svg/map-pin-markedwhite.svg')}}" alt="map-pin">
                        </span>
                        <span class="pl-1">
                            <h3 class="m-0">PARK & SHOP</h3>
                            <p>147 Aba road, Port Harcourt , Rivers State</p>
                        </span>
                    </div>
                </div>
                <div>
                    <button type="button" style="opacity:1;" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><img src="{{ asset('/frontend/img/svg/Icon-close-circle.svg')}}" alt="map-pin"></span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img class="d-block w-100" src="..." alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="..." alt="Second slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="..." alt="Third slide">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    @include('partials.mobile.footer.footer')
</section>

@endsection
