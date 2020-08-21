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
<div class="d-flex flex-column min-vh-100">
    @include('partials.web.header')
    <div class="flex-grow-1">
        <div class="container py-3 col-8 lead">
            @include('components.partials.privacy-content')
        </div>
    </div>
    <div>
        <div class="mb-5"></div>
        @include('partials.web.footer')
    </div>
</div>
@endsection

@section('content')
<section>
    <div class="container py-3 lead mb-5">
        <a href="{{ url()->previous() }}" class="">
            <img src="{{ asset('/frontend/img/svg/back_blue.svg') }}" alt="go back">
        </a>
        @include('components.partials.privacy-content')
    </div>
</section>
@endsection


@section('footer')
@include('partials.mobile.footer.footer')
@endsection
@section('script')
@endsection
