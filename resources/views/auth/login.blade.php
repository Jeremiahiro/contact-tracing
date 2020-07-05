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
    <div class="splash splash-1">
        @include('partials.mobile.header.header-transparent')

        <div class="container">
            <div class="login pt-5">
                <h1 class="text-white">LOGIN</h1>
                <form class="py-5 login">
                    <div class="form-group">
                        <input type="text" class="white_input form-control bg-transparent" id="fullname" placeholder="Userrname">
                    </div>
                    <div class="form-group">
                        <input type="password" class="white_input form-control bg-transparent" id="password" placeholder="&#128274; Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="w-100 btn btn-outline-light">LOGIN</button>
                    </div>
                    
                </form>
            </div>
        </div>

        @include('auth.socials')

    </div>
</section>

@endsection
