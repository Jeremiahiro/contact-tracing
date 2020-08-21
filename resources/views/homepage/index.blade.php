@extends('layouts.app')

@section('title')
Homepage
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<script type="text/javascript">
    window.location = "{{ route('map.view') }}";
</script>
@endsection

@section('content')

<section class="">
    <div id="splashCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators pb-5">
            <li data-target="#splashCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#splashCarousel" data-slide-to="1"></li>
            <li data-target="#splashCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item splash splash-1 active">
                @include('homepage.splash.splash-1')
            </div>
            <div class="carousel-item splash splash-3">
                @include('homepage.splash.splash-3')
            </div>
            <div class="carousel-item splash splash-2">
                @include('homepage.splash.splash-2')
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
<script>
    jQuery(document).ready(function ($) {
        $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });

</script>
{{-- your script goes here --}}
@endsection
