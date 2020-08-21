<div class="modal fade" id="activitySelectionModal-{{ $activity->id }}" role="dialog"
    aria-labelledby="activitySelection" aria-hidden="true">
    <div class="modal-dialog route_purple mt-5 mx-0 px-3 pb-4 pt-2" style="pointer-events:auto;" role="document">
        <div class="">
            <div class="d-flex justify-content-end">
                <button type="button" style="opacity:1;" class="btn close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src="{{ asset('/frontend/img/svg/Icon-close-circle.svg') }}"
                            alt="map-pin"></span>
                </button>
            </div>

            <div>
                @include('activity.partials.single-activity-view')
            </div>
        </div>
    </div>
</div>
