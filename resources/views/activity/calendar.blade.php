@extends('layouts.app')

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('frontend/css/rescalendar.min.css') }}">
@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";//here double curly bracket
</script>
@endsection

@section('content')
<div class="container ">

    <div class="wrapper">
        <div class="rescalendar" id="my_calendar_calSize"></div>
    </div>
    <input type="hidden" name="date_sort" id="date_sort">
</div>

@endsection
@section('script')


@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
