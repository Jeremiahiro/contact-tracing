@extends('layouts.app')

@section('title')
Add Activity
@endsection
@section('custom-style')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<script src="{{ asset('frontend/jquery/activityValidation.js') }}"></script>
<script src="{{ asset('frontend/jquery/activityDatePicker.js') }}"></script>

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
@include('activity.partials.googlePlace')
@include('activity.partials.formScript')

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
    <div class="container text-primary mb-5">
        <div class="py-5 mb-5 activity">
            <p class="f-12 bold">Record Activity</p>
            <form method="POST" action="{{ route('activity.store') }}" id="activitForm" name="activity"
                autocomplete="off">
                @csrf
                <div id="startTour" class="d-flex justify-content-between align-items-center where-to">
                    <img src="{{ asset('/frontend/img/svg/left.svg') }}" alt="" class="mt-3 mr-1 where-to-icon">
                    <div class="form-group row w-100">
                        <label for="from_location" class="f-24 col-md-12 text-md-left">
                            {{ __('Where') }}
                        </label>
                        <div class="col-md-6 mb-1">
                            <input id="from_address" type="search"
                                class="blue-input input rounded-0 @error('from_address') is-invalid @enderror"
                                name="from_address" value="{{ old('from_address') }}" required autocomplete="off"
                                placeholder="From">
                            <input type="hidden" name="from_location" class="" id="from_location"
                                value="{{ old('from_location') }}">
                            <input type="hidden" name="from_latitude" class="" id="from_latitude"
                                value="{{ old('from_latitude') }}">
                            <input type="hidden" name="from_longitude" class="" id="from_longitude"
                                value="{{ old('from_longitude') }}">
                            @error('from_location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="invalid-feedback" id="fromAlert" role="alert">
                                <strong class="text-danger regular">
                                    Selected location not available on Google Map</strong>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <input id="to_address" type="search"
                                class="blue-input input rounded-0 @error('to_address') is-invalid @enderror"
                                name="to_address" value="{{ old('to_address') }}" required autocomplete="off"
                                placeholder="To">
                            <input type="hidden" name="to_location" class="" id="to_location"
                                value="{{ old('to_location') }}">
                            <input type="hidden" name="to_latitude" class="" id="to_latitude"
                                value="{{ old('to_latitude') }}">
                            <input type="hidden" name="to_longitude" class="" id="to_longitude"
                                value="{{ old('to_longitude') }}">
                            @error('to_location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="invalid-feedback" id="toAlert" role="alert">
                                <strong class="text-danger regular">Selected location not available on Google
                                    Map</strong>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="ml-4">
                    <div class="row mb-4 form-group">
                        <label for="when" class="f-24 col-md-12 text-md-left">
                            {{ __('When') }}
                        </label>
                        <div class="flex-row d-flex justify-content-center w-100">
                            <div class="col-md-12">
                                <div class="input-group date input-daterange">
                                    <input type="text" class="f-14 regular input blue-input input1 rounded-0"
                                        name="start_date" placeholder="Start Date/Time" id="startDate"
                                        value="{{ date('d-m-Y H:i', strtotime('+1 hour')) }}" readonly>
                                    <input type="text" class="f-14 regular input blue-input ml-1 input2 rounded-0"
                                        name="end_date" placeholder="End Date/Time" id="endDate"
                                        value="{{ date('d-m-Y H:i', strtotime('+2 hour +20 minutes')) }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        @include('activity.partials.tags')
                    </div>
                </div>

                <div class="">
                    <div class="form-group pull-right">
                        <button type="submit" class="btn f-14 rounded blue-btn px-3 text-white">ADD</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('partials.mobile.footer.footer')
</section>
@endsection
@section('script')
@include('component.tour.activityTour')
@endsection
