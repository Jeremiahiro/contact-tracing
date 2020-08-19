@extends('layouts.app')

{{-- link to styles --}}
@section('custom-style')
{{-- custom style goes here --}}

@endsection

{{-- for web view --}}
@section('web-content')
<div class="container py-5 col-8 lead">
@include('gdpr.gdpr')
</div>
@endsection

{{-- for mobile view --}}
@section('content')
<section>
<div class="container py-5 lead">
   @include('gdpr.gdpr')
</div>
</section>
@endsection

{{-- scripts --}}
@section('script')

@endsection
