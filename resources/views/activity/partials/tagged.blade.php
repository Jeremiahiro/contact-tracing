@if ($istagged->count() > 0)
@foreach($istagged as $index => $activity)
@include('activity.partials.activity-list-view-data')
@endforeach
@else
<div class="text-center py-5">
    You have not been tagged in any Activity
</div>
@endif
