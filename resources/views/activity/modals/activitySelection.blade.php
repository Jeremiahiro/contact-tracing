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
   
    <div class=" route_purple" id="activityselectionModal" tabindex="-1" role="dialog" aria-labelledby="activitySelection"
        aria-hidden="true">
        <div role="document">
            <div class="container py-3 d-flex">
                <div class="activity">
                    <span>
                        <p class="mb-2">Route & Interactions</p>
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
                <div class="ml-auto">
                    <button type="button" style="opacity:1;" class="btn close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><img src="{{ asset('/frontend/img/svg/Icon-close-circle.svg')}}"
                                alt="map-pin"></span>
                    </button>
                </div>
            </div>
            <div class="container pb-3">
                <div id="activityselectionCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators position-absolute m-0">
                        <li data-target="#activityselectionCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#activityselectionCarousel" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="/frontend/img/mapwithpin.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/frontend/img/office1.jpg" alt="Second slide">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container d-flex activity py-2">
                <h3>16.05.20</h3>
                <p class="ml-auto pt-1">8AM-11:30AM</p>
            </div>
            <div class="container">
                <div id="connectionsmallCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="connectionsmall d-flex justify-content-around py-2">
                                <span class="d-flex">
                                    <img src="/frontend/img/user1.jpg" alt="">
                                    <span class="ml-1">
                                        <p class="mb-1">John</p>
                                        <p class="routeheader m-0">08:00am</p>
                                        <p style="color:#00B5AA;" class="routeheader m-0">Active</p>
                                    </span>
                                </span>
                                <span class="d-flex">
                                    <img src="/frontend/img/user2.jpg" alt="">
                                    <span class="ml-1">
                                        <p class="mb-1">John</p>
                                        <p class="routeheader m-0">08:00am</p>
                                        <p style="color:#00B5AA;" class="routeheader m-0">Active</p>
                                    </span>
                                </span>
                                <span class="d-flex">
                                    <img src="/frontend/img/user3.jpg" alt="">
                                    <span class="ml-1">
                                        <p class="mb-1">John</p>
                                        <p class="routeheader m-0">08:00am</p>
                                        <p style="color:#00B5AA;" class="routeheader m-0">Active</p>
                                    </span>
                                </span>
                            </div>
                            <div class="connectionsmall d-flex justify-content-around py-2">
                                <span class="d-flex">
                                    <img src="/frontend/img/user4.jpg" alt="">
                                    <span class="ml-1">
                                        <p class="mb-1">John</p>
                                        <p class="routeheader m-0">08:00am</p>
                                        <p style="color:#00B5AA;" class="routeheader m-0">Active</p>
                                    </span>
                                </span>
                                <span class="d-flex">
                                    <img src="/frontend/img/user5.jpg" alt="">
                                    <span class="ml-1">
                                        <p class="mb-1">John</p>
                                        <p class="routeheader m-0">08:00am</p>
                                        <p style="color:#00B5AA;" class="routeheader m-0">Active</p>
                                    </span>
                                </span>
                                <span class="d-flex">
                                    <img src="/frontend/img/user6.jpg" alt="">
                                    <span class="ml-1">
                                        <p class="mb-1">John</p>
                                        <p class="routeheader m-0">08:00am</p>
                                        <p style="color:#00B5AA;" class="routeheader m-0">Active</p>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="connectionsmall d-flex justify-content-around py-2">
                                <span class="d-flex">
                                    <img src="/frontend/img/user1.jpg" alt="">
                                    <span class="ml-1">
                                        <p class="mb-1">John</p>
                                        <p class="routeheader m-0">08:00am</p>
                                        <p style="color:#00B5AA;" class="routeheader m-0">Active</p>
                                    </span>
                                </span>
                                <span class="d-flex">
                                    <img src="/frontend/img/user2.jpg" alt="">
                                    <span class="ml-1">
                                        <p class="mb-1">John</p>
                                        <p class="routeheader m-0">08:00am</p>
                                        <p style="color:#00B5AA;" class="routeheader m-0">Active</p>
                                    </span>
                                </span>
                                <span class="d-flex">
                                    <img src="/frontend/img/user3.jpg" alt="">
                                    <span class="ml-1">
                                        <p class="mb-1">John</p>
                                        <p class="routeheader m-0">08:00am</p>
                                        <p style="color:#00B5AA;" class="routeheader m-0">Active</p>
                                    </span>
                                </span>
                            </div>
                            <div class="connectionsmall d-flex justify-content-around py-2">
                                <span class="d-flex">
                                    <img src="/frontend/img/user4.jpg" alt="">
                                    <span class="ml-1">
                                        <p class="mb-1">John</p>
                                        <p class="routeheader m-0">08:00am</p>
                                        <p style="color:#00B5AA;" class="routeheader m-0">Active</p>
                                    </span>
                                </span>
                                <span class="d-flex">
                                    <img src="/frontend/img/user5.jpg" alt="">
                                    <span class="ml-1">
                                        <p class="mb-1">John</p>
                                        <p class="routeheader m-0">08:00am</p>
                                        <p style="color:#00B5AA;" class="routeheader m-0">Active</p>
                                    </span>
                                </span>
                                <span class="d-flex">
                                    <img src="/frontend/img/user6.jpg" alt="">
                                    <span class="ml-1">
                                        <p class="mb-1">John</p>
                                        <p class="routeheader m-0">08:00am</p>
                                        <p style="color:#00B5AA;" class="routeheader m-0">Active</p>
                                    </span>
                                </span>
                            </div> 
                        </div>
                    </div>
                    <div class="py-3 text-center">
                        <a class="text-light" href="">VIEW ALL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('script')
<script>
    jQuery(document).ready(function ($) {
        $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });

</script>
{{-- your script goes here --}}
@endsection
