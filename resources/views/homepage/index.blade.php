@extends('layouts.app')

@section('title')
    Homepage
@endsection

@section('custom-style')
    <link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
@endsection

@section('header')

@endsection
    
@section('web-content')
    <h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Homepage</div>
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <div class="card-body">
                   

                    Start here
                </div>
            </div>
        </div>
    </div>
</div> --}}

<section class="vh-100">

    <div id="carouselExampleIndicators" class="carousel slide" >
        <ol class="carousel-indicators pb-5">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          @include('homepage.splash.splash-1')
          @include('homepage.splash.splash-2')
          @include('homepage.splash.splash-3')
        </div>
      </div>
</section>

@endsection
@section('script')
    {{-- your script goes here --}}
@endsection