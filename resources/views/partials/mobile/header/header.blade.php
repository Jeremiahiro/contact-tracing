<nav class="container">
    <div class="d-flex justify-content-between align-items-center pt-3">
        <div class="logo">
            <a href="{{ url('/') }}">
                @php
                $route = \Route::current()->getName();
                @endphp
                @if ($route == 'home' || $route == 'login' || $route == 'register' || $route == 'password.request' ||
                $route == 'password.confirm' || $route == 'password.reset' || $route == 'verification.notice' ||
                $route == 'dashboard.index' || $route == 'dashboard.show' || $route == 'dashboard.edit')
                <img src="{{asset('frontend/img/logowhite.png')}}" alt="IAMVOCAL LOGO">
                @else
                <img src="{{asset('frontend/img/logo.png')}}" alt="IAMVOCAL LOGO">
                @endif
            </a>
        </div>
        <div id="tourStep1" class="avatar-icon">
            @auth
                @if ($route == 'dashboard.index' || $route == 'dashboard.show' || $route == 'dashboard.edit')
                    @if($user->id === Auth::user()->id)
                        @if ($route == 'dashboard.edit')
                        <p class="mb-2 pb-4">
                            <a href="{{ route('dashboard.index') }}" class="text-white">
                                <img src="{{ asset('/frontend/img/svg/back.svg') }}" alt="go back">
                            </a>
                        </p>
                        @else
                        <p class="mb-2">
                            <a href="{{ url()->previous() }}" class="text-white">
                                <img src="{{ asset('/frontend/img/svg/back.svg') }}" alt="go back">
                            </a>
                        </p>
                        <p class="mb-2 ProfiletourStep2">
                            <a href="{{ route('dashboard.edit', auth()->user()->uuid) }}">
                                <img src="{{ asset('frontend/img/svg/edit.svg') }}" alt="">
                            </a>
                        </p>
                        @endif
                        @else 
                        <p class="mb-2">
                            <a href="{{ url()->previous() }}" class="text-white">
                                <img src="{{ asset('/frontend/img/svg/back.svg') }}" alt="go back">
                            </a>
                        </p>
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
