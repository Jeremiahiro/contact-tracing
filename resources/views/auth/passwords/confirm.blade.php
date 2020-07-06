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
                <h1 class="text-white f-40">{{ __('Confirm Your Password') }}</h1>
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 my-5">
                            <input id="password" type="password"
                                class="transparent-input input px-2 @error('password') is-invalid @enderror"
                                name="password" value="{{ old('password') }}" required autocomplete="password"
                                placeholder="&#xf023; password" autofocus>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                            class="f-18 btn btn-lg w-100 text-white border border-2 border-white text-center">
                            {{ __('CONFIRM PASSWORD') }}
                        </button>
                    </div>
                </form>
                @if (Route::has('password.request'))
                <div class="mb-5 d-flex justify-content-end">
                    <a class="text-light" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                </div>
                @endif
            </div>

            <div class="py-5">
                @include('auth.socials')
            </div>
        </div>
    </div>
</section>

@endsection
