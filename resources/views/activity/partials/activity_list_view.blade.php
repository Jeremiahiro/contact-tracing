@if ($activities->count() > 0)
@foreach($activities as $index => $activity)
@if ($activity->user_id == auth()->user()->id)
@include('activity.partials.activity_data')
@endif
@endforeach
@else
<div class="text-center">
    <a href="{{ route('activity.create') }}" class="btn blue-btn text-white" id="add_activity">
        Add an Activity
    </a>
</div>
@endif
