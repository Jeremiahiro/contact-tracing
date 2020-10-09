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

<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&libraries=places&callback=initialize" type="text/javascript" async defer></script>

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
            <form method="POST" action="{{ route('activity.store') }}" id="activityForm" name="activity"
                autocomplete="off">
                @csrf

                <div class="row">
                    <label for="location_1" class="f-24 col-md-12 text-md-left">
                        {{ __('Where') }}
                    </label>
                    <div class="form-group w-100">
                        <div class="col-md-6 mb-1" id="tourStep2">
                            <input id="address_1" type="search"
                                class="blue-input input input1 rounded-0 @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" required autocomplete="off"
                                placeholder="Location">
                            @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="invalid-feedback" id="fromAlert" role="alert">
                                <strong class="text-danger regular">
                                    Selected location not available on Google Map</strong>
                            </span>
                            <div class="f-24 border collapse additional-info-collapse" id="collapseFromInfo">
                                <div class="p-2 m-0">
                                    <div class="accordion_body">
                                        @if ($favorites->count())
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="m-0 p-0 f-14">Favourite Locations</p>
                                            <span>
                                                <i class="closeFromInfo float-right fa fa-times text-danger f-12"></i>
                                            </span>
                                        </div>
                                        @foreach ($favorites as $location)
                                        <input class="existingLoc" type="radio"
                                            id="use_address_for_from-{{ $location->id }}" value="{{ $location->id }}"
                                            aria-label="..." name="from" data-id="{{ $location->id }}"
                                            data-address="{{ $location->address }}"
                                            data-location="{{ $location->location }}"
                                            data-latitude="{{ $location->latitude }}"
                                            data-longitude="{{ $location->longitude }}"
                                            data-image="{{ $location->image }}">
                                        <label class="light f-16" for="use_address_for_from-{{ $location->id }}">
                                            {{ $location->location }}
                                        </label>
                                        @endforeach
                                        @else
                                        @endif
                                        <div class="text-center">
                                            <label for="location_image" class="text-center">
                                                <span>
                                                    @include('activity.partials.cam')<br />
                                                    Add Location Image
                                                </span>
                                            </label>
                                            <input type="hidden" name="image" id="location_image_value" value="">
                                            <input type="File" name="" class="d-none avatar-input" id="location_image"
                                                value="" accept="image/*" data-type="location_image">
                                            <div id="fromImagePreviewDiv" class="d-none tx_effect">
                                                <div class="img_preview text-center mx-auto">
                                                    <img src="http://placehold.it/100" alt="Location Image Preview"
                                                        class="loc_img_preview" id="fromImagePreview">
                                                </div>
                                                <div class="text-center text-danger f-12 d-none" id="removeFromImage">
                                                    <i class="fa fa-times"></i>
                                                    <span class="">Delete Image</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="f-14 text-left d-none" id="clearFrom">clear</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row mb-4 form-group">
                        <label for="when" class="f-24 col-md-12 text-md-left">
                            {{ __('When') }}
                        </label>
                        <div class="w-100">
                            <div class="col-md-12">
                                <div class="input-group date input-daterange">
                                    <input type="text" class="input blue-input input1 rounded-0" name="start_date"
                                        placeholder="Start Date/Time" id="startDate"
                                        value="{{ date('d-m-Y H:i', strtotime('+1 hour')) }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 activity_tagging">
                        @include('activity.partials.tags')
                    </div>
                </div>
                
                <input type="hidden" class="" name="latitude" id="latitude_1" value="{{ old('latitude') }}">
                <input type="hidden" class="" name="longitude" id="longitude_1" value="{{ old('longitude') }}">
                <input type="hidden" class="" name="street" id="street"/>
                <input type="hidden" class="" name="city" id="locality"/>
                <input type="hidden" class="" name="state" id="administrative_area_level_1"/>
                <input type="hidden" class="" name="country" id="country"/>

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
@include('components.tour.activityTour')

@endsection
