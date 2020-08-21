<div class="modal fade right" id="sideNav" tabindex="-1" role="dialog" aria-labelledby="sideNavlLabel">
    <div class="modal-dialog side-nav m-0 p-0 w-100" role="document">
        <div class="modal-content side-nav-content side_nav_purple text-white text-right">

            <div class="text-right p-3">
                <a href="{{ route('dashboard.index') }}" class="text-white">
                    <img src="{{ Auth::user()->avatar }}" class="avatar avatar-md" alt="default avatar">
                    <h6 class="m-0 f-16">{{ auth()->user()->name }}</h6>
                    <p class="regular">{{ auth()->user()->username }}</p>
                </a>

                <div class="d-flex justify-content-end text-center">
                    <span class="px-1">
                        <span class="">{{ count(auth()->user()->tags) }}</span>
                        <p class="m-0 f-12">Connections</p>
                    </span>
                    <span class="px-1">
                        <span class="">{{ count(auth()->user()->activities) }}</span>
                        <p class="m-0 f-12">Location</p>
                    </span>
                    <span class="px-1">
                        <a href="" class="text-white" data-dismiss="modal" data-toggle="modal"
                            data-target="#userFollowing">
                            <span class="">{{ count(auth()->user()->followings) }}</span>
                            <p class="m-0 f-12">Following</p>
                        </a>
                    </span>
                    <span class="px-1">
                        <a href="" class="text-white" data-dismiss="modal" data-toggle="modal"
                            data-target="#userFollowers">
                            <span class="tl-follower">{{ count(auth()->user()->Followers) }}</span>
                            <p class="m-0 f-12">Followers</p>
                        </a>
                    </span>
                </div>
            </div>

            <div class="">
                <nav class="nav flex-column">
                    <a class="nav-link text-white bold f-16" href="{{ route('dashboard.index') }}">
                        Dashboard <i class="ml-2 fa fa-dashboard"></i>
                    </a>
                    <a class="nav-link text-white bold f-16" href="#" data-dismiss="modal" data-toggle="modal"
                        data-target="#settingsModal">
                        Settings & Privacy <i class="ml-2 fa fa-cog"></i>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</div>
