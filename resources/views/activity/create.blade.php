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

{{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}" type="text/javascript">
</script> --}}

{{-- <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&libraries=places&callback=initialize"
type="text/javascript" async defer></script> --}}

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
                            <input id="address" type="search"
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

                                        <div class="d-none" id="logs_div">
                                            <p class="m-0 p-0 f-14">Favourite Locations</p>

                                            <div class="" id="logs">

                                            </div>
                                        </div>

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
                                            <div id="location_image_preview_div" class="d-none tx_effect">
                                                <div class="img_preview text-center mx-auto">
                                                    <img src="http://placehold.it/100" alt="Location Image Preview"
                                                        class="loc_img_preview" id="location_image_preview">
                                                </div>
                                                <div class="text-center text-danger f-12 d-none" id="remove_image">
                                                    <i class="fa fa-times"></i>
                                                    <span class="">Delete Image</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <div id="clearFrom" class="d-none">
                                                    <i class="fa fa-ban text-gray f-16"></i>
                                                </div>
                                            </div>
                                            <div id="closeFromInfo">
                                                <i class="fa fa-times-circle text-gray f-16"></i>
                                            </div>
                                        </div>
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

                <input type="hidden" class="" name="latitude" id="latitude" value="{{ old('latitude') }}">
                <input type="hidden" class="" name="longitude" id="longitude" value="{{ old('longitude') }}">
                <input type="hidden" class="" name="street" id="street" />
                <input type="hidden" class="" name="city" id="locality" />
                <input type="hidden" class="" name="state" id="administrative_area_level_1" />
                <input type="hidden" class="" name="country" id="country" />

                <div class="">
                    <div class="form-group pull-right">
                        <button type="submit" class="mb-5 btn btn-lg blue-btn text-white w-100">
                            <span class="spinner-border spinner-border-sm d-none" id="save_activity_spinner" role="status" aria-hidden="true"></span>
                            <span id="save_activity_submit">Save</span>
                        </button>
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
