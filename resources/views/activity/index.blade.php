@extends('layouts.app')

@section('title')
Activities
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('frontend/css/rescalendar.min.css') }}">
<script type="text/javascript" src="{{ asset('frontend/js/rescalendar.min.js') }}"></script>

<script src="{{ asset('frontend/jquery/map-view.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&callback=initMap" async defer>
</script>
@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";

</script>
@endsection

@section('content')

<section class="mb-5 py-3">

    <div>
        <div class="wrapper">
            <div class="rescalendar" id="my_calendar_calSize"></div>
        </div>
        <input type="hidden" name="date_sort" id="date_sort">
    </div>
    <div class="" id="activity">
        <div id="activity_list">
            @include('activity.partials.activity_list_view')
        </div>
    </div>
    </div>

    <div id="activity_spinner" class="text-center my-5 d-none">
        <div class="spinner-grow text-primary load-activity" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

</section>

@endsection
@section('script')
<script>
    jQuery(document).ready(function ($) {

        // Multiple instantiation (divs 1 and 2)
        $('#my_calendar_calSize').rescalendar({
            id: 'my_calendar_calSize',
            jumpSize: 3,
            calSize: 6,
            dataKeyField: 'name',
            dataKeyValues: ['item1']
        });

    });

</script>
@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
