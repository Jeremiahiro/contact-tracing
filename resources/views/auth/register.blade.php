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
            <div class="register pt-5">
                <h1 class="text-white f-60">REGISTER</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 text-md-right">
                            {{ __('Full Name') }}
                        </label>
                        <div class="col-md-8">
                            <input id="name" type="text"
                                class="blue-input input @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name"
                                placeholder="Sarah Parmenter" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 text-md-right">
                            {{ __('Email') }}
                        </label>

                        <div class="col-md-8">
                            <input id="email" type="text"
                                class="blue-input input @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email"
                                placeholder="sarah@youknowwho.com" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 text-md-right">
                            {{ __('Phone Number') }}
                        </label>

                        <div class="col-md-8">
                            <input id="phone" type="tel"
                                class="blue-input input @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" required autocomplete="phone" placeholder="+2348123456789">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 text-md-right">
                            {{ __('Password') }}
                        </label>

                        <div class="col-md-8">
                            <input id="password" type="password"
                                class="blue-input input @error('password') is-invalid @enderror" name="password"
                                value="{{ old('password') }}" required autocomplete="password" placeholder="********">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 text-md-right">
                            {{ __('Confirm Password') }}
                        </label>

                        <div class="col-md-8">
                            <input id="password-confirm" type="password"
                                class="blue-input input @error('password-confirm') is-invalid @enderror" name="password_confirmation"
                                value="{{ old('password_confirmation') }}" required autocomplete="password-confirm" placeholder="********">
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="f-18 btn btn-lg w-100 text-white border border-2 border-white text-center">
                            {{ __('SIGN UP') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="py-5">
            @include('auth.socials')
        </div>

    </div>
</section>

@endsection
