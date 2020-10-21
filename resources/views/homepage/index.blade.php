@extends('layouts.app')

@section('title')
Homepage
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<div class="splash splash-2">
    <div class="container col-md-4 mx-auto">
        <div class="">
            <div class="container p-4">
                <div class="trace_date py-5">
                    @include('homepage.splash.extra.time')
                </div>
                <div class="">
                    <h1 class="time">
                        <a href="{{ route('activity.create') }}" class="time f-46 text-white">
                            CONTACT TRACING
                        </a>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="">
    <div id="splashCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators pb-5">
            <li data-target="#splashCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#splashCarousel" data-slide-to="1"></li>
            <li data-target="#splashCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item splash active"
                style="background-image: url('{{ $contact_info->splash_image }}');">
                @include('homepage.splash.splash-1')
            </div>
            <div class="carousel-item splash" style="background-image: url('{{ $support_info->splash_image }}');">
                @include('homepage.splash.splash-3')
            </div>
            <div class="carousel-item splash" style="background-image: url('{{ $location_info->splash_image }}');">
                @include('homepage.splash.splash-2')
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

@endsection
