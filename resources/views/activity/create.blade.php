@extends('layouts.app')

@section('custom-style')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="{{ asset('frontend/css/activity.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/jq.multiinput.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="{{ asset('frontend/jquery/jq.multiinput.min.js')}}"></script>
<script src="{{ asset('frontend/jquery/activity.js')}}"></script>
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
            <form method="POST" action="{{ route('activity.store') }}" name="activity">
                @csrf
                <div class="d-flex justify-content-between align-items-center where-to">
                    <img src="{{ asset('/frontend/img/svg/left.svg') }}" alt="" class="mt-3 mr-2 where-to-icon">
                    <div class="form-group row">
                        <label for="from_location" class="f-24 col-md-4 text-md-right">
                            {{ __('Where') }}
                        </label>
                        <div class="col-md-6 mb-2">
                            <input id="from_location" type="search"
                                class="blue-input input rounded-0 @error('from_location') is-invalid @enderror"
                                name="from_location" value="{{ old('from_location') }}" required autocomplete="off"
                                placeholder="From">
                            <input type="hidden" name="from_latitude" class="" id="from_latitude"
                                value="{{ old('from_latitude') }}">
                            <input type="hidden" name="from_longitude" class="" id="from_longitude"
                                value="{{ old('from_longitude') }}">
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
                                placeholder="To">
                            <input type="hidden" name="to_latitude" class="" id="to_latitude"
                                value="{{ old('to_latitude') }}">
                            <input type="hidden" name="to_longitude" class="" id="to_longitude"
                                value="{{ old('to_longitude') }}">
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
                            <input id="date_range" type="text" class="blue-input input rounded-0" name="date_range"
                                required autocomplete="datetimes" placeholder="" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="who" class="m-0 f-24 text-md-right">
                            {{ __('Who') }}
                        </label>
                        <fieldset class="todos_labels">

                            <textarea class="" id="activity_tags">
                                {{-- [{"name":"","email":"","phone":""}] --}}
                            </textarea>
                        </fieldset>
                    </div>
                </div>

                <div class="form-group mt-5 text-right">
                    <button type="submit" class="btn f-14rounded blue-btn px-3 text-white">ADD</button>
                </div>
                <script type="text/template">

                </script>
            </form>

        </div>
    </div>
    @include('partials.mobile.footer.footer')
</section>

@endsection
@section('script')

<script>
    function initialize() {
        var options = {
            types: ['(cities)'],
        };
        var fromLoc = document.getElementById('from_location');
        var getFromLoc = new google.maps.places.Autocomplete(fromLoc);
        getFromLoc.addListener('place_changed', function () {
            var place = getFromLoc.getPlace();
            if (!place.geometry) {
                window.alert("'" + place.name + "' not available on Google Map");
                fromLoc.value = "";
                return;
            } else {
                $('#from_latitude').val(place.geometry['location'].lat());
                $('#from_longitude').val(place.geometry['location'].lng());
            }
        });

        var toLoc = document.getElementById('to_location');
        var getToLoc = new google.maps.places.Autocomplete(toLoc);
        getToLoc.addListener('place_changed', function () {
            var place = getToLoc.getPlace();
            if (!place.geometry) {
                window.alert("'" + place.name + "' not available on Google Map");
                toLoc.value = "";
                return;
            } else {
                $('#to_latitude').val(place.geometry['location'].lat());
                $('#to_longitude').val(place.geometry['location'].lng());
            }
        });

  }

</script>
@endsection
