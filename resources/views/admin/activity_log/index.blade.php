@extends('layouts.admin')

@section('style')

@endsection

@section('content')
<div class="container-fluid">
    <h5>Activity Feed</h5>
    <ol class="activity-feed" id="activity_feed">
        @include('admin.activity_log.data')
    </ol>
</div>

@endsection
@section('script')

<script>
    $(document).ready(function () {

        $(function fetchActivityLog() {

            setTimeout(function () {
                $.ajax({
                    url: `/backend/activity_log`,
                    type: "GET",
                    data: {
                        'type': 'activity_log'
                    },
                    success: function (data) {
                        $("#activity_feed").html(data.activity_logs);
                        console.log(1);
                    },
                    error(e) {
                        console.log(e['responseText']);
                    },
                    complete: fetchActivityLog
                });
            }, 5000);
        });
    });

</script>
@endsection
