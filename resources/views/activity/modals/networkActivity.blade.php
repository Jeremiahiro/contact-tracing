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
    <div class="bg-light" id="networkactivityModal" tabindex="-1" role="dialog" aria-labelledby="activitySelection"
        aria-hidden="true">
        @include('partials.mobile.header.header-white')
        
        <div class="modal-dialog route_purple mt-5 ml-0" style="pointer-events:auto;" role="document">
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
            <div class="container activity py-2">
                <h3 class="m-0">16.05.20</h3>
                <p class="ml-auto pt-1">8AM-11:30AM</p>
            </div>
            <div class="container">
                <div id="connectionsmallCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class=" d-flex justify-content-around py-2">
                                <div>
                                    <span class="connectionlarge">
                                        <img src="/frontend/img/user1.jpg" alt="">
                                        <h1 class=" pt-1 m-0">Peter</h1>
                                        <h2 class="m-0">Sanusi</h2>
                                        <span class="activity">
                                            <p class="m-0">08:00am</p>
                                            <h3 class="pt-5">View Interaction</h3>
                                            <p>16.05.20</p>
                                        </span>
                                    </span>
                                    <div class="overflow-auto connectionsmall">
                                        <div class=" activity text-center d-flex justify-content-around ">
                                            <span>
                                                <img src="/frontend/img/user1.jpg" alt="">
                                                <span>
                                                    <p class="pt-1">John</p>
                                                </span>
                                            </span>
                                            <span>
                                                <img src="/frontend/img/user2.jpg" alt="">
                                                <span>
                                                    <p class="pt-1">John</p>
                                                </span>
                                            </span>
                                            <span>
                                                <img src="/frontend/img/user3.jpg" alt="">
                                                <span>
                                                    <p class="pt-1">John</p>
                                                </span>
                                            </span>
                                        </div>
                                        <div class=" activity text-center d-flex justify-content-around ">
                                            <span>
                                                <img src="/frontend/img/user1.jpg" alt="">
                                                <span>
                                                    <p class="pt-1">John</p>
                                                </span>
                                            </span>
                                            <span>
                                                <img src="/frontend/img/user2.jpg" alt="">
                                                <span>
                                                    <p class="pt-1">John</p>
                                                </span>
                                            </span>
                                            <span>
                                                <img src="/frontend/img/user3.jpg" alt="">
                                                <span>
                                                    <p class="pt-1">John</p>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div>
                                    <span class="connectionlarge">
                                        <img src="/frontend/img/user2.jpg" alt="">
                                        <h1 class="pt-1 m-0">Daisy</h1>
                                        <h2 class="m-0">Akarolo</h2>
                                        <span class="activity">
                                            <p class="m-0">08:00am</p>
                                            <h3 class="pt-5">View Interaction</h3>
                                            <p>16.05.20</p>
                                        </span>
                                    </span>
                                    <div class="connectionsmall">
                                        <div class=" activity text-center d-flex justify-content-around ">
                                            <span>
                                                <img src="/frontend/img/user1.jpg" alt="">
                                                <span>
                                                    <p class="pt-1">John</p>
                                                </span>
                                            </span>
                                            <span>
                                                <img src="/frontend/img/user2.jpg" alt="">
                                                <span>
                                                    <p class="pt-1">John</p>
                                                </span>
                                            </span>
                                            <span>
                                                <img src="/frontend/img/user3.jpg" alt="">
                                                <span>
                                                    <p class="pt-1">John</p>
                                                </span>
                                            </span>
                                        </div>
                                        <div class=" activity text-center d-flex justify-content-around ">
                                            <span>
                                                <img src="/frontend/img/user1.jpg" alt="">
                                                <span>
                                                    <p class="pt-1">John</p>
                                                </span>
                                            </span>
                                            <span>
                                                <img src="/frontend/img/user2.jpg" alt="">
                                                <span>
                                                    <p class="pt-1">John</p>
                                                </span>
                                            </span>
                                            <span>
                                                <img src="/frontend/img/user3.jpg" alt="">
                                                <span>
                                                    <p class="pt-1">John</p>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class=" d-flex justify-content-around py-2">
                                <div>
                                    <span class="connectionlarge">
                                        <img src="/frontend/img/user3.jpg" alt="">
                                        <h1 class=" pt-1 m-0">Peter</h1>
                                        <h2 class="m-0">Sanusi</h2>
                                        <span class="activity">
                                            <p class="m-0">08:00am</p>
                                            <h3 class="pt-5">View Interaction</h3>
                                            <p>16.05.20</p>
                                        </span>
                                    </span>
                                    <div class="connectionsmall activity text-center d-flex justify-content-around ">
                                        <span>
                                            <img src="/frontend/img/user1.jpg" alt="">
                                            <span>
                                                <p class="pt-1">John</p>
                                            </span>
                                        </span>
                                        <span>
                                            <img src="/frontend/img/user2.jpg" alt="">
                                            <span>
                                                <p class="pt-1">John</p>
                                            </span>
                                        </span>
                                        <span>
                                            <img src="/frontend/img/user3.jpg" alt="">
                                            <span>
                                                <p class="pt-1">John</p>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="connectionsmall activity text-center d-flex justify-content-around ">
                                        <span>
                                            <img src="/frontend/img/user1.jpg" alt="">
                                            <span>
                                                <p class="pt-1">John</p>
                                            </span>
                                        </span>
                                        <span>
                                            <img src="/frontend/img/user2.jpg" alt="">
                                            <span>
                                                <p class="pt-1">John</p>
                                            </span>
                                        </span>
                                        <span>
                                            <img src="/frontend/img/user3.jpg" alt="">
                                            <span>
                                                <p class="pt-1">John</p>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <span class="connectionlarge">
                                        <img src="/frontend/img/user4.jpg" alt="">
                                        <h1 class=" pt-1 m-0">Daisy</h1>
                                        <h2 class="m-0">Akarolo</h2>
                                        <span class="activity">
                                            <p class="m-0">08:00am</p>
                                            <h3 class="pt-5">View Interaction</h3>
                                            <p>16.05.20</p>
                                        </span>
                                    </span>
                                    <div class="connectionsmall activity text-center d-flex justify-content-around ">
                                        <span>
                                            <img src="/frontend/img/user1.jpg" alt="">
                                            <span>
                                                <p class="pt-1">John</p>
                                            </span>
                                        </span>
                                        <span>
                                            <img src="/frontend/img/user2.jpg" alt="">
                                            <span>
                                                <p class="pt-1">John</p>
                                            </span>
                                        </span>
                                        <span>
                                            <img src="/frontend/img/user3.jpg" alt="">
                                            <span>
                                                <p class="pt-1">John</p>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="connectionsmall activity text-center d-flex justify-content-around ">
                                        <span>
                                            <img src="/frontend/img/user1.jpg" alt="">
                                            <span>
                                                <p class="pt-1">John</p>
                                            </span>
                                        </span>
                                        <span>
                                            <img src="/frontend/img/user2.jpg" alt="">
                                            <span>
                                                <p class="pt-1">John</p>
                                            </span>
                                        </span>
                                        <span>
                                            <img src="/frontend/img/user3.jpg" alt="">
                                            <span>
                                                <p class="pt-1">John</p>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        @include('partials.mobile.footer.footer')
    </div>
</section>
@endsection

