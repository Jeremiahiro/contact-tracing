@extends('layouts.admin')

@section('style')

@endsection

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Activities</h6>
            <h6 class="m-0 font-weight-bold text-primary">Total Activities: {{ count($activities) }}</h6>
        </div>

        <div class="card-body">
            
        </div>
    </div>
</div>

@endsection
@section('script')

@endsection
