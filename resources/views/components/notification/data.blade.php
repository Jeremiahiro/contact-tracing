{{-- if there is notification --}}
@if ($notifications->count() > 0)
@foreach ($notifications as $notification)

{{-- if notification type is Activity related --}}
@if ($notification->type == 'App\Notifications\ActivityTagNotification')
@foreach($activities as $index => $activity)
@if ($activity->id == $notification->data['activity_id'])
<div class="border py-2">
    <span class="px-3 f-14">
        @if ($activity->tags->count() > 2)
        You & {{ $activity->tags->count() }} others were tagged in an activity
        @else
        You were tagged in an activity
        @endif
    </span>
    @include('activity.partials.activity-list-view-data')
</div>
@endif
@endforeach
@endif

{{-- if notification type is follow related --}}
@if ($notification->type == 'App\Notifications\FollowNotification')
@foreach ($users as $user)
@if ($user->id == $notification->data['follower_id'])
<div class="p-2 border">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div>
                <img src="{{ $user->avatar }}" alt="" class="avatar avatar-sm">
            </div>
            <div class="ml-2 text-primary">
                <p class="m-0 p-0 f-14">
                    <a href="{{ route('dashboard.show', $user->uuid) }}" class="bold text-primary">
                        {{ $user->username }}
                    </a>
                    <span class="light">{{ $notification->data['body'] }}</span>
                </p>
            </div>
        </div>
        <div>
            <button class="text-center btn f-12 rounded blue-btn btn-sm text-white action-follow"
                data-id="{{ $user->id }}">
                <input type="hidden" class="hidden F-status" value="{{ auth()->user()->isFollowing($user) ? 1 : 0 }}">
                <strong>
                    @if(auth()->user()->isFollowing($user))
                    UNFOLLOW
                    @else
                    FOLLOW
                    @endif
                </strong>
                <div class="spinner-border text-white ml-2 spinner-border-sm d-none f-10" id="follow-spinner"
                    role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>
    </div>
</div>
@endif
@endforeach
@endif
@endforeach

{{-- when there is no notification --}}
@else
<p class="text-primary text-center">No notifications yet</p>
@endif
