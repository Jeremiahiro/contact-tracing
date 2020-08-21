@extends('layouts.app')

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('content')
<section>
    <div class="splash splash-1">
        @include('partials.mobile.header.header')

        <div class="container">
            <div class="login py-5">
                <h1 class="text-white f-60">{{ __('Reset Password') }}</h1>
                <form method="POST" action="{{ route('password.update') }}" class="py-3">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row">
                        <div class="col-md-6 mb-3">
                            <input id="email" type="email"
                                class="transparent-input border-bottom input px-2 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Email Address" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 mb-3">
                            <input id="password" type="password"
                                class="transparent-input border-bottom input px-2 @error('password') is-invalid @enderror"
                                name="password" value="{{ old('password') }}" required autocomplete="password"
                                placeholder="New Password" autofocus>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 mb-3">
                            <input class="transparent-input border-bottom input px-2 @error('password') is-invalid @enderror" type="password"
                            name="password_confirmation" placeholder="Confirm Password" aria-label="Password"
                            id="password-confirm" autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="f-18 btn btn-lg w-100 text-white border border-2 border-white text-center">
                            {{ __('CONFIRM PASSWORD') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
