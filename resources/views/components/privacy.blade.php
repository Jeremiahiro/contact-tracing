@extends('layouts.app')

@section('title')
Privacy Policy
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<style>
    .privacy li:before {
        position: absolute;
        left: 20px;
        content: "\2022";
    }

    .privacy li {
        list-style: none;
    }

</style>
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
    @include('components.partials.privacy-content')
</div>
@endsection

@section('content')
<section>
    <div class="container py-5 privacy">
        @include('components.partials.privacy-content')
    </div>
</section>
@endsection


@section('footer')
@include('partials.mobile.footer.footer')
@endsection

@section('script')
@endsection
