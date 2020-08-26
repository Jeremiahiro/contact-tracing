<div class="d-flex justify-content-around">
    <span class="px-2">
        <a href="#tab-view" class="text-white active">
            <span class="">{{ count($user->tags) }}</span>
            <p class="m-0">Connections</p>
        </a>
    </span>
    <span class="px-2 bold">
        <a href="{{ route('locations', auth()->user()->uuid) }}" class="text-white">
            <span class="">{{ count($user->activities) }}</span>
            <p class="m-0">Location</p>
        </a>
    </span>
    <span class="px-2">
        <a href="" class="text-white" data-dismiss="modal" data-toggle="modal" data-target="#userFollowing">
            <span class="">{{ count($user->followings) }}</span>
            <p class="m-0">Following</p>
        </a>
    </span>
    <span class="px-2">
        <a href="" class="text-white" data-dismiss="modal" data-toggle="modal" data-target="#userFollowers">
            <span class="tl-follower">{{ count($user->followers) }}</span>
            <p class="m-0">Followers</p>
        </a>
    </span>
</div>