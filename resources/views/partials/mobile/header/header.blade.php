<nav class="container">
    <div class="d-flex justify-content-between align-items-center pt-3">
        <div class="logo">
            <a href="{{ url('/') }}">
                @php
                $route = \Route::current()->getName();
                @endphp
                @if ($route == 'home' || $route == 'login' || $route == 'register' || $route == 'password.request' ||
                $route == 'password.confirm' || $route == 'password.reset' || $route == 'verification.notice' ||
                $route == 'dashboard.index' || $route == 'dashboard.show' || $route == 'user.setting')
                    <img src="{{asset('frontend/img/logowhite.png')}}" alt="IAMVOCAL LOGO">
                @else
                    <img src="{{asset('frontend/img/logo.png')}}" alt="IAMVOCAL LOGO">
                @endif
            </a>
        </div>
        <div class="avatar-icon">
            @auth
            @if ($route == 'dashboard.index' || $route == 'dashboard.show' || $route == 'user.setting')
                @if($user->id === Auth::user()->id)
                    <p class="mb-2">
                        <a href="{{ route('user.setting') }}">
                        <img src="{{ asset('frontend/img/svg/setting.svg') }}" alt="">
                        </a>
                    </p>
                    <p>
                        <a href="{{ route('dashboard.index') }}">
                        <img src="{{ asset('frontend/img/svg/edit.svg') }}" alt="">
                        </a>
                    </p>
                @else
                    <a href="{{ url()->previous() }}" class="text-white">
                        <img src="{{ asset('/frontend/img/svg/back.svg') }}" alt="go back">
                    </a>
                @endif
            @else
            <a href="" data-toggle="modal" data-target="#sideNav">
                <img src="{{ Auth::user()->avatar }}" class="avatar avatar-md" alt="default avatar">
            </a>
            @endif
            @endauth
        </div>
    </div>
</nav>
