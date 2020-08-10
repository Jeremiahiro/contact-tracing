@extends('layouts.app')

@section('title')
Add Activity
@endsection
@section('custom-style')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<link href="{{ asset('frontend/css/activity.css') }}" rel="stylesheet">
<script src="{{ asset('frontend/jquery/activityValidation.js') }}"></script>
<script src="{{ asset('frontend/jquery/activityDatePicker.js') }}"></script>
<script src="{{ asset('frontend/jquery/tabToggle.js') }}"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/amsify.suggestags.css') }}">
<script type="text/javascript" src="{{ asset('frontend/jquery/jquery.amsify.suggestags.js') }}">
</script>

@endsection

@section('header')

@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')
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
    <div class="container text-primary">
        <div class="py-5 activity">
            <p class="f-12 bold">Record Activity</p>
            <form method="POST" action="{{ route('activity.store') }}" id="activitForm"
                name="activity" autocomplete="off">
                @csrf
                <div id="startTour" class="d-flex justify-content-between align-items-center where-to">
                    <img src="{{ asset('/frontend/img/svg/left.svg') }}" alt=""
                        class="mt-3 mr-2 where-to-icon">
                    <div class="form-group row">
                        <label for="from_location" class="f-24 col-md-4 text-md-right">
                            {{ __('Where') }}
                        </label>
                        <div class="col-md-6 mb-1">
                            <input id="from_address" type="search"
                                class="blue-input input rounded-0 @error('from_address') is-invalid @enderror"
                                name="from_address" value="{{ old('from_address') }}" required
                                autocomplete="off" placeholder="From">
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
                                name="to_address" value="{{ old('to_address') }}" required
                                autocomplete="off" placeholder="To">
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

                <div class="ml-3">
                    <div class="row mb-4 form-group">
                        <label for="when" class="f-24 col-md-4 text-md-right">
                            {{ __('When') }}
                        </label>
                        <div class="flex-row d-flex justify-content-center">
                            <div class="col-md-6">
                                <div class="input-group date input-daterange">
                                    <input type="text" class="f-14 regular input blue-input input1 rounded-0"
                                        name="start_date" placeholder="Start Date/Time" id="startDate"
                                        value="{{ date('d-m-Y H:i', strtotime('+1 hour')) }}"
                                        readonly>
                                    <input type="text" class="f-14 regular input blue-input ml-1 input2 rounded-0"
                                        name="end_date" placeholder="End Date/Time" id="endDate"
                                        value="{{ date('d-m-Y H:i', strtotime('+2 hour +20 minutes')) }}"
                                        readonly>
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

@if(Cookie::get('is_first_time_user') )
    <script>
        const tour = new Shepherd.Tour({
            defaultStepOptions: {
                cancelIcon: {
                    enabled: true
                },
                classes: 'class-1 class-2',
                scrollTo: {
                    behavior: 'smooth',
                    block: 'center'
                }
            }
        });

        tour.addStep({
            text: `WELCOME !!
     You can take this tour to get started , click next to continue the tour. 
     You could end tour by clicking on the close icon.`,
            attachTo: {
                element: '#startTour',
                on: 'bottom'
            },
            buttons: [{
                action() {
                    return this.next();
                },
                text: 'Next'
            }],
            id: 'creating'
        });

        tour.addStep({
            text: `Click here to go to your Dashboard.`,
            attachTo: {
                element: '#tourStep1',
                on: 'bottom'
            },
            buttons: [{
                    action() {
                        return this.back();
                    },
                    classes: 'shepherd-button-secondary',
                    text: 'Back'
                },
                {
                    action() {
                        return this.next();
                    },
                    text: 'Next'
                }
            ],
            id: 'creating'
        });

        tour.addStep({
            text: `Click here to add an already existing user on the platform as a connection.`,
            attachTo: {
                element: '.tourStep2',
                on: 'bottom'
            },
            buttons: [{
                    action() {
                        return this.back();
                    },
                    classes: 'shepherd-button-secondary',
                    text: 'Back'
                },
                {
                    action() {
                        return this.next();
                    },
                    text: 'Next'
                }
            ],
            id: 'creating'
        });


        tour.addStep({
            text: `Click here to add a new user as a connection.`,
            attachTo: {
                element: '.tourStep3',
                on: 'bottom'
            },
            buttons: [{
                    action() {
                        return this.back();
                    },
                    classes: 'shepherd-button-secondary',
                    text: 'Back'
                },
                {
                    action() {
                        return this.next();
                    },
                    text: 'DONE'
                }
            ],
            id: 'creating'
        });

        tour.start();

    </script>
@endif

@endsection
