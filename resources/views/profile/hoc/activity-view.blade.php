@if($user->activities->count() > 0)
<div class="activityView">
    <div class="activityTab">
        <ul class="mb-0 mt-3 f-12 nav">
            <li class="active">
                <a data-toggle="tab" href="#tab1" class="text-primary active">Places</a>
            </li>
            <span class="mx-1">|</span>
            <li><a data-toggle="tab" href="#tab2" class="text-primary">People</a></li>
            @if ($user->id === auth()->user()->id)
            <li class="ml-auto"><a data-toggle="tab" href="#tab3" class="text-primary">Archive</a></li>
            @endif
        </ul>
    </div>
    <div class="py-3 tab-content">
        <div class="tab-pane fade in active" id="tab1">
            <div class="row px-2" id="activity-list">
                @include('profile.activity')
            </div>
            <div class="text-center mb-5">
                <div class="spinner-grow text-primary load-activity d-none" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab2">
            <div id="activityTaggedControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner mb-5" role="listbox">
                    @foreach($user->tagging->chunk(12) as $tags)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        @foreach($tags->chunk(6) as $persons)
                        <div class="row px-2">
                            @foreach($persons as $person)
                            <div class="col-2 text-center p-0 mx-0">
                                <div class="m-1">
                                    @if($person->person_id != null)
                                    <a href="{{ route('dashboard.show', $person->tagged->uuid) }}" class="text-primary">
                                        <img src="{{ $person->tagged->avatar }}"
                                            class="avatar avatar-sm border border-primary" alt="Activity Tag">
                                        <p class="f-10 mb-0 mt-1 bold text-capitalize">
                                            {{ \Illuminate\Support\Str::limit($person->tagged->username, 8) }}
                                        </p>
                                    </a>
                                    @else
                                    <img src="{{ $person->avatar }}" class="avatar avatar-sm" alt="Activity Tag">
                                    <p class="f-10 mb-0 mt-1 bold text-capitalize">
                                        {{ \Illuminate\Support\Str::limit($person->name, 8) }}
                                    </p>
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
                    @foreach($user->tagging->chunk(12) as $tags)
                    <li data-target="#activityTaggedIndicators" data-slide-to="{{ $loop->index }}"
                        class="bg-blue {{ $loop->first ? 'active' : '' }}">
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
        <div class="tab-pane fade" id="tab3">
            <div class="row px-2">
                @if ($user->id === auth()->user()->id)
                @if ($archives->count())
                @foreach($archives as $activity)
                <div class="col-6 p-1">
                    <div class="bg-blue p-1 text-white text-center position-relative"
                        style="height:122px; background-image: url('https://maps.googleapis.com/maps/api/staticmap?size=160x100&zoom=16&center={{ $activity->to_location }}&format=png&maptype=roadmap&style=element:geometry%7Ccolor:0x242f3e&style=element:labels.text.fill%7Ccolor:0x746855&style=element:labels.text.stroke%7Ccolor:0x242f3e&style=feature:administrative.locality%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi.park%7Celement:geometry%7Ccolor:0x263c3f&style=feature:poi.park%7Celement:labels.text.fill%7Ccolor:0x6b9a76&style=feature:road%7Celement:geometry%7Ccolor:0x38414e&style=feature:road%7Celement:geometry.stroke%7Ccolor:0x212a37&style=feature:road%7Celement:labels.text.fill%7Ccolor:0x9ca5b3&style=feature:road.highway%7Celement:geometry%7Ccolor:0x746855&style=feature:road.highway%7Celement:geometry.stroke%7Ccolor:0x1f2835&style=feature:road.highway%7Celement:labels.text.fill%7Ccolor:0xf3d19c&style=feature:transit%7Celement:geometry%7Ccolor:0x2f3948&style=feature:transit.station%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:water%7Celement:geometry%7Ccolor:0x17263c&style=feature:water%7Celement:labels.text.fill%7Ccolor:0x515c6d&style=feature:water%7Celement:labels.text.stroke%7Ccolor:0x17263c&key={{ env('GOOGLE_API_KEY') }}')">
                        <div class="map-img-overlay">
                            <div class="d-flex justify-content-between p-2">
                                <div class="">
                                    <a href="" class="text-white" data-toggle="modal"
                                        data-target="#activitySelectionModal-{{ $activity->id }}">
                                        <div class="text-left">
                                            <h4 class="month bold f-12 m-0">
                                                {{ $activity['start_date']->format('d M, Y') }}
                                            </h4>
                                            <h3 class="time light f-12">
                                                {{ $activity['start_date']->format('g:i A') }}
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="">
                                    <a href="" class="text-white" data-toggle="modal"
                                        data-target="#activityMenuTwo-{{ $activity->id }}">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('partials.modals.activity.activityMenuTwo')
                @include('partials.modals.activity.activitySelection')
                @include('partials.modals.activity.deleteActivity')
                @include('partials.modals.activity.unarchiveActivity')
                @endforeach
                @endif
                @endif
            </div>
        </div>
    </div>
</div>
@else
@if($user->id === auth()->user()->id)
<div class="text-center">
    <a href="{{ route('activity.create') }}" class="btn blue-btn text-white">
        Add an Activity
    </a>
</div>
@endif
@endif
