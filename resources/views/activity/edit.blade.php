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
            <p class="f-16 bold">Add More People you met</p>
            <form method="POST" action="{{ route('activity.update', $activity->id) }}" id="activityForm" name="updateActivity"
                autocomplete="off">
                @csrf
                @method("PATCH")

                <div>
                    <div class="d-flex justify-content-between bold mb-3">
                        <div class="d-flex">
                            <img src="{{ asset('/frontend/img/svg/map-pin-markedwhite.svg') }}" alt="map-pin">
                            <div class="">
                                <h3 class="m-0 p-0 f-16">{{ $activity->location->street }}</h3>
                                <p class="m-0 p-0 f-12 regular">{{ $activity->location->address }}</p>
                            </div>
                        </div>
                        <p class="f-9">
                            {{ $activity['start_date']->format('g:i A') }}
                        </p>
                    </div>
                </div>

                <div class="my-5">
                    <div class="">
                        <div class="mb-3">
                            @include('activity.partials.tags')
                        </div>
                    </div>

                    <div class="">
                        <div class="form-group pull-right">
                            <button type="submit" class="mb-5 btn btn-lg blue-btn text-white w-100">
                                <span class="spinner-border spinner-border-sm d-none" id="save_activity_spinner" role="status" aria-hidden="true"></span>
                                <span id="save_activity_submit">Save</span>
                            </button>
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
<script>
    jQuery(document).ready(function ($) {

        $(function () {
            // Initialize form validation on the registration form.
            // It has the name attribute "registration"
            $("form[name='updateActivity']").validate({
                // Specify validation rules
                rules: {
                    // The key name on the left side is the name attribute
                    // of an input field. Validation rules are defined
                    // on the right side
                   
                },
                // Specify validation error messages
                messages: {
                    //
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function (form) {
                    $('#save_activity_submit').html('Saving...');
                    $('#save_activity_spinner').removeClass('d-none');
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function (response) {
                            if (response.success != true) {
                                $('#save_activity_submit').html('Save');
                                $('#save_activity_spinner').addClass('d-none');
                                showAlertMessage('danger', response.message);
                            } else {
                                showAlertMessage('success', response.message);
                                $('#save_activity_submit').html('Save');
                                $('#save_activity_spinner').addClass('d-none');
                                location.replace('/activity')
                            }
                        },
                        error: function (xhr) {
                            const jsonResponse = JSON.parse(xhr.responseText);
                            showAlertMessage('danger', jsonResponse['message']);
                            $('#save_activity_submit').html('Save');
                            $('#save_activity_spinner').addClass('d-none');
                        }
                    });
                }
            });
        });

        function removeAlertMessage() {
            setTimeout(function () {
                $(".alert").remove();
            }, 4000);
        }

        function showAlertMessage(type, message) {
            const alertMessage = ' <div id="upload-alert" class="alert alert-' + type +
                ' show" role="alert">\n' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                '<span aria-hidden="true" class="">&times;</span>\n' + '</button>\n' +
                '<strong class="regular">' +
                message +
                '</strong>\n' + '</div>';
            $("#upload-alert").html(alertMessage);
            removeAlertMessage();
        }
    });
</script>
@endsection
