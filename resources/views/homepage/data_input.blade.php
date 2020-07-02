@extends('layouts.app')

@section('custom-style')
    <link href="{{ asset('frontend/css/auth.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/footer.css') }}" rel="stylesheet">
@endsection


@section('header')

@endsection

@section('web-content')
    <h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')
<section>
    @include('partials.mobile.header.header-white')
    <div class="container">
        <div class="py-5">
            <h3>Record Activity</h3>
            <form>
                <div class="form-group">
                    <label for="where">WHERE</label>
                    <input type="text" class="form-control" id="fullname" placeholder="24 Sanga Street Dline">
                </div>
                <div class="form-group">
                    <label for="where">WHERE</label>
                    <input type="text" class="form-control" id="email" placeholder="24 Sanga Street Dline">
                </div>
                <div class="form-group">
                    <label for="phone">WHEN</label>
                    <input type="datetime-local" class="form-control" id="phone" >
                </div>
                <div class="form-group">
                    <label for="contacts">WHO (Meet or See)</label>
                    <img src="{{  asset('/frontend/img/svg/support.svg') }}" alt="">
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
    @include('partials.mobile.footer.footer')
</section>

@endsection
