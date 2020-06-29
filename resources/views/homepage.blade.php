@extends('layouts.app')

@section('custom-style')
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
@endsection

@section('header')
    @include('partials.mobile.header.header-white')
@endsection

@section('web-content')
    <h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')
<div class="container">
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
</div>
@endsection
@section('script')
    
@endsection