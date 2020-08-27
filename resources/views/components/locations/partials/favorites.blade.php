@if ($favorites->count() > 0)
<div id="accordion">
    @foreach ($favorites as $location)
    @include('components.locations.partials.data')
    @endforeach
</div>
@endif
