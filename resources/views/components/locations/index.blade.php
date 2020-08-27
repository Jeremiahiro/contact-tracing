@extends('layouts.app')

@section('title')
Locations
@endsection

@section('custom-style')

@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";

</script>
@endsection

@section('content')

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
        <div id="activity-list">
            @foreach ($locations as $location)
            @include('components.locations.partials.data')
            @endforeach
        </div>
        <div class="text-center mb-5">
            <div class="spinner-grow text-primary load-activity d-none" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    
    <div class="tab-pane fade" id="fav">
        <div id="tagged-list">
            @foreach ($favorites as $loc)
            @php
            $location = $loc->location
            @endphp
            @include('components.locations.partials.data')
            @endforeach

        </div>
        <div class="text-center mb-5">
            <div class="spinner-grow text-primary load-activity d-none" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>


{{-- @foreach ($locations as $location)
@include('components.locations.partials.data')    
@endforeach --}}


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
                $("#activity-list").append(data.location);
                $("#tagged-list").append(data.favorites);
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

            $.ajax({
                type: 'GET',
                url: `favorite/`+locationID ,
                contentType: 'application/json',
                success: function (response) {
                  // show add button
                  console.log(response);

                    $('#favorites' + locationID).show();
                    // hide delete button
                    $('#unfavorite' + locationID).hide();
                },
                error: function (e) {
                    // handle error
                    console.log(e['responseText']);
                }
            });
        });
    });

</script>

@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
