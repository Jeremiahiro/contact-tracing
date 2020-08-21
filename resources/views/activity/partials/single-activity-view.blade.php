<div>
    <h6 class="m-0 bold f-12 mb-3">Route & Interactions</h6>

    <div>
        <div class="d-flex justify-content-between bold mb-3">
            <div class="d-flex">
                <img src="{{ asset('/frontend/img/svg/map-pin-markedwhite.svg') }}" alt="map-pin">
                <div class="ml-1">
                    <h3 class="m-0 p-0 f-16">{{ $activity->from_location }}</h3>
                    <p class="m-0 p-0 f-10 regular">{{ $activity->from_address }}</p>
                </div>
            </div>
            <p class="f-9">
                {{ $activity['start_date']->format('g:i A') }}
            </p>
        </div>

        <div class="d-flex justify-content-between bold mb-3">
            <div class="d-flex">
                <img src="{{ asset('/frontend/img/svg/map-pin-markedwhite.svg') }}" alt="map-pin">
                <div class="ml-1">
                    <h3 class="m-0 p-0 f-16">{{ $activity->to_location }}</h3>
                    <p class="m-0 p-0 f-10 regular">{{ $activity->to_address }}</p>
                </div>
            </div>
            <p class="f-9">
                {{ $activity['end_date']->format('g:i A') }}
            </p>
        </div>

        <div class="">
            <div class="w-100 py-2">
                <div class="map map-lg rounded" id="map-{{ $activity->id }}" fLat="{{ $activity->from_latitude }}"
                    fLng="{{ $activity->from_longitude }}" tLat="{{ $activity->to_latitude }}"
                    tLng="{{ $activity->to_longitude }}">
                </div>
            </div>
            <p class="m-0 px-2 bold text-left f-10">
                {{ $activity['start_date']->format('d.m.y') }}</p>
        </div>

        <div class="py-2">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @foreach($activity->tags->chunk(6) as $tags)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="height: 110px;">
                        @foreach($tags->chunk(3) as $persons)
                        <div class="row p-1">
                            @foreach($persons as $person)
                            <div class="col col-4 m-0">
                                <div class="d-flex align-items-center">
                                    @if($person->person_id != null )
                                    <div>
                                        <a href="{{ route('dashboard.show', $person->tagged->uuid) }}"
                                            class="f-9 bold text-primary">
                                            <img src="{{ $person->tagged->avatar }}"
                                                class="avatar avatar-sm border border-primary" alt="Activity Tag">
                                        </a>
                                    </div>
                                    <div class="ml-1">
                                        <a href="{{ route('dashboard.show', $person->tagged->uuid) }}"
                                            class="f-9 bold text-primary">
                                            <p class="f-12 mb-0 bold text-capitalize text-white">
                                                {{ \Illuminate\Support\Str::limit($person->tagged->username, 8) }}
                                            </p>
                                        </a>
                                    </div>
                                    @else
                                    <div>
                                        <img src="{{ $person->avatar }}" class="avatar avatar-sm" alt="Activity Tag">
                                    </div>
                                    <div class="ml-1">
                                        <p class="f-12 mb-0 bold text-capitalize">
                                            {{ \Illuminate\Support\Str::limit($person->name, 8) }}
                                        </p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>

                <ol class="carousel-indicators" style="top: 90%">
                    @foreach($activity->tags->chunk(6) as $tags)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                        class="{{ $loop->first ? 'active' : '' }}">
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
