<nav class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="index.html">
                <img class="pt-3" src="{{ asset('frontend/img/logowhite.png') }}" alt="IAMVOCAL LOGO">
            </a>
        </div>
        @guest
            <div class="avatar-icon">
                <a href="">IC</a>
            </div>
        @else
            <div class="avatar-icon">
                <a href="">ON</a>
            </div>
        @endguest
        
    </div>
</nav>
