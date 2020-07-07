<nav class="container">
    <div class="d-flex justify-content-between align-items-center pt-2">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img class="pt-3" src="{{ asset('frontend/img/logowhite.png') }}" alt="IAMVOCAL LOGO">
            </a>
        </div>
        @guest
            <div class="avatar-icon">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('frontend/img/jimi.png') }}" class="avatar" alt="default avatar">
                </a>
            </div>
        @else
            <div class="avatar-icon">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ Auth::user()->avatar }}" class="avatar" alt="default avatar">
                </a>
            </div>
        @endguest
    </div>
</nav>
