@extends('layouts.app')

{{-- link to styles --}}
@section('custom-style')
{{-- custom style goes here --}}

@endsection

{{-- for web view --}}
@section('web-content')
<div class="d-flex flex-column min-vh-100">
    <div class="py-4 px-5">
        <div class="row">
            <div class="d-flex col-lg-6 col-md-12 justify-content-center">
                <a href="{{ route('map.view') }}" class="text-primary">Home</a>
                <a href="{{ route('about') }}" class="text-primary pl-4">About</a>
                <a href="{{ route('privacy') }}" class="text-primary px-4">Privacy Policy</a>
                <a href="{{ route('tos') }}" class="text-primary">Terms of Use</a>
            </div>
            <div class="text-center col-lg-6 d-none d-md-block">
                <h6 class="f-14">For Best experience on the platform, kindly use a mobile device</h6>
            </div>
        </div>
    </div>
    <div class="flex-grow-1">
        <div class="container py-3 col-8 lead">
            @include('gdpr.partials.dpa')
        </div>
    </div>
    <div>
        <div class="mb-5"></div>
        @include('partials.mobile.footer.footer-lg')
    </div>
</div>

@endsection

{{-- for mobile view --}}
@section('content')
<section>
    <div class="container py-3 lead mb-5">
        <a href="{{ url()->previous() }}" class="">
            <img src="{{ asset('/frontend/img/svg/back_blue.svg') }}" alt="go back">
        </a>
        @include('gdpr.partials.dpa')
    </div>
</section>
@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection

{{-- scripts --}}
@section('script')

@endsection
