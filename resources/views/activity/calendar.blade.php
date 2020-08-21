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

        <input type="hidden" id="date" value="{{ date('Y-M-') }}">

        @for($i = 1; $i <= $d; $i++)
            <input class="btn blue-btn day text-white" type="text" value="{{ $i }}" readonly>
        @endfor

        <br />
        <br />
        <br />
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

        var date = $('#date').val();
        var day = $('.day');

        day.click(function() {
            console.log(date);
            var act = date + day.val();
            console.log(act);
        });

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
