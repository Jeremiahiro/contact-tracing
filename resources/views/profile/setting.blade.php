@extends('layouts.app')

@section('title')
Settings Page
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')
<section class="splash profile_cover" id="bgPreview" style="background-image: url({{ $user->header }})">
    @include('partials.mobile.header.header')
    <div class="container text-center text-white py-4">
        <div class="avatar-upload">
            <div class="avatar-edit">
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

<section>
    <div class="container">
        <div>
            <h1 class="f-24 bold pt-4">Settings</h1>
        </div>
        <div class="d-flex justify-content-between">
            <span>
                <p class="f-18 bold">Preferences</p>
            </span>
            <span>
                <img src="{{ asset('/frontend/img/svg/side-arrow.svg')}}" alt="">
            </span>
        </div>
        <div class="d-flex justify-content-between">
            <span>
                <p class="f-14 bold m-0 pt-3">Deactivate Account</p>
            </span>
            <span class="ml-auto">
                <div style="display:none;" class=" spinner-border" role="status">
                </div>
            </span>
            <span>
                <label class="switch">
                    <input data-id="1" class="toggle-class box-status" type="checkbox" checked />
                    <span class="toggle-slider"></span>
                </label>
            </span>
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

        $('.toggle-class').change(function () {

            var status = $(this).prop('checked') === true ? 1 : 0;
            var userID = $(this).data('id');

            $.ajax({
                type: "GET",
                beforeSend: function () {
                    $('.spinner-border').css("display", "block");
                },
                dataType: "json",
                url: '/changeStatus',
                data: {
                    'status': status,
                    'userID': userID
                },

                success: function (data) {
                    console.log(data.success);
                    $('.spinner-border').css("display", "none");
                    if (data.success) {
                        alert(data.success);
                    } else {
                        alert(data.error);
                    }
                }


            });
        });
    });

</script>

@include('activity.partials.mapScript')

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#bgPreview').css('background-image', 'url(' + e.target.result + ')');
                $('#bgPreview').hide();
                $('#bgPreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#bgUpload").change(function () {
        readURL(this);
    });

</script>


<script>
    $(document).ready(function () {

        var readURL = function (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imagePreview').attr('src', e.target.result);
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").on('change', function () {
            readURL(this);
        });

        $("avatar-edit").on('click', function () {
            $("#imageUpload").click();
        });
    });

</script>

@endsection
