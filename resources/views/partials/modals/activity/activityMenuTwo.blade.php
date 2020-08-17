<div class="modal fade" tabindex="1" id="activityMenuTwo-{{ $activity->id }}" role="dialog"
    aria-labelledby="activityMenuTwoLabel" aria-hidden="true">
    <div class="modal-dialog-bottom-lg modal-dialog route_purple m-0 p-3" style="pointer-events:auto;" role="document">
        <button type="button" style="opacity:1;" class="btn close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><img src="{{ asset('/frontend/img/svg/Icon-close-circle.svg') }}"
                    alt="map-pin"></span>
        </button>
        <nav class="nav flex-column">
            <a class="nav-link text-white bold f-16" href="#" data-dismiss="modal" data-toggle="modal" data-target="#activitySelectionModal-{{ $activity->id }}">Map View</a>
            <a class="nav-link text-white bold f-16" href="{{ route('activity.edit', $activity->id) }}">Edit</a>
            <a class="nav-link text-white bold f-16" href="#" data-dismiss="modal" data-toggle="modal" data-target="#deleteModal-{{ $activity->id }}">Delete</a>
            <a class="nav-link text-white bold f-16" href="#" data-dismiss="modal" data-toggle="modal" data-target="#unarchiveActivity-{{ $activity->id }}">UnArchive</a>
        </nav>
    </div>
</div>
