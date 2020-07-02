@extends('layouts.app')

@section('custom-style')
    <link href="{{ asset('frontend/css/auth.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/register.css') }}" rel="stylesheet">
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
            <div class="register pt-5">
                <h1 class="text-white">REGISTER</h1>
                <form>
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Sarah Parmenter">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="sarah@youknowwho.com">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" id="phone" placeholder="+23498097757868709">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder=".......">
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmpassword" placeholder=".......">
                    </div>
                    <button type="submit" class="w-100 btn btn-outline-primary">SIGN UP</button>
                </form>
            </div>
        </div>

        @include('auth.socials')

    </div>
</section>

@endsection
