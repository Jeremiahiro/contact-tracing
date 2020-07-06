<div class="container col-8 mx-auto">
    <div class="d-flex justify-content-around align-items-center">
        <p class="pt-4 bold f-14x">CONNECT WITH</p>
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
    <div class="col-6 mx-auto">
        <div class="d-flex justify-content-around">
            <div class="col col-12 border border-2 border-white py-1 px-3 rounded text-center m-1">
                <a href="{{ route('register') }}" class="text-white">Register</a>
            </div>
            <div class="col col-12 border border-2 border-white py-1 px-3 rounded text-center m-1">
                <a href="{{ route('login') }}" class="text-white">Login</a>
            </div>
        </div>
    </div>
</div>
