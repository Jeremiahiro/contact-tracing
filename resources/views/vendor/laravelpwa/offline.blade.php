@extends('layouts.app')

{{-- link to styles --}}
@section('custom-style')
{{-- custom style goes here --}}

@endsection

{{-- for web view --}}
@section('web-content')

<h1>You are offline</h1>

@endsection

{{-- for mobile view --}}
@section('content')
<section>
   
    <h1>You are offline</h1>
    
</section>
@endsection

{{-- scripts --}}
@section('script')

@endsection
