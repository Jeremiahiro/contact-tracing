@extends('layouts.app')

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')

<section class="mb-5 py-3">
    @include('activity.partials.list')
</section>

@endsection
@section('script')
@include('activity.partials.mapScript')

@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
