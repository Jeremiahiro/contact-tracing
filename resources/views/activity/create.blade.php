@extends('layouts.app')

@section('custom-style')
{{-- <link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet"> --}}
<link href="{{ asset('frontend/css/activity.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endsection


@section('header')

@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')
<section>
    @include('partials.mobile.header.header-white')
    <div class="container">
        <div class="py-5 activity">
            <p class="f-12 bold">Record Activity</p>
            <form>
                <div class="d-flex justify-content-between align-items-center where-to">
                    <img src="{{ asset('/frontend/img/svg/left.svg') }}" alt="" class="mt-3 mr-2 where-to-icon">
                    <div class="form-group row">
                        <label for="fromTo" class="f-24 col-md-4 text-md-right">
                            {{ __('Where') }}
                        </label>
                        <div class="col-md-6 mb-2">
                            <input id="from_location" type="search"
                                class="blue-input input rounded-0 @error('from_location') is-invalid @enderror"
                                name="from_location" value="{{ old('from_location') }}" required
                                autocomplete="from_location" placeholder="">

                            @error('from_location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input id="to_location" type="search"
                                class="blue-input input rounded-0 @error('to_location') is-invalid @enderror"
                                name="to_location" value="{{ old('to_location') }}" required autocomplete="to_location"
                                placeholder="">

                            @error('to_location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="ml-3">
                    <div class="form-group row">
                        <label for="when" class="f-24 col-md-4 text-md-right">
                            {{ __('When') }}
                        </label>
                        <div class="col-md-6 mb-2">
                            <input id="from_location" type="text"
                                class="blue-input input rounded-0 @error('start_date') is-invalid @enderror"
                                name="start_date" value="{{ old('start_date') }}" required autocomplete="datetimes"
                                placeholder="">

                            @error('start_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="" for="wherefrom">Where</label>
                    <input type="text" class="mb-1 blue-input bg-light" id="wherefrom" placeholder="From">
                    <input type="text" class="blue-input bg-light" id="whereto" placeholder="To">
                </div>
                <div class="form-group">
                </div>
                <div class="form-group">
                    <label class="f-24" for="when">When</label>
                    <input type="datetime-local" class="blue_input form-control bg-light" id="time">
                </div>

                <div class="form-group mb-1">
                    <label class="input_label" for="contacts">Who</label>
                    <input type="text" class="blue_input form-control bg-light" id="contactname" placeholder="Name">
                </div>

                <div class="form-group mb-1">
                    <input type="email" class="blue_input form-control bg-light" id="contactemail" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="number" class="blue_input form-control bg-light" id="contactemail" placeholder="Phone">
                </div>
                <div class="d-flex justify-content-between pt-2">
                    <p class="blue-btn rounded routeheader p-1">Peter Drobac</p>
                    <p class="blue-btn rounded routeheader p-1">Peter Drobac</p>
                    <p class="blue-btn rounded routeheader p-1">Peter Drobac</p>
                    <p class="blue-btn rounded routeheader p-1">Peter Drobac</p>
                    <p class="blue-btn rounded routeheader p-1">Peter Drobac</p>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn"><img src="{{  asset('/frontend/img/svg/addcontact.svg') }}"
                            alt="add contact"></button>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn blue-btn">ADD</button>
                </div>

            </form>
        </div>
    </div>
    @include('partials.mobile.footer.footer')
</section>

@endsection
@section('script')
<script>
    jQuery(document).ready(function ($) {
        $(function () {
            $('input[name="start_date"]').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'DD-MM-YYYY hh:mm A'
                }
            });
        });
    });
</script>
@endsection
