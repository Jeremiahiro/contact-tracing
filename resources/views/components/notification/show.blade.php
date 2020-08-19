@extends('layouts.app')

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
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
@include('activity.partials.mapScript')
@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
