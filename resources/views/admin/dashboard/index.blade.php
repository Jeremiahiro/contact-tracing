@extends('layouts.admin')

@section('title')
Dashboard
@endsection

@section('style')

@endsection

@section('content')
<div class="container-fluid">
    Dashboard

    <div>
        <select class="user_chart_select" name="year">
            @foreach ($years as $date)
                <option value="{{ $date }}">Year {{ $date }}</option>
            @endforeach
        </select>
    
        <div class="card-body">
            {!! $userChart->container() !!}
        </div>
    </div>

    <div>
        <select class="activity_chart_select" name="year">
            @foreach ($years as $date)
                <option value="{{ $date }}">Year {{ $date }}</option>
            @endforeach
        </select>
    
        <div class="card-body">
            {!! $activityChart->container() !!}
        </div>
    </div>

    <div class="card-body">
        {!! $usersGender->container() !!}
    </div>
    <div class="card-body">
        {!! $usersAge->container() !!}
    </div>
</div>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

{!! $userChart->script() !!}
{!! $activityChart->script() !!}
{!! $usersGender->script() !!}
{!! $usersAge->script() !!}

<script type="text/javascript">
    var user_chart_api_url = {{ $userChart->id }}_api_url;
    $(".user_chart_select").change(function(){
        var year = $(this).val();
        {{ $userChart->id }}_refresh(user_chart_api_url + "?year="+year);
    });
</script>

<script type="text/javascript">
    var activity_chart_api_url = {{ $activityChart->id }}_api_url;
    $(".activity_chart_select").change(function(){
        var year = $(this).val();
        {{ $activityChart->id }}_refresh(activity_chart_api_url + "?year="+year);
    });
</script>

@endsection
