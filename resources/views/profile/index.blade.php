@extends('layouts.app')

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')

<section class="splash profile_cover">
    @include('partials.mobile.header.header')

    <div class="container text-center text-white py-5">
        <div>
            <img src="{{ asset('/frontend/img/store.jpg')}}" class=" activity_avatar profile_avatar" alt="profile_img">
        </div>
        <div class="py-2">
            <h6 class="bold m-0 f-18">SEUN PETERS</h6>
            <p class="bold">Port Harcourt</p>
        </div>
        <div class="d-flex justify-content-around">
            <span class="ml-auto px-2">
                <p class="m-0 bold">135</p>
                <p class="m-0 bold">Location</p>
            </span>
            <span class="px-2">
                <p class="m-0 bold">99</p>
                <p class="m-0 bold">Connections</p>
            </span>
            <span class="mr-auto px-2">
                <button type="submit" class="btn f-12 rounded blue-btn text-white">FOLLOW</button>
            </span>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container py-5">
        <div class="px-5">
            <p class="f-10">ROUTE HISTORY</p>
        </div>
        <div class="d-flex px-5">
            <span>
                <ul class="nav" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="f-8 p-0 heavy nav-link blue-text active" id="people-tab" data-toggle="tab"
                            href="#people" role="tab" aria-controls="people" aria-selected="true">PEOPLE</a>
                    </li>
                    <li class="nav-item"><a class="f-8 p-0 px-1 nav-link blue-text">|</a></li>
                    <li class="nav-item">
                        <a class="f-8 p-0 nav-link blue-text" id="places-tab" data-toggle="tab" href="#places"
                            role="tab" aria-controls="places" aria-selected="false">PLACES</a>
                    </li>
                </ul>
            </span>
            <span class="ml-auto">
                <ul class="nav" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="f-8 p-0 heavy nav-link blue-text active" id="days-tab" data-toggle="tab" href="#days"
                            role="tab" aria-controls="days" aria-selected="true">DAYS</a>
                    </li>
                    <li class="nav-item"><a class="f-8 p-0 px-1 nav-link blue-text">|</a></li>
                    <li class="nav-item">
                        <a class="f-8 p-0 nav-link blue-text" id="weeks-tab" data-toggle="tab" href="#weeks" role="tab"
                            aria-controls="weeks" aria-selected="false">WEEKS</a>
                    </li>
                    <li class="nav-item"><a class="f-8 p-0 px-1 nav-link blue-text">|</a></li>
                    <li class="nav-item">
                        <a class="f-8 p-0 nav-link blue-text" id="months-tab" data-toggle="tab" href="#months"
                            role="tab" aria-controls="months" aria-selected="false">MONTHS</a>
                    </li>
                </ul>
            </span>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="people" role="tabpanel" aria-labelledby="people-tab">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner px-5">
                        <div class="carousel-item active py-1">
                            <span>
                                <a href="{{ route('profile.index') }}"><img class="activity_avatar" src="/frontend/img/user1.jpg" alt=""></a> 
                                <span>
                                    <p class="f-8 py-1 m-0">John</p>
                                </span>
                            </span>
                        </div>

                        <div class="carousel-item py-1">
                            <span>
                                <a href="{{ route('profile.index') }}"><img class="activity_avatar" src="/frontend/img/user1.jpg" alt=""></a> 
                                <span>
                                    <p class="f-8 pt-1">John</p>
                                </span>
                            </span>
                        </div>

                    </div>
                    <ol style="top:100%;" class="carousel-indicators m-0">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="bg-blue opacity-1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1" class="bg-blue opacity-1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2" class="bg-blue opacity-1"></li>
                    </ol>
                    <a style="top:initial; bottom:50%;" class="pr-3 carousel-control-prev opacity-1"
                        href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a style="top:initial; bottom:50%;" class="carousel-control-next opacity-1"
                        href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="tab-pane fade" id="places" role="tabpanel" aria-labelledby="places-tab">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner px-5 ">
                        <div class="carousel-item active py-1">
                            <div class="row px-2">
                                <div class="col col-3 p-1">
                                    <div class=" bg-blue side-borders p-2 text-white text-center ">
                                        <p class="regular lh-08 pt-2 f-46 m-0">17</p>
                                        <p class="bold f-6 m-0">June 2020</p>
                                        <p class="light f-8 m-0">10:15PM</p>
                                        <img class="side-borders profile-places-img" src= "/frontend/img/jimi.png" alt="">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <ol style="top:100%;" class="carousel-indicators m-0">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="bg-blue opacity-1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1" class="bg-blue opacity-1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2" class="bg-blue opacity-1"></li>
                    </ol>
                    <a style="top:initial; bottom:50%;" class="pr-3 carousel-control-prev opacity-1"
                        href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a style="top:initial; bottom:50%;" class="carousel-control-next opacity-1"
                        href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
@include('partials.mobile.footer.footer')
@endsection
