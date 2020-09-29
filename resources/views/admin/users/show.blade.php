@extends('layouts.admin')

@section('title')
Users - {{ $user->username }}
@endsection

@section('style')
{{-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' /> --}}
<link rel='stylesheet' href='{{ asset('admin/vendor/calender/fullcalender.min.css')}}' />
@endsection

@section('content')
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.users.index') }}">All User</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $user->username }}
            </li>
        </ol>
    </nav>

    <div class="mb-4 user-profile">
        <div class="card border-left-primary h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-2 col-md-12 mx-2">
                        <img class="img-profile-lg rounded-circle" src="{{ $user->avatar }}">
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $user->name }}</div>
                                <h3>{{ $user->username }}</h3>
                            </div>
                            <div class="my-2 col-lg-12 col-md-12">
                                <span class="mr-2">
                                    <span class="font-weight-bold text-gray-800">{{ count($user->followers) }}</span>
                                    Followers
                                </span>
                                <span class="mr-2">
                                    <span class="font-weight-bold text-gray-800">{{ count($user->followings) }}</span>
                                    Followings
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="card h-100 py-2 col-lg-4 col-md-12">
                <div class="card-body">
                    <div class="col no-gutters align-items-left">
                        <div class="h5 mb-3"><span class="font-weight-bold text-gray-800">Phone: </span>
                            {{ $user->phone_number }}
                        </div>
                        <div class="h5 mb-3"><span class="font-weight-bold text-gray-800">Email: </span>
                            {{ $user->email }}
                        </div>
                        <div class="h5 mb-3"><span class="font-weight-bold text-gray-800">Gender: </span>
                            {{ $user->gender }}</div>
                        <div class="h5 mb-3"><span class="font-weight-bold text-gray-800">Age Range: </span>
                            {{ $user->age_range }}
                        </div>
                    </div>
                    <div class="row w-75 mx-auto">
                        {{-- Modal to message user accont --}}
                        <button type="button" class="col m-2 btn btn-success" data-toggle="modal"
                            data-target="#messageModal">
                            Send Message
                        </button>

                        {{-- Modal to deactivate user accont --}}
                        <button type="button" class="col m-2 btn btn-danger" data-toggle="modal"
                            data-target="#deactivateModal">
                            Deactivate User
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <nav class="p-2">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-activity-tab" data-toggle="tab" href="#nav-activity"
                            role="tab" aria-controls="nav-activity" aria-selected="true">Activity
                            ({{ count($user->activities) }})</a>
                        <a class="nav-item nav-link" id="nav-tags-tab" data-toggle="tab" href="#nav-tags" role="tab"
                            aria-controls="nav-tags" aria-selected="false">Connections ({{ count($user->tags) }})</a>
                        <a class="nav-item nav-link" id="nav-location-tab" data-toggle="tab" href="#nav-location"
                            role="tab" aria-controls="nav-location" aria-selected="false">Locations
                            ({{ count($user->locations) }})</a>
                        <a class="nav-item nav-link" id="nav-support-tab" data-toggle="tab" href="#nav-support"
                            role="tab" aria-controls="nav-support" aria-selected="false">Support (0)</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-activity" role="tabpanel"
                        aria-labelledby="nav-activity-tab">
                        Activity View
                    </div>
                    <div class="tab-pane fade" id="nav-tags" role="tabpanel" aria-labelledby="nav-tags-tab">
                        Tags View
                    </div>
                    <div class="tab-pane fade" id="nav-location" role="tabpanel" aria-labelledby="nav-location-tab">
                        Location View
                    </div>
                    <div class="tab-pane fade" id="nav-support" role="tabpanel" aria-labelledby="nav-support-tab">
                        Support View
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- Modals --}}
@include('admin.users.modals.message')
@include('admin.users.modals.deactivate')

@endsection
@section('script')

<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js'></script>
<script src='{{ asset('/admin/vendor/calender/fullcalender.min.js')}}'></script>

<script>
    $(document).ready(function () {
        // TODO: update this to suit choice
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            initialView: 'dayGridWeek',
            events: [
                @foreach($user->activities as $activity) {
                    from: '{{ $activity->from_address }}',
                    date: '{{ $activity->start_date }}',
                    url : '{{ route('admin.activities.show', $activity->id) }}',
                },
                @endforeach
            ]
        })
    });

</script>
@endsection
