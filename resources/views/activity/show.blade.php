@extends('layouts.app')

@section('title')
Activities
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<script type="text/javascript">
    location = "{{ route('map.view') }}";
</script>
@endsection

@section('content')

<section class="mb-5 py-3">

    <div class="route_purple mx-0 px-3 pb-4 pt-2">
        @include('activity.partials.single-activity-view')
    </div>

</section>

@endsection
@section('script')
@include('activity.partials.mapScript')

@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
