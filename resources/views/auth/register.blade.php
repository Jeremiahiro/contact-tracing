@extends('layouts.app')

@section('custom-style')
    <link href="{{ asset('frontend/css/auth.css') }}" rel="stylesheet">
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

        Register
    </div>
</section>

@endsection
