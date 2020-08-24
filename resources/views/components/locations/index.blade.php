@extends('layouts.app')

@section('title')
Locations
@endsection

@section('custom-style')

@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";
</script>
@endsection

@section('content')
locations

{{-- @foreach ($locations as $location)
@include('components.locations.partials.data')    
@endforeach --}}


@foreach ($favorites as $loc)
@php
    $location = $loc->location
@endphp
@include('components.locations.partials.data')    
@endforeach


@endsection

@section('footer')
@include('partials.mobile.footer.footer')
@endsection

@section('script')

@endsection
