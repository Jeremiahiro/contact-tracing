@extends('layouts.app')

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<script src="{{ asset('frontend/jquery/map-view.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&callback=initMap" async defer></script>

@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}"; //here double curly bracket
</script>
@endsection

@section('content')

<section class="mb-5 py-3">
    @include('components.notification.data')
</section>

@endsection
@section('script')
@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
