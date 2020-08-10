<div class="modal fade" tabindex="1" id="deleteModal-{{ $activity->id }}" role="dialog"
    aria-labelledby="activityMenuLabel" aria-hidden="true">
    <div class="modal-dialog-bottom modal-dialog route_purple m-0 p-2" style="pointer-events:auto;" role="document">
        <form action="{{ route('activity.destroy', $activity->id) }}"
            id="deleteActivity-{{ $activity->id }}" method="post">
            @csrf
            @method("DELETE")
            <div class="">
                <div class="modal-body">
                    <div class="mb-2 p-2">
                        <p class="f-16 text-center">Confirm you want to delete your activity for
                            {{ $activity['start_date']->format('d M, Y') }}
                        </p>
                    </div>
                    <div class="d-flex justify-content-between my-2">
                        <button type="button" class="btn blue-btn" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
