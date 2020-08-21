@extends('layouts.app')

@section('title')
Update Activity
@endsection

@section('custom-style')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<script src="{{ asset('frontend/jquery/activityValidation.js') }}"></script>
<script src="{{ asset('frontend/jquery/tabToggle.js') }}"></script>
<script src="{{ asset('frontend/jquery/formTagging.js') }}"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/amsify.suggestags.css') }}">
<script type="text/javascript" src="{{ asset('frontend/jquery/jquery.amsify.suggestags.js') }}">
</script>

@endsection

@section('header')

@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}"; 
</script>
@endsection

@section('content')
{{-- @include('activity.partials.formScript') --}}

<div id="alert">
    @if($errors->any())
    <div class="alert alert-danger text-danger" role="alert">
        <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-danger">&times;</span>
        </button>
        <strong class="text-danger">Error! Select a valid location(s)</strong>
    </div>
    @endif
</div>

<section>
    <div class="container text-primary">
        <div class="pt-3 pb-5 activity">
            <p class="mx-2">

                @if (url()->current() == url()->previous())
                <a href="{{ route('activity.index') }}" class="">
                    <img src="{{ asset('/frontend/img/svg/back_blue.svg') }}" alt="go back">
                </a>
                @else
                <a href="{{ url()->previous() }}" class="">
                    <img src="{{ asset('/frontend/img/svg/back_blue.svg') }}" alt="go back">
                </a>
                @endif

            </p>
            <p class="f-12 bold">Update Activity</p>
            <form method="POST" action="{{ route('activity.update', $activity->id) }}" id="activitForm" name="activity"
                autocomplete="off">
                @csrf
                @method("PATCH")

                <div>
                    <div class="d-flex justify-content-between bold mb-3">
                        <div class="d-flex">
                            <img src="{{ asset('/frontend/img/svg/map-pin-markedwhite.svg') }}" alt="map-pin">
                            <div class="ml-1">
                                <h3 class="m-0 p-0 f-16">{{ $activity->from_location }}</h3>
                                <p class="m-0 p-0 f-10 regular">{{ $activity->from_address }}</p>
                            </div>
                        </div>
                        <p class="f-9">
                            {{ $activity['start_date']->format('g:i A') }}
                        </p>
                    </div>

                    <div class="d-flex justify-content-between bold mb-3">
                        <div class="d-flex">
                            <img src="{{ asset('/frontend/img/svg/map-pin-markedwhite.svg') }}" alt="map-pin">
                            <div class="ml-1">
                                <h3 class="m-0 p-0 f-16">{{ $activity->to_location }}</h3>
                                <p class="m-0 p-0 f-10 regular">{{ $activity->to_address }}</p>
                            </div>
                        </div>
                        <p class="f-9">
                            {{ $activity['end_date']->format('g:i A') }}
                        </p>
                    </div>
                </div>

                <div class="my-5">
                    <div class="ml-3">
                        <div class="mb-3">
                            @include('activity.partials.tags')
                        </div>
                    </div>

                    <div class="">
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit" id="submit-form"
                                class="btn f-14 rounded blue-btn px-3 text-white">ADD</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
@endsection
@section('script')
@endsection
