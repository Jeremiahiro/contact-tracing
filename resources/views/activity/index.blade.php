@extends('layouts.app')

@section('title')
Activities
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";//here double curly bracket
</script>
@endsection

@section('content')

<section class="mb-5 py-3">

    <div id="activity-list">
        @include('activity.partials.list')
    </div>

    <div class="text-center mb-5">
        <div class="spinner-grow text-primary load-activity d-none" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

</section>

@endsection
@section('script')
@include('activity.partials.mapScript')
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
                $("#activity-list").append(data.html);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                alert('server not responding...');
            });
    }

</script>
@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
