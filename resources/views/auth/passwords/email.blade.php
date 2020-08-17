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
            <div class="login pt-5">
                <h2 class="text-white f-60">{{ __('Password Recovery') }}</h2>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 mt-5 mb-3">
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

                    <div class="form-group mb-5 pb-5">
                        <button type="submit"
                            class="f-18 btn btn-lg w-100 text-white border border-2 border-white text-center">
                            SUBMIT
                        </button>
                    </div>
                </form>
            </div>

            <div class="py-5">
                @include('auth.socials')
            </div>
        </div>
    </div>
</section>

@endsection
