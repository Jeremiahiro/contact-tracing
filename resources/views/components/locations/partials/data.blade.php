<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn text-primary blue-text" data-toggle="collapse"
                    data-target="#collapse-{{ $location->id }}" aria-expanded="true" aria-controls="collapseOne">
                    {{ $location->location }}
                </button>
            </h5>
        </div>

        <div id="collapse-{{ $location->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <p class="f-12 bold">{{ $location->address }}</p>
                    </div>

                    <div class="col-3 text-right">
                        <span class="toggleFavourite" data-id="{{ $location->id }}">
                            <input type="checkbox" name="" id="" {{ $location->favorites == true ? 'checked' : ''}} >
                            {{-- <img src="{{ @location->favourites }}" alt=""> --}}
                        </span>
                        @if (auth()->user()->isfavorite($location))
                        here
                            {{-- <a class="toggleFavourite" name="unfavorite" id="toggleFavourite-{{$location->id}}"
                                data-id="{{ $location->id }}">
                                <img src="{{ asset('/frontend/img/svg/heart1.svg') }}" alt="">
                            </a> --}}
                        @else
                        there
                            {{-- <a class="favorite " id="favorite{{$location->id}}"
                            data-id="{{ $location->id }}" >
                                <img src="{{ asset('/frontend/img/svg/heart.svg') }}" alt="">
                            </a> --}}

                        @endif

                    </div>
                </div>
                <hr>

                @if($location->image == null)
                <img class=" w-100"
                    src="https://maps.googleapis.com/maps/api/staticmap?size=200x60&zoom=16&center={{ $location->location }}&format=png&maptype=roadmap&style=element:geometry%7Ccolor:0x242f3e&style=element:labels.text.fill%7Ccolor:0x746855&style=element:labels.text.stroke%7Ccolor:0x242f3e&style=feature:administrative.locality%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi.park%7Celement:geometry%7Ccolor:0x263c3f&style=feature:poi.park%7Celement:labels.text.fill%7Ccolor:0x6b9a76&style=feature:road%7Celement:geometry%7Ccolor:0x38414e&style=feature:road%7Celement:geometry.stroke%7Ccolor:0x212a37&style=feature:road%7Celement:labels.text.fill%7Ccolor:0x9ca5b3&style=feature:road.highway%7Celement:geometry%7Ccolor:0x746855&style=feature:road.highway%7Celement:geometry.stroke%7Ccolor:0x1f2835&style=feature:road.highway%7Celement:labels.text.fill%7Ccolor:0xf3d19c&style=feature:transit%7Celement:geometry%7Ccolor:0x2f3948&style=feature:transit.station%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:water%7Celement:geometry%7Ccolor:0x17263c&style=feature:water%7Celement:labels.text.fill%7Ccolor:0x515c6d&style=feature:water%7Celement:labels.text.stroke%7Ccolor:0x17263c&key={{ env('GOOGLE_API_KEY') }}"
                    alt="">
                @else
                <div class="row">
                    <div class="col-6 p-1">
                        <div class="bg-blue p-1 text-white text-center position-relative"
                            style="height:122px; background-image: url('https://maps.googleapis.com/maps/api/staticmap?size=160x100&zoom=16&center={{ $location->location }}&format=png&maptype=roadmap&style=element:geometry%7Ccolor:0x242f3e&style=element:labels.text.fill%7Ccolor:0x746855&style=element:labels.text.stroke%7Ccolor:0x242f3e&style=feature:administrative.locality%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi.park%7Celement:geometry%7Ccolor:0x263c3f&style=feature:poi.park%7Celement:labels.text.fill%7Ccolor:0x6b9a76&style=feature:road%7Celement:geometry%7Ccolor:0x38414e&style=feature:road%7Celement:geometry.stroke%7Ccolor:0x212a37&style=feature:road%7Celement:labels.text.fill%7Ccolor:0x9ca5b3&style=feature:road.highway%7Celement:geometry%7Ccolor:0x746855&style=feature:road.highway%7Celement:geometry.stroke%7Ccolor:0x1f2835&style=feature:road.highway%7Celement:labels.text.fill%7Ccolor:0xf3d19c&style=feature:transit%7Celement:geometry%7Ccolor:0x2f3948&style=feature:transit.station%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:water%7Celement:geometry%7Ccolor:0x17263c&style=feature:water%7Celement:labels.text.fill%7Ccolor:0x515c6d&style=feature:water%7Celement:labels.text.stroke%7Ccolor:0x17263c&key={{ env('GOOGLE_API_KEY') }}')">
                        </div>
                    </div>
                    <div class="col-6 p-1">
                        <img style=" display: block; width: 100%; height:122px;" src="{{ $location->image }}" alt=""
                            class="">
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
