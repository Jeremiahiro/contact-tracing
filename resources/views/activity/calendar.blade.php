@extends('layouts.app')

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('frontend/css/rescalendar.min.css') }}">
@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')
<div class="container ">

    <div class="my-5">
        @php
            $d = date("j"); // todays date
            $m = date("m"); // month
            $y = date("Y"); // year
            $t = cal_days_in_month(CAL_GREGORIAN, $m, $y); //total days in current month
            $s = $t - $d;
        @endphp

        {{ $d }}<br />
        {{ $m }}<br />
        {{ $y }}<br />
        {{ $t }}<br />
        {{ $s }}<br />

        @for($j = 0; $j < $s; $j--)
            <p class="btn blue-btn">
                {{ $j }}
            </p>
        @endfor

        <br />
        <br />
        <br />

        @for($i = $d; $i < $t; $i++)
            <p class="btn blue-btn">
                {{ $i }}
            </p>
        @endfor
    </div>


    <div class="wrapper">
        <div class="rescalendar" id="my_calendar_calSize"></div>
    </div>
    <div class="activity_result" id="activity_result">
    </div>

    <input type="hidden" name="date_sort" id="date_sort" value="">
</div>

@endsection
@section('script')
<script type="text/javascript" src="{{ asset('frontend/js/rescalendar.min.js') }}"></script>
<script>
    jQuery(document).ready(function ($) {

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // Multiple instantiation (divs 1 and 2)
        $('#my_calendar_calSize').rescalendar({
            id: 'my_calendar_calSize',
            jumpSize: 2,
            calSize: 4,
            dataKeyField: 'name',
            dataKeyValues: ['item1']

        });

    });

</script>

@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
