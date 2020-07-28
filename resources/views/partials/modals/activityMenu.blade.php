<div class="modal fade" tabindex="1" id="activityMenu-{{ $activity->id }}" role="dialog"
    aria-labelledby="activityMenuLabel" aria-hidden="true">
    <div class="modal-dialog-bottom modal-dialog route_purple m-0 p-3" style="pointer-events:auto;" role="document">
        <nav class="nav flex-column">
            <a class="nav-link text-white bold f-16" href="#" data-dismiss="modal" data-toggle="modal" data-target="#tagModal-{{ $activity->id }}">Map View</a>
            <a class="nav-link text-white bold f-16" href="#">Edit</a>
            <a class="nav-link text-white bold f-16" href="#" data-dismiss="modal" data-toggle="modal" data-target="#deleteModal-{{ $activity->id }}">Delete</a>
        </nav>
    </div>
</div>
