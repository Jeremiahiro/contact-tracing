@extends('layouts.app')

@section('title')
Favourite Locations
@endsection

@section('custom-style')

@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";
</script>
@endsection

@section('content')
favourites

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
