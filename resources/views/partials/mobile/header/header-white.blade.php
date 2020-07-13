<nav class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="index.html">
                <img class="pt-3" src="{{ asset('frontend/img/logo.png') }}" alt="IAMVOCAL LOGO">
            </a>
        </div>
        @guest
        {{-- <div class="avatar-icon">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('frontend/img/jimi.png') }}" class="avatar" alt="default avatar">
            </a>
        </div> --}}
        @else
        <div class="avatar-icon">
            <a href="{{ route('dashboard') }}">
                <img src="{{ Auth::user()->avatar }}" class="avatar" alt="default avatar">
            </a>
        </div>
        @endguest
    </div>
</nav>
