@extends('layouts.app')

@section('title')
Locations
@endsection

@section('custom-style')
{{-- <script src="{{ asset('frontend/jquery/map-loc-view.js') }}"></script> --}}
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&callback=initMap" async defer></script>
@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";

</script>
@endsection

@section('content')
@include('partials.mobile.header.header')

<div class="activityTab py-2">
    <ul class="m-3 f-12 nav d-flex justify-content-between">
        <li class="active">
            <a data-toggle="tab" href="#allLoc" class="text-primary active">All Locations</a>
        </li>
        <li><a data-toggle="tab" href="#fav" class="text-primary">Favourite</a></li>
    </ul>
</div>

<div class="tab-content">
    <div class="tab-pane in active" id="allLoc">
        <div id="location_list">
            @include('components.locations.partials.locations')
        </div>
        <div class="text-center mb-5">
            <div class="spinner-grow text-primary load-activity d-none" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="fav">
        <div id="favourite_list">
            @include('components.locations.partials.favorites')
        </div>
        <div class="text-center mb-5">
            <div class="spinner-grow text-primary load-activity d-none" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">
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
                $("#location-list").append(data.locations);
                $("#favourite-list").append(data.favorites);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    }

</script>

<script>
jQuery(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.toggleFavourite').click(function () {
        var locationID = $(this).data('id');
        console.log(locationID);
        var object = $(this);
        var c = $(this).parent("div").find("#fav_icon").attr('src');

        $.ajax({
            type: 'GET',
            url: `favorite/` + locationID,
            contentType: 'application/json',
        }).done(response => {
            if (response.attach != true) {
                object.find("img").attr('src', '/frontend/img/svg/heart.svg');
                fetchFavourites();
            } else {
                fetchFavourites();
                object.find("img").attr('src', '/frontend/img/svg/heart_red.svg');
            }
        }).fail(e => {
            console.log(e);
            object.find("img").attr('src', '/frontend/img/svg/heart.svg');
        });
    });

    function fetchLocation() {
        $.ajax({
            url: `get_data`,
            type: "GET",
            data: {
                'type': 'location'
            },
            success: function (data) {
                $("#location_list").html(data.locations);
            },
        });
    }

    function fetchFavourites() {
        $.ajax({
            url: `get_data`,
            type: "GET",
            data: {
                'type': 'favorites'
            },
            success: function (data) {
                $("#favourite_list").html(data.favorites);
            },
        });
    }


});

</script>

@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection