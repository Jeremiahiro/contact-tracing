<nav class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img class="pt-3" src="{{ asset('frontend/img/logo.png') }}" alt="IAMVOCAL LOGO">
            </a>
        </div>
        @guest
            {{-- icon for guest user goes here --}}
        @else
        <div class="avatar-icon">
            <a href="{{ route('dashboard') }}">
                <img src="{{ Auth::user()->avatar }}" class="avatar" alt="default avatar">
            </a>
        </div>
        @endguest
    </div>
</nav>
