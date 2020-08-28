@extends('layouts.app')

@section('title')
Followers
@endsection

@section('custom-style')

@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";

</script>
@endsection

@section('content')
<div class="text-primary">
    @include('partials.mobile.header.header')
    <div class="p-3">
        <div class="activityView">
            <div class="activityTab">
                <ul class="mb-0 f-12 nav">
                    <li>
                        <a data-toggle="tab" href="#followings_list" class="text-primary" aria-disabled="true"
                            disabled>Mutual</a>
                    </li>
                    <span class="mx-1">|</span>
                    <li class="active">
                        <a data-toggle="tab" href="#followers_list" class="text-primary active" aria-disabled="true"
                            disabled>Neutral</a>
                    </li>
                </ul>
            </div>
            <div class="py-3 tab-content">
                {{-- <div class="tab-pane fade" id="followings_list"> --}}
                {{-- @include('components.follow.partials.followings_data') --}}
                {{-- </div> --}}
                <div class="tab-pane active" id="followers_list">
                    @include('components.follow.partials.followers_data')
                </div>
                <div class="text-center mb-5">
                    <div class="spinner-grow text-primary load_followers d-none" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('partials.mobile.footer.footer')
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
                    $('.load_followers').removeClass('d-none');
                }
            })
            .done(function (data) {
                if (data.html == " ") {
                    $('.load_followers').html("No more records found");
                    return;
                }
                $('.load_followers').addClass('d-none');
                $("#followers_list").append(data.followers);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR);
            });
    }

</script>
@endsection
