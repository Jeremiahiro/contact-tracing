@if ($locations->count() > 0)
<div id="accordion">
    @foreach ($locations as $location)
    @include('components.locations.partials.data')
    @endforeach
</div>
@endif
