<div class="card">
    <div class="card-header" id="heading-{{ $location->id }}">
        <h5 class="mb-0">
            <button class="btn text-primary blue-text" data-toggle="collapse"
                data-target="#collapse-{{ $location->id }}" aria-expanded="true"
                aria-controls="collapse-{{ $location->address }}">
                {{ $location->location }}
            </button>
        </h5>
    </div>
    <div id="collapse-{{ $location->id }}" class="collapse" aria-labelledby="heading-{{ $location->address }}"
        data-parent="#accordion">
        <div class="card-body">
            <div class="row">
                <div class="col-9 d-flex">
                    <span>
                        <img src="{{ asset('/frontend/img/svg/map-pin-marked.svg') }}" alt="map-pin">
                    </span>
                    <p class="f-12 bold px-2">{{ $location->address }}</p>
                </div>
                <div class="col-3 text-right">
                    @if ($favorites->count() <= 5) @if (auth()->user()->hasFavorited($location))
                        <span class="toggleFavourite" data-id="{{ $location->id }}">
                            <img src="{{ asset('/frontend/img/svg/heart_red.svg') }}" alt="" id="fav_icon">
                        </span>
                        @else
                        <span class="toggleFavourite" data-id="{{ $location->id }}">
                            <img src="{{ asset('/frontend/img/svg/heart.svg') }}" alt="" id="fav_icon">
                        </span>
                        @endif
                        @else
                        <span class="toggleFavourite" data-id="{{ $location->id }}">
                            <img src="{{ asset('/frontend/img/svg/heart.svg') }}" alt="" id="fav_icon">
                        </span>
                        @endif
                </div>
            </div>
            @if($location->image == null)
            <img class="" style="height:222px; width:100%; object-fit: cover;"
                src="https://maps.googleapis.com/maps/api/staticmap?size=200x60&zoom=16&center={{ $location->location }}&format=png&maptype=roadmap&style=element:geometry%7Ccolor:0x242f3e&style=element:labels.text.fill%7Ccolor:0x746855&style=element:labels.text.stroke%7Ccolor:0x242f3e&style=feature:administrative.locality%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi.park%7Celement:geometry%7Ccolor:0x263c3f&style=feature:poi.park%7Celement:labels.text.fill%7Ccolor:0x6b9a76&style=feature:road%7Celement:geometry%7Ccolor:0x38414e&style=feature:road%7Celement:geometry.stroke%7Ccolor:0x212a37&style=feature:road%7Celement:labels.text.fill%7Ccolor:0x9ca5b3&style=feature:road.highway%7Celement:geometry%7Ccolor:0x746855&style=feature:road.highway%7Celement:geometry.stroke%7Ccolor:0x1f2835&style=feature:road.highway%7Celement:labels.text.fill%7Ccolor:0xf3d19c&style=feature:transit%7Celement:geometry%7Ccolor:0x2f3948&style=feature:transit.station%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:water%7Celement:geometry%7Ccolor:0x17263c&style=feature:water%7Celement:labels.text.fill%7Ccolor:0x515c6d&style=feature:water%7Celement:labels.text.stroke%7Ccolor:0x17263c&key={{ env('GOOGLE_API_KEY') }}"
                alt="">
            @else

            <div id="locationsCarousel" class="carousel slide py-1" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="" style="height: 222px; width:100%; object-fit: cover;"
                        src="https://maps.googleapis.com/maps/api/staticmap?size=200x60&zoom=16&center={{ $location->location }}&format=png&maptype=roadmap&style=element:geometry%7Ccolor:0x242f3e&style=element:labels.text.fill%7Ccolor:0x746855&style=element:labels.text.stroke%7Ccolor:0x242f3e&style=feature:administrative.locality%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi.park%7Celement:geometry%7Ccolor:0x263c3f&style=feature:poi.park%7Celement:labels.text.fill%7Ccolor:0x6b9a76&style=feature:road%7Celement:geometry%7Ccolor:0x38414e&style=feature:road%7Celement:geometry.stroke%7Ccolor:0x212a37&style=feature:road%7Celement:labels.text.fill%7Ccolor:0x9ca5b3&style=feature:road.highway%7Celement:geometry%7Ccolor:0x746855&style=feature:road.highway%7Celement:geometry.stroke%7Ccolor:0x1f2835&style=feature:road.highway%7Celement:labels.text.fill%7Ccolor:0xf3d19c&style=feature:transit%7Celement:geometry%7Ccolor:0x2f3948&style=feature:transit.station%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:water%7Celement:geometry%7Ccolor:0x17263c&style=feature:water%7Celement:labels.text.fill%7Ccolor:0x515c6d&style=feature:water%7Celement:labels.text.stroke%7Ccolor:0x17263c&key={{ env('GOOGLE_API_KEY') }}"
                        alt=""> 
                    </div>
                    <div class="carousel-item">
                        <img style="object-fit: cover; height:222px; width:333px;" src="{{ $location->image }}" alt=""
                            class="">
                    </div>
                </div>
                <ol class="carousel-indicators m-0 indicators">
                    <li data-target="#locationsCarousel" data-slide-to="0" class="blue-indicators active"></li>
                    <li data-target="#locationsCarousel" data-slide-to="1" class="blue-indicators"></li>
                </ol>
            </div>
            @endif
        </div>
    </div>
</div>
