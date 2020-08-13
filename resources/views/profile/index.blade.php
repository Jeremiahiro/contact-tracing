@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('custom-style')
<link href="{{ asset('frontend/css/splash.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
@endsection

@section('web-content')
<h1 class="text-center">Please use a mobile device</h1>
@endsection

@section('mobile-content')
<section class="splash profile_cover" style="background-image: url({{ $user->header }})">
    @include('partials.mobile.header.header')
    <div class="container content text-center text-white py-4">
        <div id="panel1">
            @if($user->id === auth()->user()->id)
            <a href="{{ route('dashboard.edit', auth()->user()->uuid) }}">
                <img src="{{ $user->avatar }}" class="avatar avatar-xl border" alt="{{ $user->username }}">
            </a>
            @else
            <img src="{{ $user->avatar }}" class="avatar avatar-xl border" alt="{{ $user->username }}">
            @endif
        </div>
        <div class="py-2">
            <h6 class="bold m-0 f-18">{{ $user->name }}</h6>
            <p class="bold">{{ $user->username }}</p>
        </div>
        <div class="py-2">
            @if ($user->id === auth()->user()->id)
            @if(!$user->location->home_location)
            <a href="{{ route('dashboard.edit', auth()->user()->uuid) }}" class="btn blue-btn text-white">Update
                Address</a>
            @else
            <h6 class="bold m-0 f-12">Home: {{ $user->location->home_location }}</h6>
            <h6 class="bold m-0 f-12">Office: {{ $user->location->office_location }}</h6>
            @endif
            @endif
        </div>
        <div id="panel2" class="py-2">
            <div class="d-flex justify-content-around">
                <span class="px-2">
                    <span class="">{{ count($user->tags) }}</span>
                    <p class="m-0">Connections</p>
                </span>
                <span class="px-2 bold">
                    <span class="">{{ count($user->activities) }}</span>
                    <p class="m-0">Location</p>
                </span>
                <span class="px-2">
                    <a href="" class="text-white" data-dismiss="modal" data-toggle="modal" data-target="#userFollowing">
                        <span class="">{{ count($user->followings) }}</span>
                        <p class="m-0">Following</p>
                    </a>
                </span>
                <span class="px-2">
                    <a href="" class="text-white" data-dismiss="modal" data-toggle="modal" data-target="#userFollowers">
                        <span class="tl-follower">{{ count($user->followers) }}</span>
                        <p class="m-0">Followers</p>
                    </a>
                </span>
            </div>
            @if($user->id != auth()->user()->id)
            <button class="text-center mt-3 btn f-12 rounded blue-btn text-white action-follow"
                data-id="{{ $user->id }}">
                <input type="hidden" class="hidden F-status" value="{{ auth()->user()->isFollowing($user) ? 1 : 0 }}">
                <strong>
                    @if(auth()->user()->isFollowing($user))
                    UNFOLLOW
                    @else
                    FOLLOW
                    @endif
                </strong>
                <div class="spinner-border text-white ml-2 spinner-border-sm d-none" id="follow-spinner" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
            @endif
        </div>
    </div>
</section>

<section class="">
    <div class="container px-3 py-5">
        <p class="f-14">ROUTE HISTORY</p>
        @if($user->activities->count())
        <div class="activityView">
            <div class="activityTab">
                <ul class="mb-0 mt-3 f-12 nav">
                    <li class="active"><a data-toggle="tab" href="#tab1" class="text-primary active">Places</a></li>
                    <span class="mx-1">|</span>
                    <li><a data-toggle="tab" href="#tab2" class="text-primary">People</a></li>
                    @if ($user->id === auth()->user()->id)
                    <li class="ml-auto"><a data-toggle="tab" href="#tab3" class="text-primary">Archive</a></li>
                    @endif
                </ul>
            </div>
            <div class="py-3 tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <div class="row px-2">
                        @foreach($user->activities as $activity)
                        @include('profile.activity')
                        @include('partials.modals.activityMenu')
                        @include('partials.modals.deleteActivity')
                        @include('partials.modals.archiveActivity')
                        @include('partials.modals.activitySelection')
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="tab2">
                    <div id="activityTaggedControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            @foreach($user->tagging->chunk(12) as $tags)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                @foreach($tags->chunk(6) as $persons)
                                <div class="row px-2">
                                    @foreach($persons as $person)
                                    <div class="col-2 text-center p-0 mx-0">
                                        <div class="m-1">
                                            @if($person->person_id != null)
                                            <a href="" data-toggle="modal" data-target="#activityTags-{{ $person->id }}"
                                                class="text-primary">
                                                <img src="{{ $person->tagged->avatar }}"
                                                    class="avatar avatar-sm border border-primary" alt="Activity Tag">
                                                <p class="f-10 mb-0 mt-1 bold text-capitalize">
                                                    {{ \Illuminate\Support\Str::limit($person->tagged->username, 8) }}
                                                </p>
                                            </a>
                                            @else
                                            <img src="{{ $person->avatar }}" class="avatar avatar-sm"
                                                alt="Activity Tag">
                                            <p class="f-10 mb-0 mt-1 bold text-capitalize">
                                                {{ \Illuminate\Support\Str::limit($person->name, 8) }}
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- @include('partials.modals.activityTags') --}}
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
                        @include('partials.modals.activityMenuTwo')
                        @include('partials.modals.deleteActivity')
                        @include('partials.modals.unarchiveActivity')
                        @include('partials.modals.activitySelection')
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
    </div>
</section>

@endsection

@section('footer')
@include('partials.mobile.footer.footer')
@endsection

@section('script')

@include('activity.partials.mapScript')


@endsection
