@extends('layouts.app')

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')

<section class="mb-5 py-3">

    @foreach ($activities as $index => $activity)
    <div class="">
        <div class="container py-3 d-flex justify-content-around">
            <div class="w-25">
                <p class="m-0 py-1 f-12 bold">{{ $activity['start_date']->format('H:i A') }}</p>
                <div class="vl ml-"></div>
                <p class="m-0 py-1 f-12 bold">{{ $activity['end_date']->format('H:i A') }}</p>
            </div>
            <div class="{{ $index % 2 == 0 ? 'route_white' : 'route_purple' }} route p-3">
                <div class="f-14 pb-2">
                    <h6 class="m-0 bold f-10">Route & Interactions</h6>
                    <a class="" data-toggle="modal" data-target="#tagModal-{{ $activity->id }}">
                        <div class="mb-0 pb-0 bold text-uppercase">
                            {{ \Illuminate\Support\Str::limit($activity->to_location, 25) }}</div>
                        <div class="f-12 m-0 regular">{{ \Illuminate\Support\Str::limit($activity->to_address, 40) }}
                        </div>
                    </a>
                </div>
                <div class="mb-2 d-flex justify-content-between align-items-center">
                    <div class="w-80">
                        <a href="" data-toggle="modal" data-target="#tagModal-{{ $activity->id }}">
                            <img class="rounded" src="https://maps.googleapis.com/maps/api/staticmap?size=200x60&zoom=16&center={{ $activity->to_location }}&format=png&style=feature:road.highway%7Celement:geometry%7Cvisibility:simplified%7Ccolor:0xffffff&style=feature:transit.line%7Cvisibility:simplified%7Ccolor:dfd2ae&style=feature:road.highway%7Celement:labels.text.stroke%7Cvisibility:on%7Ccolor:db8555&style=feature:road.highway%7Celement:labels.text.fill%7Cvisibility:on%7Ccolor:806b63&key={{env('GOOGLE_API_KEY')}}" alt="">
                        </a>
                    </div>
                    <div class="">
                        <a class="f-8 bold" data-toggle="modal" data-target="#tagModal-{{ $activity->id }}">
                            MAP VIEW
                        </a>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="">
                        @if ($activity->tags->count())
                        @foreach ($activity->tags->take(4) as $index => $person)
                        <img src="{{ $person->avatar }}" class="avatar avatar-xs" alt="Activity Tag">
                        @endforeach
                        @if ($activity->tags->count() > 4)
                        <a class="bold" data-toggle="modal" data-target="#tagModal-{{ $activity->id }}">
                            <span class="bold">+{{ $activity->tags->count() - 4 }}</span>
                        </a>
                        @endif
                        @endif
                    </div>
                    <div class="">
                        <a href="{{ route('activity.edit', 1) }}" class="add_svg">
                            <img class="icon_blue" src="{{ asset('frontend/img/svg/plus_blue.svg' )}}"
                                alt="Edit Activity">
                            <img class="icon_white" src="{{ asset('frontend/img/svg/plus_white.svg' )}}"
                                alt="Edit Activity">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('activity.modals.activitySelection')

    @endforeach
</section>

@endsection
@section('script')
@include('activity.partials.mapScript')
@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
