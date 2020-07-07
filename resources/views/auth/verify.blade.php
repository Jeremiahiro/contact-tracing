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
            <div class="login py-5">
                <h2 class="text-white">{{ __('Verify Your Email Address') }}</h2>

                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
                @endif
                <h5 class="py-5">
                    Before proceeding, please check your email for a verification link.
                </h5>
                <h5 class="">
                    If you did not receive the email
                </h5>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit"
                        class="f-18 btn btn-lg w-100 text-white border border-2 border-white text-center">
                        {{ __('Request Another Link') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
