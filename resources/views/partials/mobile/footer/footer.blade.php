<footer class="bg-white">
    <div class="container">
        <div class="d-flex justify-content-between py-2">
            <div class="">
                <a href="{{ route('activity.index') }}"> <img src="{{  asset('/frontend/img/svg/home.svg') }}"
                        alt="Home"> </a>
            </div>
            <div class="menu">
                <input type="checkbox" class="menu-open" name="menu-open" id="menu-open" />
                <label class="menu-open-button" for="menu-open">
                    <span class="hamburger hamburger-1"></span>
                    <span class="hamburger hamburger-2"></span>
                </label>
                <a href="{{ route('activity.create') }}" class="menu-item menu-item-1">
                    <img src="{{  asset('/frontend/img/svg/plus1.svg') }}" alt="Contact Tracing">
                </a>
                <a href="{{ route('map.view') }}" class="menu-item menu-item-2">
                    <img src="{{  asset('/frontend/img/svg/marker-1.svg') }}" alt="Contact Tracing">
                </a>
                <a href="{{ route('search') }}" class="menu-item menu-item-3">
                    <img src="{{  asset('/frontend/img/svg/ct.svg') }}" alt="Contact Tracing">
                </a>
            </div>
            <div class="">
                <a href="{{ route('notification') }}" class="notification-icon">
                    <img src="{{  asset('/frontend/img/svg/not.svg') }}" alt="Notification">
                    @auth
                    @if (auth()->user()->unreadNotifications->count())
                    <span class="badge badge-danger rounded-circle">{{ auth()->user()->unreadNotifications->count() }} </span>
                    @endif
                    @endauth
                </a>
            </div>
        </div>
    </div>
</footer>
