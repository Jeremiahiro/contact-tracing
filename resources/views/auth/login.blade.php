@extends('layouts.app')

@section('custom-style')
    <link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";//here double curly bracket
</script>
@endsection

@section('content')
<section>
    <div class="splash splash-1">
        @include('partials.mobile.header.header')

        <div class="container col-md-6">
            <div class="">
                <h1 class="text-white f-60 py-5">LOGIN</h1>
                <form class="" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="input-group col-md-12 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text transparent-input border-bottom" id="login-user-icon">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <input id="email" type="email"
                                class="transparent-input border-bottom input @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="iro@iro.com" autofocus aria-label="Email"
                                aria-describedby="login-user-icon">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="input-group col-md-12 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text transparent-input border-bottom" id="login-pass-icon">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input id="password" type="password"
                                class="transparent-input border-bottom input @error('password') is-invalid @enderror"
                                name="password" value="" required autocomplete="new password" placeholder="**********"
                                autofocus aria-label="Password" aria-describedby="login-pass-icon">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="checkbox">
                        <label class="d-none">
                            <input type="checkbox" name="remember" checked> Remember Me
                        </label>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="f-18 btn btn-lg w-100 text-white border border-white text-center">
                            LOGIN
                        </button>
                    </div>
                </form>
                @if (Route::has('password.request'))
                <div class="d-flex justify-content-end">
                    <a class="text-light f-14" href="{{ route('password.request') }}">
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
@section('script')

@endsection
