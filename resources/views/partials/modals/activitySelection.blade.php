<div class="modal fade" id="tagModal-{{ $activity->id }}" role="dialog" aria-labelledby="activitySelection"
    aria-hidden="true">
    <div class="modal-dialog route_purple mt-5 mx-0 px-3 py-4" style="pointer-events:auto;" role="document">
        <div class="">
            <div class="d-flex justify-content-between mb-3">
                <h6 class="m-0 bold f-10">Route & Interactions</h6>
                <button type="button" style="opacity:1;" class="btn close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src="{{ asset('/frontend/img/svg/Icon-close-circle.svg')}}"
                            alt="map-pin"></span>
                </button>
            </div>
            <div class="d-flex justify-content-between bold mb-3">
                <div class="d-flex">
                    <img src="{{ asset('/frontend/img/svg/map-pin-markedwhite.svg')}}" alt="map-pin">
                    <div class="ml-2">
                        <h3 class="m-0 p-0 f-16">{{ $activity->from_location }}</h3>
                        <p class="m-0 p-0 f-10 regular">{{ $activity->from_address }}</p>
                    </div>
                </div>
                <p class="f-10">{{ $activity['start_date']->format('g:i A') }}</p>
            </div>

            <div class="d-flex justify-content-between bold mb-3">
                <div class="d-flex">
                    <img src="{{ asset('/frontend/img/svg/map-pin-markedwhite.svg')}}" alt="map-pin">
                    <div class="ml-2">
                        <h3 class="m-0 p-0 f-16">{{ $activity->to_location }}</h3>
                        <p class="m-0 p-0 f-10 regular">{{ $activity->to_address }}</p>
                    </div>
                </div>
                <p class="f-10">{{ $activity['end_date']->format('g:i A') }}</p>
            </div>

            <div class="">
                <div class="w-100 py-2">
                    <div class="map map-lg rounded" id="map-{{ $activity->id }}" fLat="{{ $activity->from_latitude }}"
                        fLng="{{ $activity->from_longitude }}" tLat="{{ $activity->to_latitude}}"
                        tLng="{{ $activity->to_longitude}}">
                    </div>
                </div>
                <p class="m-0 px-2 bold text-left f-10">{{ $activity['start_date']->format('d.m.y') }}</p>
            </div>
            <div class="py-2">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach ($activity->tags->chunk(6) as $tags)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="height: 110px;">
                            @foreach ($tags->chunk(3) as $persons)
                            <div class="row p-1">
                                @foreach ($persons as $person)
                                <div class="col col-4">
                                    <div class="d-flex align-items-center">
                                        @if ($person->person_id == null )
                                        <img src="{{ $person->avatar }}" class="avatar avatar-sm" alt="Activity Tag">
                                        <div class="ml-2">
                                            <p class="f-12 mb-0 bold text-capitalize">{{ $person->name }}</p>
                                        </div>
                                        @else
                                        <a href="{{ route('dashboard.show', $person->tagged->id) }}"
                                            class="f-9 bold text-primary">
                                            <img src="{{ $person->tagged->avatar }}" class="avatar avatar-sm"
                                                alt="Activity Tag">
                                        </a>
                                        <div class="ml-2">
                                            <a href="{{ route('dashboard.show', $person->tagged->id) }}"
                                                class="f-9 bold text-primary">
                                                <p class="f-12 mb-2 bold text-capitalize text-white">
                                                    {{ $person->tagged->username }}</p>
                                                <p class="f-12 mb-0 regular text-capitalize">Active</p>
                                            </a>
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

                    <ol class="carousel-indicators" style="top: 100%">
                        @foreach ($activity->tags->chunk(6) as $tags)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}"
                            class="{{ $loop->first ? 'active' : '' }}">
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
