<div class="modal hide fade mt-5 pt-4" id="tagModal-{{ $activity->id }}" role="dialog"
    aria-labelledby="activitySelection" aria-hidden="true">
    <div class="modal-dialog route_purple mt-5 mx-0 px-3 py-4" style="pointer-events:auto;" role="document">
        <div class="">
            <div class="d-flex mb-2">
                <div>
                    <h6 class="m-0 bold f-10 mb-2">Route & Interactions</h6>
                    <div class="d-flex">
                        <div>
                            <img src="{{ asset('/frontend/img/svg/map-pin-markedwhite.svg')}}" alt="map-pin">
                        </div>
                        <div class="pl-2 f-16">
                            {{-- <h3 class="m-0 bold">PARK & SHOP</h3> --}}
                            <div class="m-0 bold">{{ $activity->from_location }}</div>
                        </div>
                    </div>
                </div>
                <div class="ml-auto">
                    <button type="button" style="opacity:1;" class="btn close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><img src="{{ asset('/frontend/img/svg/Icon-close-circle.svg')}}"
                                alt="map-pin"></span>
                    </button>
                </div>
            </div>
            <div class="">
                <div class="w-100 py-2">
                    <div class="map map-lg rounded" id="map-{{ $activity->id }}" lat="{{ $activity->from_latitude }}"
                        lng="{{ $activity->from_longitude }}" toLat="{{ $activity->to_latituede}}"
                        toLng="{{ $activity->to_longitude}}">
                    </div>
                </div>
                <div class="py-2 f-9 bold d-flex justify-content-between align-items-center">
                    <div>
                        <p class="m-0">{{ $activity['start_date']->format('d.m.y') }}</p>
                    </div>
                    <div>
                        <p class="m-0">{{ $activity['start_date']->format('H:i A') }} -
                            {{ $activity['end_date']->format('H:i A') }}</p>
                    </div>
                </div>
            </div>
            <div class="py-2">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach ($activity->tags->chunk(6) as $tags)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            @foreach ($tags->chunk(3) as $persons)
                            <div class="row p-1">
                                @foreach ($persons as $person)
                                <div class="col col-4">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-icon">
                                            @if ($person->person_id == null )
                                            <img src="{{ $person->avatar }}" class="activity_avatar avatar-lg"
                                                alt="Activity Tag">
                                            @else
                                            <img src="{{ $person->tagged->avatar }}" class="activity_avatar avatar-lg"
                                                alt="Activity Tag">
                                            @endif
                                        </div>
                                        <div class="ml-2">
                                            <p class="f-12 mb-0 bold text-capitalize">{{ $person->name }}</p>
                                            @if ($person->person_id != null )
                                            <a href="{{ route('dashboard') }}" class="f-9 bold text-primary">
                                                Active
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>

                    <ol class="carousel-indicators" style="bottom: -35px">
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
