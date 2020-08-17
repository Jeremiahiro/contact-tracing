@foreach($activities as $index => $activity)
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
                            <h3 class="time regular f-12">
                                {{ $activity['start_date']->format('g:i A') }}
                            </h3>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="" class="text-white" data-toggle="modal" data-target="#activityMenu-{{ $activity->id }}">
                        <i class="fa fa-ellipsis-v"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.modals.activity.activityMenu')
@include('partials.modals.activity.deleteActivity')
@include('partials.modals.activity.archiveActivity')
@include('partials.modals.activity.activitySelection')
@endforeach
