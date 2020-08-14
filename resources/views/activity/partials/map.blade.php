@extends('layouts.app')

@section('title')
Map View
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')

<section class="py-3 my-4 bg-primary">
    <div class="mx-3 mb-2 text-white d-flex align-items-end justify-content-end">
        <i class="fa fa-user fa-2x mr-1"></i>
        <span class="f-18 count">
            @if($count > 999 && $count <= 999999)
                {{ $count/1000 . ' K' }}
            @else
                @if($count > 999999)
                    {{ $count/1000000 . ' M' }}
                @else
                    {{ $count }}
                @endif
            @endif
        </span>
    </div>
    <div id="map_wrapper_div">
        <div id="iro_map"></div>
    </div>

</section>

@endsection
@section('script')
<script>
    var maps = $('#iro_map');

    var markers = [];

    var style = [{
            elementType: "geometry",
            stylers: [{
                color: "#242f3e"
            }]
        },
        {
            elementType: "labels.text.stroke",
            stylers: [{
                color: "#242f3e"
            }]
        },
        {
            elementType: "labels.text.fill",
            stylers: [{
                color: "#746855"
            }]
        },
        {
            featureType: "administrative.locality",
            elementType: "labels.text.fill",
            stylers: [{
                color: "#d59563"
            }]
        },
        {
            featureType: "poi",
            elementType: "labels.text.fill",
            stylers: [{
                color: "#d59563"
            }]
        },
        {
            featureType: "poi.park",
            elementType: "geometry",
            stylers: [{
                color: "#263c3f"
            }]
        },
        {
            featureType: "poi.park",
            elementType: "labels.text.fill",
            stylers: [{
                color: "#6b9a76"
            }]
        },
        {
            featureType: "road",
            elementType: "geometry",
            stylers: [{
                color: "#38414e"
            }]
        },
        {
            featureType: "road",
            elementType: "geometry.stroke",
            stylers: [{
                color: "#212a37"
            }]
        },
        {
            featureType: "road",
            elementType: "labels.text.fill",
            stylers: [{
                color: "#9ca5b3"
            }]
        },
        {
            featureType: "road.highway",
            elementType: "geometry",
            stylers: [{
                color: "#746855"
            }]
        },
        {
            featureType: "road.highway",
            elementType: "geometry.stroke",
            stylers: [{
                color: "#1f2835"
            }]
        },
        {
            featureType: "road.highway",
            elementType: "labels.text.fill",
            stylers: [{
                color: "#f3d19c"
            }]
        },
        {
            featureType: "transit",
            elementType: "geometry",
            stylers: [{
                color: "#2f3948"
            }]
        },
        {
            featureType: "transit.station",
            elementType: "labels.text.fill",
            stylers: [{
                color: "#d59563"
            }]
        },
        {
            featureType: "water",
            elementType: "geometry",
            stylers: [{
                color: "#17263c"
            }]
        },
        {
            featureType: "water",
            elementType: "labels.text.fill",
            stylers: [{
                color: "#515c6d"
            }]
        },
        {
            featureType: "water",
            elementType: "labels.text.stroke",
            stylers: [{
                color: "#17263c"
            }]
        }
    ]

    function initMap() {

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var geolocpoint = new google.maps.LatLng(latitude, longitude);

                var mapOptions = {
                    zoom: 8,
                    center: geolocpoint,
                    mapTypeId: google.maps.MapTypeId.HYBRID
                }
                // Place a marker
                var geolocation = new google.maps.Marker({
                    position: geolocpoint,
                    map: map,
                    title: 'Your geolocation',
                    icon: 'http://labs.google.com/ridefinder/images/mm_20_green.png'
                });
            });
        }

        // navigator.geolocation.getCurrentPosition(function (position) {
        //     var lat = position.coords.latitude;
        //     var lng = position.coords.longitude;
        //     // var geolocpoint = new google.maps.LatLng(latitude, longitude);
        //     // map.setCenter(geolocpoint );
        // });

        // var center = {
        //     lat: -25.344,
        //     lng: 131.036
        // };

        // map = new google.maps.Map(document.getElementById('iro_map'), {
        //     zoom: 6,
        //     center: center,
        //     styles: style,
        //     mapTypeControl: false,
        //     disableDefaultUI: true
        // });

    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap"
    async defer>
</script>
@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
