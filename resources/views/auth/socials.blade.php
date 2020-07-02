<div class="container col-10 mx-auto  py-5">
    <div class="d-flex justify-content-around align-items-center">
        <p class="pt-4">CONNECT WITH</p>
        <a href="{{ route('social.login', 'facebook') }}">
            <img src="{{  asset('/frontend/img/svg/facebook.svg') }}" alt="facebook">
        </a>
        <a href="{{ route('social.login', 'twitter') }}">
            <img src="{{  asset('/frontend/img/svg/twitter.svg') }}" alt="twitter">
        </a>
        <a href="{{ route('social.login', 'google') }}">
            <img src="{{  asset('/frontend/img/svg/google.svg') }}" alt="google">
        </a>
    </div>

    <div class="align-items-center text-center">
        <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">
            Register
        </a>
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
            Login
        </a>
    </div>
</div>
