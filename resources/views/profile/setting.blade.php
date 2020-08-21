@extends('layouts.app')

@section('title')
Settings Page
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";
</script>
@endsection

@section('content')
<section class="splash profile_cover" id="bgPreview" style="background-image: url({{ $user->header }})">
    @include('partials.mobile.header.header')
    <div class="container text-center text-white py-4">
        <div class="avatar-upload">
            <div class="avatar-edit  position-absolute">
                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                <label for="imageUpload"></label>
            </div>
            <div>
                <img id="imagePreview" src="{{ $user->avatar }}" class="avatar avatar-xl border-5"
                    alt="{{ $user->username }}">
            </div>
        </div>
    </div>
    <div class="py-3">
        <div class="avatar-edit bgImage-edit ">
            <input type='file' id="bgUpload" accept=".png, .jpg, .jpeg" />
            <label for="bgUpload"></label>
        </div>
    </div>
</section>

<section class="py-3 mb-5">
    <h4 class="m-2 px-3 bold f-24">Settings</h4>
    <div class="container p-3">
        <div class="mb-3 d-flex justify-content-between align-items-center">
            <p class="f-18 bold">Preferences</p>
            <img src="{{ asset('/frontend/img/svg/side-arrow.svg')}}" alt="">
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <p class="f-14 bold m-0">Others Can See My Activity</p>
            </div>
            <div class="">
                <label class="switch">
                    <input type="checkbox" data-id="{{ $user->uuid }}" name="show_location" id="show_location"
                        class="show_location" {{ $user->show_location == true ? 'checked' : '' }} />
                    <span class="toggle-slider"></span>
                </label>
                <div class="spinner-border text-primary ml-2 spinner-border-sm d-none" id="location-spinner"
                    role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
        <hr>
    </div>
</section>

@endsection

@section('footer')
@include('partials.mobile.footer.footer')
@endsection

@section('script')

<script>
    jQuery(document).ready(function ($) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#show_location').change(function () {
            $('#location-spinner').removeClass('d-none');

            var userID = $(this).data('id');
            var status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                type: 'GET',
                url: `/location/visibility`,
                data: {
                    'status': status,
                    'userID': userID
                },
                success: function (data) {
                    if (data.success) {
                        $('#location-spinner').addClass('d-none');
                        alert(data.success);
                    } else {
                        $('#location-spinner').addClass('d-none');
                        $(this).prop("checked", !this.checked);
                        alert(data.success);
                    }
                }
            });
        });
    });

</script>

@include('activity.partials.mapScript')

@endsection
