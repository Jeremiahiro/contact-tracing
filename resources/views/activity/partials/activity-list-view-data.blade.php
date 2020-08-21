<div class="py-2 px-0">
    <div class="container d-flex justify-content-around align-items-center">
        <div class="w-25">
            <p class="m-0 py-1 f-12 bold">
                {{ $activity['start_date']->format('H:i A') }}
            </p>
            <div class="vl mr-4"></div>
            <p class="m-0 py-1 f-12 bold">
                {{ $activity['end_date']->format('H:i A') }}
            </p>
        </div>
        <div class="{{ auth()->user()->id == $activity->user_id ? 'route_white' : 'route_purple' }} route p-3">
            <div class="f-14 pb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 bold f-10">Route & Interactions</h6>
                    <div>
                        @if (auth()->user()->id == $activity->user_id)
                        <a href="" class="sub-menu" data-toggle="modal" data-target="#activityMenu-{{ $activity->id }}">
                            <i class="fa fa-ellipsis-v"></i>
                        </a>
                        @else
                        <img src="{{ $activity->owner->avatar }}" class="sub-menu avatar avatar-xs" alt="Activity Tag">
                        @endif
                    </div>
                </div>
                <a class="" data-toggle="modal" data-target="#tagModal-{{ $activity->id }}">
                    <div id="panel1" class="mb-0 pb-0 bold text-uppercase">
                        {{ \Illuminate\Support\Str::limit($activity->to_location, 25) }}</div>
                    <div class="f-12 m-0 regular">
                        {{ \Illuminate\Support\Str::limit($activity->to_address, 40) }}
                    </div>
                </a>
            </div>
            <div class="mb-2 d-flex justify-content-between align-items-center">
                <div class="w-80">
                    <a href="" data-toggle="modal" data-target="#activitySelectionModal-{{ $activity->id }}">
                        <img class="rounded"
                            src="https://maps.googleapis.com/maps/api/staticmap?size=200x60&zoom=16&center={{ $activity->to_location }}&format=png&maptype=roadmap&style=element:geometry%7Ccolor:0x242f3e&style=element:labels.text.fill%7Ccolor:0x746855&style=element:labels.text.stroke%7Ccolor:0x242f3e&style=feature:administrative.locality%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi.park%7Celement:geometry%7Ccolor:0x263c3f&style=feature:poi.park%7Celement:labels.text.fill%7Ccolor:0x6b9a76&style=feature:road%7Celement:geometry%7Ccolor:0x38414e&style=feature:road%7Celement:geometry.stroke%7Ccolor:0x212a37&style=feature:road%7Celement:labels.text.fill%7Ccolor:0x9ca5b3&style=feature:road.highway%7Celement:geometry%7Ccolor:0x746855&style=feature:road.highway%7Celement:geometry.stroke%7Ccolor:0x1f2835&style=feature:road.highway%7Celement:labels.text.fill%7Ccolor:0xf3d19c&style=feature:transit%7Celement:geometry%7Ccolor:0x2f3948&style=feature:transit.station%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:water%7Celement:geometry%7Ccolor:0x17263c&style=feature:water%7Celement:labels.text.fill%7Ccolor:0x515c6d&style=feature:water%7Celement:labels.text.stroke%7Ccolor:0x17263c&key={{ env('GOOGLE_API_KEY') }}"
                            alt="">
                    </a>
                </div>
                <div class="">
                    <a class="f-8 bold" data-toggle="modal" data-target="#activitySelectionModal-{{ $activity->id }}">
                        MAP VIEW
                    </a>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="">
                    @if($activity->tags->count())
                    @foreach($activity->tags->take(4) as $index => $person)
                    <img src="{{ $person->avatar }}" class="avatar avatar-xs" alt="Activity Tag">
                    @endforeach
                    @if($activity->tags->count() > 4)
                    <a class="regular" data-toggle="modal" data-target="#activitySelectionModal-{{ $activity->id }}">
                        <span class="regular">+{{ $activity->tags->count() - 4 }}</span>
                    </a>
                    @endif
                    @endif
                </div>
                <div class="">
                    @if (auth()->user()->id == $activity->user_id)
                    <a href="{{ route('activity.edit', $activity->id) }}" class="add_svg">
                        <img class="icon_blue" src="{{ asset('frontend/img/svg/plus_blue.svg' ) }}" alt="Edit Activity">
                        <img class="icon_white" src="{{ asset('frontend/img/svg/plus_white.svg' ) }}"
                            alt="Edit Activity">
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@if (auth()->user()->id == $activity->user_id)
@include('partials.modals.activity.activityMenu')
@include('partials.modals.activity.deleteActivity')
@include('partials.modals.activity.archiveActivity')
@endif
@include('partials.modals.activity.activitySelection')
