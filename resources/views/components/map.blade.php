@extends('layouts.app')

@section('title')
Map View
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<section>
    <div class="d-flex flex-column min-vh-100">
        <div class="pt-4 px-5 route_blue">
            <div class="d-flex justify-content-around align-items-center">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('about') }}" class="text-white pl-4">About</a>
                    <a href="{{ route('privacy') }}" class="text-white px-4">Privacy Policy</a>
                    <a href="{{ route('tos') }}" class="text-white">Terms of Use</a>
                </div>

                <div class="d-none d-md-block">
                    <h6 class="f-14">For Best experience on the platform, kindly use a mobile device</h6>
                </div>

                <div class="text-center d-none d-md-block">
                    <div>
                        <i class="fa fa-user fa-2x mr-1"></i>
                        @if($count > 999 && $count <= 999999)
                        <span class="counter"data-count="{{ $count/1000 . ' K' }}">0</span>
                            @elseif($count> 999999)
                            <span class="counter" data-count="{{ $count/1000000 . ' M' }}">0</span>
                            @else
                            <span class="counter" data-count="{{ $count }}">0</span>
                            @endif
                            </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-grow-1">
            <div id="iro_map_div">
                <div id="iro_map"></div>
            </div>
        </div>
        <div>
            <div class="mb-2"></div>
            @include('partials.web.footer')
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="py-3 mt-2 mb-4 route_blue">
    <div class="mx-3 mb-2 text-white d-flex align-items-end justify-content-end">
        <i class="fa fa-user fa-2x mr-1"></i>
        <span class="f-16 count">
            @if($count > 999 && $count <= 999999) {{ $count/1000 . ' K' }} @else @if($count> 999999)
                {{ $count/1000000 . ' M' }}
                @else
                {{ $count }}
                @endif
                @endif
        </span>
    </div>
    <div id="iro_map_div">
        <div id="iro_map"></div>
    </div>
</section>

@endsection
@section('script')
<script>
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

    var locations = @JSON($data);

    function initMap() {

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var geolocpoint = new google.maps.LatLng(latitude, longitude);

                var map = new google.maps.Map(document.getElementById('iro_map'), {
                    zoom: 8,
                    center: geolocpoint,
                    styles: style,
                    mapTypeControl: false,
                    disableDefaultUI: true,
                });

                var infowindow = new google.maps.InfoWindow();

                var marker, i, contentString;

                for (i = 0; i < locations.length; i++) {
                    contentString = '<div id="content" class="regular text-primary"><h6>' + locations[i]['home_address'] +
                        '</h6></div>';
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i]['home_latitude'], locations[i][
                            'home_longitude'
                        ]),
                        map: map
                    });

                    google.maps.event.addListener(marker, 'click', (function (marker, i, contentString) {
                        return function () {
                            infowindow.setContent(contentString, 200);
                            infowindow.open(map, marker);
                        }
                    })(marker, i, contentString));
                }
            });
        }

    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap" async defer>
</script>
@endsection
@section('footer')
@include('partials.mobile.footer.footer')
@endsection
