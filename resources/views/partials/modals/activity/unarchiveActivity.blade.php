<div class="modal fade" tabindex="1" id="unarchiveActivity-{{ $activity->id }}" role="dialog"
    aria-labelledby="unarchiveActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog-bottom modal-dialog route_purple m-0 p-2" style="pointer-events:auto;" role="document">
        <form action="{{ route('unarchive.activity', $activity->id) }}"
            id="archiveActivity-{{ $activity->id }}" method="post">
            @csrf
            @method("GET")
            <div class="">
                <div class="modal-body">
                    <div class="mb-2 p-2">
                        <p class="f-16 text-center">
                            Restore Your activity For {{ $activity['start_date']->format('d M, Y') }}
                        </p>
                    </div>
                    <div class="d-flex justify-content-between my-2">
                        <button type="button" class="btn blue-btn" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="" class="btn btn-danger">Restore</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
