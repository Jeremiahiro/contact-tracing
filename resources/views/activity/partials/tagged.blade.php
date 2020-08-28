@if ($istagged->count() > 0)
@foreach($istagged as $index => $activity)
@include('activity.partials.activity_data')
@endforeach
@else
<div class="text-center py-5" id="no_tags">
    No Tags
</div>
@endif
