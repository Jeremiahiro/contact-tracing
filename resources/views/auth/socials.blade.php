<div class="container col-8 mx-auto">
    <div class="d-flex justify-content-around align-items-center">
        <p class="pt-4 f-14">CONNECT WITH</p>
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
    <div class="row mx-auto">
        <div class="col m-1 py-1 px-3 rounded text-center border border-white">
            <a href="{{ route('register') }}" class="text-white f-14">Register</a>
        </div>
        <div class="col m-1 py-1 px-3 rounded text-center border border-white">
            <a href="{{ route('login') }}" class="text-white f-14">Login</a>
        </div>
    </div>
</div>
