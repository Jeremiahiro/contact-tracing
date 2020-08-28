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
    {{-- <div class="activityTab">
        <ul class="m-3 f-12 nav d-flex justify-content-between">
            <li class="active">
                <a data-toggle="tab" href="#activity" class="text-primary active">Timeline</a>
            </li>
            <li><a data-toggle="tab" href="#tagged" class="text-primary">Tagged in</a></li>
        </ul>
    </div> --}}

    {{-- <div class="tab-content"> --}}
    {{-- <div class="tab-pane in active" id="activity"> --}}
    <div class="" id="activity">
        <div id="activity_list">
            @include('activity.partials.activity_list_view')
        </div>
    </div>
    {{-- <div class="tab-pane fade" id="tagged"> --}}
    {{-- <div id="tagged_list"> --}}
    {{-- @include('activity.partials.tagged') --}}
    {{-- </div> --}}
    {{-- </div> --}}
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
            calSize: 5,
            dataKeyField: 'name',
            dataKeyValues: ['item1']
        });

    });

</script>
{{-- <script type="text/javascript">
    var page = 1;
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page);
        }
    });

    function loadMoreData(page) {
        $.ajax({
                url: '?page=' + page,
                type: "get",
                beforeSend: function () {
                    $('.load-activity').removeClass('d-none');
                }
            })
            .done(function (data) {
                if (data.html == " ") {
                    $('.load-activity').html("No more records found");
                    return;
                }
                $('.load-activity').addClass('d-none');
                $("#activity_list").append(data.activities);
                $("#tagged-list").append(data.istagged);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    }

</script> --}}
@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
