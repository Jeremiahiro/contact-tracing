<div class="modal fade right" id="user_activity_archive" tabindex="-1" role="dialog"
    aria-labelledby="user_activity_archive_label">
    <div class="modal-dialog full-modal m-0 p-0" role="document">
        <div class="modal-content full-modal-content text-primary">
            <div class="modal-body m-2">
                <div class="row">
                    <button type="button" class="close opacity-1 ml-auto mb-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <img src="{{ asset('/frontend/img/svg/back_blue.svg') }}" alt="go back">
                        </span>
                    </button>
                </div>
                <div class="my-2 text-uppercase text-center">Location Information</div>

                {{-- Toggle Activity Visibility --}}
                <div class="form-group my-3 border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="f-14 bold m-0">Others Can See My Activity</p>
                        </div>
                        <div class="">
                            <div class="spinner-border text-primary ml-2 spinner-border-sm d-none"
                                id="toggle_location_spinner" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <label class="switch">
                                <input type="checkbox" data-id="{{ $user->uuid }}" name="show_location"
                                    id="toggle_location" class="toggle_location"
                                    {{ $user->show_location == true ? 'checked' : '' }} />
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="text-muted f-12">
                        This allows other users on the platform see your activity when they veiw your profile
                    </div>
                </div>

                {{-- Archived Activities --}}
                <div class="my-2 text-left regular">Archived Locations</div>
                <div class="row px-2">
                    @if ($user->id === auth()->user()->id)
                    @if ($archives->count())
                    @foreach($archives as $activity)
                    <div class="col-6 p-1">
                        @if ($activity->from_image != null)
                        <div class="bg-blue p-1 text-white text-center position-relative"
                            style="height:122px; background-image: url('{{ $activity->from_image }}">
                            @else
                            @if ($activity->to_image != null)
                            <div class="bg-blue p-1 text-white text-center position-relative"
                                style="height:122px; background-image: url('{{ $activity->to_image }}">
                                @else
                                <div class="bg-blue p-1 text-white text-center position-relative"
                                    style="height:122px; background-image: url('https://maps.googleapis.com/maps/api/staticmap?size=160x100&zoom=16&center={{ $activity->to_location }}&format=png&maptype=roadmap&style=element:geometry%7Ccolor:0x242f3e&style=element:labels.text.fill%7Ccolor:0x746855&style=element:labels.text.stroke%7Ccolor:0x242f3e&style=feature:administrative.locality%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:poi.park%7Celement:geometry%7Ccolor:0x263c3f&style=feature:poi.park%7Celement:labels.text.fill%7Ccolor:0x6b9a76&style=feature:road%7Celement:geometry%7Ccolor:0x38414e&style=feature:road%7Celement:geometry.stroke%7Ccolor:0x212a37&style=feature:road%7Celement:labels.text.fill%7Ccolor:0x9ca5b3&style=feature:road.highway%7Celement:geometry%7Ccolor:0x746855&style=feature:road.highway%7Celement:geometry.stroke%7Ccolor:0x1f2835&style=feature:road.highway%7Celement:labels.text.fill%7Ccolor:0xf3d19c&style=feature:transit%7Celement:geometry%7Ccolor:0x2f3948&style=feature:transit.station%7Celement:labels.text.fill%7Ccolor:0xd59563&style=feature:water%7Celement:geometry%7Ccolor:0x17263c&style=feature:water%7Celement:labels.text.fill%7Ccolor:0x515c6d&style=feature:water%7Celement:labels.text.stroke%7Ccolor:0x17263c&key={{ env('GOOGLE_API_KEY') }}')">
                                    @endif
                                    @endif
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
                            @include('partials.modals.activity.activityMenu')
                            @endforeach
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
