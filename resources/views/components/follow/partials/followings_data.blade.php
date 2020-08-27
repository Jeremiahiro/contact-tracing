@foreach ($followings as $user)
<div class="mb-2 d-flex justify-content-between">
    <div class="d-flex align-middle">
        <img class="avatar avatar-md border border-primary" src="{{ $user->avatar }}" alt="{{ $user->name }}">
        <div class="ml-2">
            <h6 class="bold m-0 f-16">{{ $user->name }}</h6>
            <p class="light">{{ $user->username }}</p>
        </div>
    </div>
    <div>
        <button class="text-center mt-3 btn f-12 rounded blue-btn text-white action-follow" data-id="{{ $user->id }}">
            <input type="hidden" class="hidden F-status" value="{{ auth()->user()->isFollowing($user) ? 1 : 0 }}">
            <strong>
                @if(auth()->user()->isFollowing($user))
                UNFOLLOW
                @else
                FOLLOW
                @endif
            </strong>
            <div class="spinner-border text-white ml-2 spinner-border-sm d-none" id="follow-spinner" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </button>
    </div>
</div>
@endforeach
