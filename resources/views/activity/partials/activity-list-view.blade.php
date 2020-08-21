@if ($activities->count())
@foreach($activities as $index => $activity)
@if ($activity->user_id == auth()->user()->id || auth()->user()->isFollowing($activity->user_id))
@include('activity.partials.activity-list-view-data')
@endif
@endforeach
@endif
