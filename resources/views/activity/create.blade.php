@extends('layouts.app')

@section('title')
Add Activity
@endsection
@section('custom-style')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<link href="{{ asset('frontend/css/activity.css') }}" rel="stylesheet">
<script src="{{ asset('frontend/jquery/activity.js')}}"></script>
<script src="{{ asset('frontend/jquery/tabToggle.js')}}"></script>

<link href="{{ asset('frontend/css/simpleform.css') }}" rel="stylesheet" type="text/css">


{{-- multiple input --}}
<link href="{{ asset('frontend/css/jq.multiinput.min.css') }}" rel="stylesheet">
<script src="{{ asset('frontend/jquery/jq.multiinput.min.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/amsify.suggestags.css') }}">
<script type="text/javascript" src="{{ asset('frontend/jquery/jquery.amsify.suggestags.js')}}"></script>

{{-- tagging --}}
{{-- <link href="{{ asset('frontend/bootstrap/css/bootstrap-tagsinput.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"
    integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg=="
    crossorigin="anonymous"></script> --}}

@endsection

@section('header')

@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')
@include('activity.partials.googlePlace')

<div id="alert">
    @if ($errors->any())
    <div class="alert alert-danger text-danger" role="alert">
        <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="text-danger">&times;</span>
        </button>
        <strong class="text-danger">Error! Select a valid location(s)</strong>
    </div>
    @endif
</div>

<section>
    <div class="container">
        <div class="py-5 activity">
            <p class="f-12 bold">Record Activity</p>
            <form method="POST" action="{{ route('activity.store') }}" id="activitForm" name="activity"
                autocomplete="off">
                @csrf
                <div class="d-flex justify-content-between align-items-center where-to">
                    <img src="{{ asset('/frontend/img/svg/left.svg') }}" alt="" class="mt-3 mr-2 where-to-icon">
                    <div class="form-group row">
                        <label for="from_location" class="f-24 col-md-4 text-md-right">
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

                <div class="ml-3">
                    <div class="row mb-2 form-group">
                        <label for="when" class="f-24 col-md-4 text-md-right">
                            {{ __('When') }}
                        </label>
                        <div class="flex-row d-flex justify-content-center">
                            <div class="col-md-6">
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
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <label for="who" class="m-0 f-24 text-md-right">
                                    {{ __('Who') }}
                                </label>
                            </div>
                            <div class="align-items-end mb-0 mt-3 f-12">
                                <span class="bold text-primary" id="tab1Label">Existing</span>
                                <span class="">|</span>
                                <span class="light text-primary" id="tab2Label">New</span>
                            </div>
                        </div>

                        <div id="tab1">
                            <div class="form-group">
                                <input type="search" class="user-data blue-input input" name="user" id="user" value=""
                                    autocomplete="off" placeholder="People you met">
                            </div>
                            <div id="user_list" class="search-result"></div>

                            <div class="form-group">
                                <input type="text" class="" name="tags" id="tags" value="" placeholder="" />
                            </div>
                        </div>

                        <div class="" id="tab2">
                            <div id="testform2">
                                @include('activity.partials.form')
                            </div>
                            {{-- <fieldset class="">
                                <textarea class="" id="activity_tags">
                                    [{"name":"","email":"","phone":""}]
                                </textarea>
                            </fieldset> --}}
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4 text-right">
                    <button type="submit" class="btn f-14 rounded blue-btn px-3 text-white">ADD</button>
                </div>
            </form>
        </div>
    </div>
    @include('partials.mobile.footer.footer')
</section>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('frontend/jquery/simpleform.min.js')}}"></script>

<script type="text/javascript">
    jQuery(document).ready(function ($) {

        $('#user').on('keyup', function () {
            var query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: "{{ route('users.search') }}",
                    type: "GET",
                    data: {
                        'user': query
                    },
                    success: function (data) {
                        $('#user_list').html(data);
                    }
                })
            }
        });

        var data = [];
        var tag = $('#tags');

        tag.hide();

        $(document).on('click', '.data', function () {
            var username = $(this).find("p").text();
            data.push(username);
            tag.show();
            tag.val(data);
            $('#user_list').html("");
            $('#user').val("");

            $('input[name="tags"]').amsifySuggestags({
                suggestions: data,
                whiteList: true,
                tagLimit: 15
            });
        });

    });

</script>
@endsection
