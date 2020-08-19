@if ($activities->count() > 0)
@foreach($activities as $index => $activity)
@if ($activity->user_id == auth()->user()->id || auth()->user()->isFollowing($activity->user_id) )
@include('activity.partials.list-view')
@endif
@endforeach
@else
<div class="text-center py-5">
    <a href="{{ route('activity.create') }}" class="btn blue-btn text-white">
        Add an Activity
    </a>
</div>
@endif
