@extends('layouts.app')

@section('title')
Add Activity
@endsection
@section('custom-style')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<script src="{{ asset('frontend/jquery/activityValidation.js') }}"></script>
<script src="{{ asset('frontend/jquery/activityDatePicker.js') }}"></script>

<script src="{{ asset('frontend/jquery/formTagging.js') }}"></script>
<script src="{{ asset('frontend/jquery/google-location-autocomplete.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&libraries=places&callback=initialize"
    type="text/javascript" async defer></script>

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
        <div class="py-5 activity">
            <p class="f-12 bold">Record Activity</p>
            <form method="POST" action="{{ route('activity.store') }}" id="activitForm" name="activity"
                autocomplete="off">
                @csrf
                <div class="ml-3">
                    <label for="location_1" class="f-24 col-md-12 text-md-left">
                        {{ __('Where') }}
                    </label>
                </div>
                <div id="startTour" class="d-flex justify-content-between">
                    <div>
                        <span class="mt-2">
                            <img src="{{ asset('/frontend/img/svg/left.svg') }}" alt="" class="ml-1" id="sideIcon-1">
                            <img src="{{ asset('/frontend/img/svg/left-1.svg') }}" alt="" class="ml-1 d-none" id="sideIcon-2">
                        </span>
                    </div>
                    <div class="form-group row w-100">

                        <div class="col-md-6 mb-1">
                            <div>
                                <input id="address_1" type="search"
                                    class="blue-input input rounded-0 @error('from_address') is-invalid @enderror"
                                    name="from_address" value="{{ old('from_address') }}" required autocomplete="off"
                                    placeholder="From">
                                <input type="hidden" name="from_location" class="" id="location_1"
                                    value="{{ old('from_location') }}">
                                <input type="hidden" name="from_latitude" class="" id="latitude_1"
                                    value="{{ old('from_latitude') }}">
                                <input type="hidden" name="from_longitude" class="" id="longitude_1"
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
                            <div class="f-24 border collapse additional-info-collapse" id="collapseFromInfo">
                                <div class="d-flex justify-content-between p-2">
                                    <div class="col-6 p-0 m-0">
                                        <p class="m-0 p-0 f-14">Known Locations</p>
                                        @if (!$user->location->home_address && !$user->location->office_address)
                                        <p class="light f-14">
                                            No known location,
                                            <br>
                                            Add one
                                            <a href="{{ route('dashboard.edit', $user->uuid) ."#addressInfo" }}"
                                                class="text-primary">
                                                here
                                            </a>
                                        </p>
                                        @endif
                                        <div class="">
                                            @if ($user->location->home_address)
                                            <input class="existingLoc" type="radio" id="use_home_address_for_from"
                                                value="" aria-label="..." name="from"
                                                data-address="{{ $user->location->home_address }}"
                                                data-location="{{ $user->location->home_location }}"
                                                data-latitude="{{ $user->location->home_latitude }}"
                                                data-longitude="{{ $user->location->home_longitude }}">
                                            <label class="light f-16" for="use_home_address_for_from">
                                                Home
                                            </label>
                                            @endif
                                        </div>
                                        <div class="">
                                            @if ($user->location->office_address)
                                            <input class="existingLoc" type="radio" id="use_office_address_for_from"
                                                value="" aria-label="..." name="from"
                                                data-address="{{ $user->location->office_address }}"
                                                data-location="{{ $user->location->office_location }}"
                                                data-latitude="{{ $user->location->office_latitude }}"
                                                data-longitude="{{ $user->location->office_longitude }}">
                                            <label class="light f-16" for="use_office_address_for_from">
                                                Office
                                            </label>
                                            @endif
                                        </div>
                                        <div class="f-14 text-left d-none" id="clearFrom">clear</div>
                                    </div>
                                    <div class="">
                                        <label for="from_image" class="">
                                            <span>
                                                Add Image
                                                @include('activity.partials.cam')
                                            </span>
                                        </label>
                                        <input type="hidden" name="from_image" id="from_image_value" value="">
                                        <input type="File" name="" class="d-none avatar-input" id="from_image" value=""
                                            accept="image/*">
                                        <div id="fromImagePreviewDiv" class="d-none tx_effect">
                                            <div class="img_preview">
                                                <img src="http://placehold.it/100" alt="Location Image Preview"
                                                    class="loc_img_preview" id="fromImagePreview">
                                            </div>
                                            <div class="text-right">
                                                <i class="fa fa-times text-danger" id="removeFromImage"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div>
                                <input id="address_2" type="search"
                                    class="blue-input input rounded-0 @error('to_address') is-invalid @enderror"
                                    name="to_address" value="{{ old('to_address') }}" required autocomplete="off"
                                    placeholder="To">
                                <input type="hidden" name="to_location" class="" id="location_2"
                                    value="{{ old('to_location') }}">
                                <input type="hidden" name="to_latitude" class="" id="latitude_2"
                                    value="{{ old('to_latitude') }}">
                                <input type="hidden" name="to_longitude" class="" id="longitude_2"
                                    value="{{ old('to_longitude') }}">
                                @error('to_location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <span class="invalid-feedback" id="toAlert" role="alert">
                                    <strong class="text-danger regular">
                                        Selected location not available on Google Map
                                    </strong>
                                </span>
                            </div>
                            <div class="f-24 border collapse additional-info-collapse" id="collapseToInfo">
                                <div class="d-flex justify-content-between p-2">
                                    <div class="col-6 p-0 m-0">
                                        <p class="m-0 p-0 f-14">Known Locations</p>
                                        @if (!$user->location->home_address && !$user->location->office_address)
                                        <p class="light f-14">
                                            No known location,
                                            <br>
                                            Add one
                                            <a href="{{ route('dashboard.edit', $user->uuid) ."#addressInfo" }}"
                                                class="text-primary">
                                                here
                                            </a>
                                        </p>
                                        @endif
                                        <div class="">
                                            @if ($user->location->home_address)
                                            <input class="existingLoc" type="radio" id="use_home_address_for_to"
                                                value="" aria-label="..." name="to"
                                                data-address="{{ $user->location->home_address }}"
                                                data-location="{{ $user->location->home_location }}"
                                                data-latitude="{{ $user->location->home_latutude }}"
                                                data-longitude="{{ $user->location->home_longitude }}">
                                            <label class="light f-16" for="use_home_address_for_to">
                                                Home
                                            </label>
                                            @endif
                                        </div>
                                        <div class="">
                                            @if ($user->location->office_address)
                                            <input class="existingLoc" type="radio" id="use_office_address_for_to"
                                                value="" aria-label="..." name="to"
                                                data-address="{{ $user->location->office_address }}"
                                                data-location="{{ $user->location->office_location }}"
                                                data-latitude="{{ $user->location->office_latutude }}"
                                                data-longitude="{{ $user->location->office_longitude }}">
                                            <label class="light f-16" for="use_office_address_for_to">
                                                Office
                                            </label>
                                            @endif
                                        </div>
                                        <div class="f-14 text-left d-none" id="clearTo">clear</div>
                                    </div>
                                    <div class="">
                                        <label for="to_image" class="">
                                            <span>
                                                Add Image
                                                @include('activity.partials.cam')
                                            </span>
                                        </label>
                                        <input type="hidden" name="to_image" id="to_image_value">
                                        <input type="File" name="" class="d-none avatar-input" id="to_image" value=""
                                            accept="image/*">
                                        <div id="toImagePreviewDiv" class="d-none tx_effect">
                                            <div class="img_preview">
                                                <img src="http://placehold.it/100" alt="Location Image Preview"
                                                    class="loc_img_preview" id="toImagePreview">
                                            </div>
                                            <div class="text-right">
                                                <i class="fa fa-times text-danger" id="removeToImage"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

@include('partials.modals.upload.uploadModal')

@endsection
@section('script')

@endsection
