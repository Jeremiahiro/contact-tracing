<nav class="container">
    <div class="d-flex justify-content-between align-items-center pt-3">
        <div class="logo">
            <a href="{{ url('/') }}">
                @php
                $route = \Route::current()->getName();
                @endphp
                @if ($route == 'home' || $route == 'login' || $route == 'register' || $route == 'password.request' ||
                $route == 'password.confirm' || $route == 'password.reset' || $route == 'verification.notice' ||
                $route == 'profile.index')
                    <img src="{{asset('frontend/img/logowhite.png')}}" alt="IAMVOCAL LOGO">
                @else
                    <img src="{{asset('frontend/img/logo.png')}}" alt="IAMVOCAL LOGO">
                @endif
            </a>
        </div>
        <div class="avatar-icon">
            @auth
            <a href="{{ route('dashboard') }}">
                <img src="{{ Auth::user()->avatar }}" class="avatar" alt="default avatar">
            </a>
            @endauth
        </div>
    </div>
</nav>
