
    <div class="container">
        <div class="d-flex justify-content-around align-items-center pt-5">
            <p class="pt-4">CONNECT WITH</p>
            <a href="{{ route('social.login', 'facebook') }}"><img src="{{  asset('/frontend/img/svg/facebook.svg') }}" alt="facebook"></a>
            <a href="{{ route('social.login', 'twitter') }}"><img src="{{  asset('/frontend/img/svg/twitter.svg') }}" alt="twitter"></a>
            <a href="{{ route('social.login', 'google') }}"><img src="{{  asset('/frontend/img/svg/google.svg') }}" alt="google"></a>
        </div>

        <div class="align-items-center text-center">
            <button type="button" class="btn border-2 border-white btn-sm btn-transparent text-white px-3">Register</button>
            <button type="button" class="btn border-2 border-white btn-sm btn-transparent text-white px-3">Login</button>
        </div>
    </div>
