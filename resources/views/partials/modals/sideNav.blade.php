<div class="modal right show fade" id="sideNav" tabindex="-1" role="dialog" aria-labelledby="sideNavlLabel">
    <div class="modal-dialog side-nav m-0 p-0" role="document">
        <div class="modal-content side-nav-content route_purple text-white text-right">

            <div class="text-right p-3">
                <a href="{{ route('dashboard.index') }}" class="text-white">
                    <img src="{{ Auth::user()->avatar }}" class="avatar avatar-md" alt="default avatar">
                    <h6 class="m-0 f-16">{{ auth()->user()->name }}</h6>
                    <p class="regular">{{ auth()->user()->username }}</p>
                </a>

                <div class="d-flex justify-content-end text-center">
                    <span class="px-1">
                        <span class="">{{ count(auth()->user()->tags) }}</span>
                        <p class="m-0">Connections</p>
                    </span>
                    <span class="px-1">
                        <span class="">{{ count(auth()->user()->activities) }}</span>
                        <p class="m-0">Location</p>
                    </span>
                    <span class="px-1">
                        <span class="">{{ count(auth()->user()->followings) }}</span>
                        <p class="m-0">Followers</p>
                    </span>
                    <span class="px-1">
                        <span class="">{{ count(auth()->user()->followers) }}</span>
                        <p class="m-0">Following</p>
                    </span>
                </div>
            </div>

            <div class="">
                <nav class="nav flex-column">
                    <a class="nav-link text-white bold f-16" href="{{ route('user.setting') }}">Settings <i class="ml-2 fa fa-cog"></i></a>
                    <a class="nav-link text-white bold f-16" href="#">Edit Profile <i class="ml-2 fa fa-user"></i></a>
                    <a class="nav-link text-white bold f-16" href="#">Privacy Policy <i class="ml-2 fa fa-file"></i></a>
                </nav>
            </div>
        </div>
    </div>
</div>
