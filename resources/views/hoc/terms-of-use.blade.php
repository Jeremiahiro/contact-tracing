@extends('layouts.app')

@section('title')
About Us
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<div class="d-flex py-4 px-5 justify-content-between align-items-center">
    <div class="d-flex">
        <a href="{{ route('map.view') }}" class="text-primary">Home</a>
        <a href="{{ route('about') }}" class="text-primary pl-4">About</a>
        <a href="{{ route('privacy') }}" class="text-primary px-4">Privacy Policy</a>
        <a href="{{ route('tos') }}" class="text-primary">Terms of Use</a>
    </div>
    <div class="text-center">
        <h6 class="">For Best experience on the platform, kindly use a mobile device</h6>
    </div>
    {{-- <div></div> --}}
</div>
<div class="container py-3 col-8 lead">
    @include('hoc.partials.terms-of-use-content')
</div>
@endsection

@section('mobile-content')

<section class="">
<div class="container py-5 mb-3 privacy">
    @include('hoc.partials.terms-of-use-content')
</div>
</section>

@endsection

@section('footer')
@include('partials.mobile.footer.footer')
@endsection

@section('script')
@endsection
