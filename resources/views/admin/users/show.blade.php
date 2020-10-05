@extends('layouts.admin')

@section('title')
Users - {{ $user->username }}
@endsection

@section('style')

{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('admin/dist/jquery.calmosaic.min.css')}}">
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/moment@2.24.0/moment.min.js"></script> --}}
<script src="{{ asset('admin/dist/jquery.calmosaic.min.js')}}"></script>

@endsection

@section('content')
<div class="container-fluid">

    {{-- <nav aria-label="breadcrumb">
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
    </nav> --}}

    <div class="mb-4 row">
        <div class="col-lg-4 col-md-12">
            <div class="card border-bottom-primary h-100 py-4">
                <div class="card-body rounded-lg text-center">
                    <span class="py-4">
                        <img class="img-profile-lg rounded-circle" src="{{ $user->avatar }}">
                    </span>
                    <div class="my-4">
                        <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $user->name }}</div>
                        <h5 class="mb-3">{{ $user->username }}</h5>
                        <div class="h5 mb-3">
                            {{ $user->phone }}
                        </div>
                        <div class="h5 mb-3">
                            {{ $user->email }}
                        </div>
                        <div class="h5 mb-3">
                            {{ $user->gender }}</div>
                        <div class="h5">
                            {{ $user->age_range }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="row">
                <div class="col-6 mb-4 m-0">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Activities
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ count($user->activities) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4 k-0">
                    <div class="card h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Locations
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ count($user->locations) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-map-marker fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4 m-0">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Connections
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ count($user->tags) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4 k-0">
                    <div class="card h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Support
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ count($user->locations) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4 m-0">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Followers
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ count($user->followers) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4 k-0">
                    <div class="card h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Followings
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ count($user->followings) }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-5 col-10">
                <div class="col-6 mb-4 k-0">
                    <button type="button" class="col m-2 btn btn-success" data-toggle="modal"
                        data-target="#messageModal">
                        Message
                    </button>
                </div>
                <div class="col-6 mb-4 k-0">
                    <button type="button" class="col m-2 btn btn-danger" data-toggle="modal"
                        data-target="#deactivateModal">
                        Deactivate
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <ol class="activity-feed" id="activity_feed">
                @include('admin.activity_log.data')
            </ol>
        </div>
    </div>

    <div class="text-center">
        <div id="heatmap-1"></div>
    </div>


</div>

{{-- Modals --}}
@include('admin.users.modals.message')
@include('admin.users.modals.deactivate')

@endsection
@section('script')

<script>
    var data = {!! $activity_stat !!};
    $("#heatmap-1").calmosaic(data, {
        months: 12,
        labels: {
            days: false,
            months: true,
            custom: {
                weekDayLabels: null,
                monthLabels: null
            }
        },

    });

</script>
@endsection
